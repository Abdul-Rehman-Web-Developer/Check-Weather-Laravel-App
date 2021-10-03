# Check Weather (Laravel App)

Using this web application you can easily explore the weather of any city in the world with 3- day forecast.

As the application uses an API that is guarded with access-token, so first you need to register your account using your email and password of your choice on **register** page. Upon a successful registration the system will prompt you the access-token using that you can explore the weather by using a weather search form on a **home** page.

If you forget the access-token then it can easily be retrieved on **get access token** page by entering the email and password you used at the time of account registration into the get access token form.

It happens that a person forgets the password if it is the case then you can navigate to the **forgot password** page and there you will be asked to provide the email address you used at the time of account registration. Upon providing your email, the application will send an account recovery email at your email address. There will be a password reset link in the email body by clicking that you will be directed to the **update password** page and here you can reset your password by entering a new password of your choice.

It is the application flow in a nut shell.

# About the application

### Technologies used
The application is built using PHP Laravel 8 framework and MySQL as the database. The front-end is built using HTML, CSS, Bootstrap 4 , jQuery and AJAX.

### System Requirements
* PHP >= 7.3
* Apache
* MySQL

# How to Install

* Install XAMPP or WAMP stack on your computer
* download the project zip and extract on your computer
* Copy the folder named **check-weather** under the root directory
* Paste it in the **htdocs** folder of XAMPP installation setup or in **www** folder in case of WAMP installation setup.
* Launch XAMPP or WAMP server and start Apache and MySQL services in them
* Open web browser and navigate to **phpmyadmin** web utility
* create a database in phpmyadmin with the name **check_weather**
* open the check_weather database in phpmyadmin and export the database file that resides in the root folder of downloaded project with the name of check_weather.sql
* make sure that **check_weather** database has user name **root** and password as null/empty string.


# Application API's

Suppose you are running the project in your local environment (localhost).



| API                                                | Parameters                             | Method | Description                                                                                                                           																										                    |
| -------------------------------------------------- | -------------------------------------- | ------ | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | 
| localhost/check-weather/api/get_countries          |                                        |  GET   | Returns list of countries                                                                                                              																										                | 
| localhost/check-weather/api/get_cities             | country_id                             |  GET   | Returns list of cities for a particular country using country_id as parameter                                                         																										                    |   
| localhost/check-weather/api/get_user_access_token  | email, password                        |  POST  | Returns access_token if email and password matches a registered user account                                                          																										                    |
| localhost/check-weather/api/register_user          | email, password                        |  POST  | Create user account with the given email and password. Also generate a unique access-token for the intended user.                     																										                    |
| localhost/check-weather/api/search_weather         | city_id, access_token, forecast_days   |  POST  | * Get weather data for a city using a city_id as parameter * Forecast days are defined using forecast_days parameter * The API will return authentication error if access_token parameter does not match any registered user user_access token in the database |
| localhost/check-weather/api/recover_account        | email                                  |  POST  | An account recovery email will be generated for the intended email address if the mentioned email address belongs to any registered user account in the database                                                                                               |
| localhost/check-weather/api/update_user_password   | password, access_token                 |  POST  | Renew user account password only if the access_token belongs to any registered user account in the database. Also renew unique access_token for the intended user                                                                                              |

# References
* The application utilizes weather data provided by the live weather api from **Weatherapi** web portal.
 
  Reference Link: https://www.weatherapi.com 
* The application utilizes geographic database of places around the world that has been taken from **simplemaps** web portal.
 
  Reference link: https://simplemaps.com/data/world-cities
 
