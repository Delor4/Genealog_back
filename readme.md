Simple REST api for genealogical tree of descendants. Student's project.
---

To run [Laravel](https://laravel.com/docs/5.8) 5.8.36 you need [PHP](https://www.php.net/manual/en/install.php) >= 7.1.3 with:
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

and [Composer](https://getcomposer.org/).

---

- Install missing packages:

	composer install

- Copy `.env.example` to `.env`

- Generate new app key:
	
	php artisan key:generate

- Edit `.env` eg. to use sqlite:

	DB_CONNECTION=sqlite
	DB_DATABASE=/absolute/path/to/database.sqlite

- Migrate databases:
	
	php artisan migrate

- Run server:
	
	php artisan serve

- Now server should running on:
	
	http://localhost:8000

---

- Create new user:
	
	curl --data "name=UserName" --data "email=UserEmail" --data "password=UserPassword" http://localhost:8000/api/register

- Login user (get new api token):
	
	curl --data "email=UserEmail" --data "password=UserPassword" http://localhost:8000/api/login

- Use api endpoints width token:
	
	curl -H "Accept: application/json" -H "Authorization: Bearer api_key"  http://localhost:8000/api/endpoint
---
Endpoints:

| METHOD   | URI | Description |
|----------|-------------------------|:----------:|
| POST     | api/persons | new person |
| GET HEAD | api/persons | index |
| GET HEAD | api/persons/{id_person} | show person |
| PUT      | api/persons/{id_person} | update person |
| DELETE   | api/persons/{id_person} | delete person |

---
Example of output:
	
	curl -H"Authorization: Bearer api_key" http://localhost:8000/api/persons

	[
		{
			"id" : 2,
			"created_at" : "2020-01-19 08:26:36",
			"updated_at" : "2020-01-19 08:26:36",
			"first_name" : "Janina",
			"last_name" : "Kowalska",
			"birth_year" : "1993",
			"sex" : "f",
			"parent_id" : 1
		},
		{
			"id" : 1,
			"created_at" : "2020-01-19 08:26:06",
			"updated_at" : "2020-01-19 08:26:06",
			"first_name" : "Jan",
			"last_name" : "Kowalski",
			"birth_year" : "1965",
			"sex" : "m",
			"parent_id" : null
		}
	]
