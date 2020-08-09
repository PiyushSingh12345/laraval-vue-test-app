# team-players-vuejs-laravel-test-app

> 1) Please use Laravel and Vue.js

==================

Create a REST API to model sports teams and their players. Also create a U/I to show functionality.

Be sure to include the following elements:

* migration for adding the teams table
* migration for adding the players table
* seed script to fill the tables with some data
* API endpoint to add a team
* API endpoint to add a player
* API endpoint to update a player
* API endpoint to get a team and its players
* Bonus: authentication method so only trusted entities may call the APIs

Schema for teams table (you may add additional fields as needed):

* id
* name
* created_at
* updated_at

Schema for players table (you may add additional fields as needed):

* id
* first_name
* last_name
* created_at
* updated_at

# Installation

* type git clone https://github.com/PiyushSingh12345/laraval-vue-test-app.git projectname to clone the repository
* type cd projectname
* type composer install
* type composer update
* copy .env.example to .env
* type php artisan key:generateto regenerate secure key
 * use MySQL in .env file 
    set DB_CONNECTION
    set DB_DATABASE
    set DB_USERNAME
    set DB_PASSWORD
* php artisan migrate
* php artisan db:seed
* npm install
* npm run dev



