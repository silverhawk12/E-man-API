# E-man-API
E-man interview task 

# Instalation:

* git clone https://github.com/silverhawk12/E-man-API.git
* cd projectname
* composer install
* php artisan migrate:refresh --seed

# Endpoints:

* POST 'user/create' expects json {"email":"user@email","password":"userpass"} returns json

* POST 'location/{user_id}' expects json {"lat":"latitude","long":"longitude"} returns json

* POST 'version' expects json {"version":"versionNumber"} returns json

* GET 'version' expects param "version=userAppVersion" returns json
