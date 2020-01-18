To run Laravel 5.8.36 you need:
- PHP >= 7.1.3
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

Copy .env.example to .env

Generate new app key:
	
	php artisan key:generate

Edit .env eg. to use sqlite:

	DB_CONNECTION=sqlite
	DB_DATABASE=/absolute/path/to/database.sqlite

Migrate databases:
	
	php artisan migrate

Run server:
	
	php artisan serve

Now server should running on:
	
	http://localhost:8000

Create new user:
	
	curl --data "name=UserName" --data "email=UserEmail" --data "password=UserPassword" http://localhost:8000/api/register

Login user (get new api token)
	
	curl --data "email=UserEmail" --data "password=UserPassword" http://localhost:8000/api/login

Use api endpoints width token:
	
	curl -H "Accept: application/json" -H "Authorization: Bearer api_key"  http://localhost:8000/api/endpoint
