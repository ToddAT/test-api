# Sample API

## Requirements

- PHP
- Laravel 5.5
- PHPUNIT (for testing)

## Setup

- Install dependencies via _Composer_. 
- Run `php artisan migrate:refresh --seed` to generate and seed the database tables.
- Run `phpunit --testdox tests/Feature` to verify code via PHPUNIT.


## Authentication

For authentication, I used a simple api token which I generate when the users are created (currently via the seeding process). All calls to the API (with the exception of retrieving the list of users for testing purposes) will check the API before proceeding. If the API key is not found or isn't valid, the API will fail to a 404.

## Notes

I think everything is pretty self-explanatory. I used Laravel's API routes for routing so all URLs require an `api` prefix.

I seeded the database with 3 users, one product, and one link (connecting the product to one of the users). The users output API endpoint (`/api/users`) is the only one that does not require an API key.
