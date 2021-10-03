@extends('layout.master')
@section('page-title')
 Home
@endsection
@section('page-content')

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="card-title  mt-5">Search Weather</h2>
      <div class="card mb-4" id='search_form_container'>
        <div class="card-body">
          
          <form class="row" id='search_weather_form' method="POST" action="{{ route('search_weather') }}" data-parsley-validate>
            
            <div class="form-group col-md-6">
              <label  class="font-weight-bold">Country</label>
              <select class="form-control" name='country_id' required>
                <option value="">Select Country</option>
              </select>
            </div>
         
            <div class="form-group col-md-6">
              <label  class="font-weight-bold">City</label>
              <select class="form-control" name='city_id' required>
                <option value="">Select City</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label  class="font-weight-bold">Forecast Days</label>
              <select class="form-control" name='forecast_days' required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </div>
            <div class="form-group col-md-9">
              <label class="font-weight-bold">Access Token</label>
              <input type="text" class="form-control" name="access_token" placeholder="Enter access token" required>              
            </div>
            <div class="form-group col-md-12">
              <button type="submit" class="btn btn-success">Search Weather</button>
            </div>            
            
          </form>
        </div>
        
      </div>
      
      
    </div>
  </div>
  <!-- /.row -->

  <div class="row mt-5 mb-5 weather_report d-none">
    <div class="col-md-12">
      <h1 class="no_of_days"></h1>
    
      <div class="table-responsive">
        <table class="table table-bordered weather_table">
          <thead style="background-color: #7d838a;border-color: #7d838a;color: white">
            <tr>
              <th>Day</th>
              <th>Condition</th>
              <th>Temperature</th>
              <th>Wind</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

@endsection


@section('page-scripts')
  <script src="{{ URL::to('public/assets/js/home.js') }}"></script>
@endsection