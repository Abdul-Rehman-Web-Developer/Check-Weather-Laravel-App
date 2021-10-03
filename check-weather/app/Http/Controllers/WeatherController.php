<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;

class WeatherController extends Controller
{
    
    public function get_countries(){

    	$countries=DB::table('world_cities')->orderBy('country')->groupBy('country')->get();
    	
    	return response()->json(['countries'=>$countries], 200);
    }

    public function get_cities(Request $request){
    	
    	if($request->country_id != '' AND !DB::table('world_cities')->where('country',$request->country_id)->first()){
    		return response()->json("Country not found.", 404);
    	}

    	$cities=DB::table('world_cities')
    			->where('country',$request->country_id)
    			->orderBy('city')
    			->get();    	
    	
    	return response()->json(['cities'=>$cities], 200);
    }

    public function search_weather(Request $request){
    	$user=DB::table('users')->where('access_token',$request->access_token)->first();
    	$city=DB::table('world_cities')->where('id',$request->city_id)->first();

		if(!$user){
			return response()->json("No user account has been found against the provided access token.", 409);
    	}

    	if(!$city){
			return response()->json("No city found.", 409);
    	}
        
        $lat_lng=$city->lat.",".$city->lng;
        $no_of_days=$request->forecast_days;
        
    	$response = Http::get("http://api.weatherapi.com/v1/forecast.json?key=1f3c80d4ae364c4f932170628211204&days=$no_of_days&aqi=no&q=$lat_lng");
        $body=$response->json();
        
        if($response->status() != 200){
           return response()->json($body['error']['message'], 409);	
        }
        
        if ( !in_array($request->forecast_days, range(1,3)) ) {
			return response()->json("Forecast days must be in range 1-3", 409);
        }

        
        $forecast_days=$body['forecast']['forecastday'];
        
        $weather_data=[];

        foreach($forecast_days as $day){
        	$date=date_create($day['date']);
            $date=date_format($date,"l, F d, Y");   

        	array_push($weather_data,   [
        									'date'=>$date,
        									'condition_icon'=>$day['day']['condition']['icon'],
        									'condition_text'=>$day['day']['condition']['text'],
        									'avg_temp'=>round($day['day']['avgtemp_c'])." &#8451;",
        									'min_temp'=>round($day['day']['mintemp_c'])." &#8451;",
        									'max_temp'=>round($day['day']['maxtemp_c'])." &#8451;",
        									'wind'=>round($day['day']['maxwind_kph']).' KM/h'
        								]
            );
        }
        
        return response()->json(['no_of_days'=>$no_of_days,'weather_data'=>$weather_data], 200);

      

    }
}
