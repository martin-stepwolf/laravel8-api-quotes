# Laravel8 API Quotes

_Community to share and rate quotes._

### Project goal by martin-stepwolf :goal_net:

Personal project to apply my knowledge about API REST and learn more about Laravel and [Laravel Sanctum](https://laravel.com/docs/8.x/sanctum).

### Achievements :star2:

- Learned better practices about APIs (versioning and url names).
- Created Authentication functions (register and login).
- Implemented Authentication by API tokens with Laravel Sanctum.
- Implemented [Authorization - Policies](https://laravel.com/docs/8.x/authorization).
- Implemented [API resources](https://laravel.com/docs/8.x/eloquent-resources) to transform data.
- Implemented a 2nd version where users can rate quotes (**Polymorphic relationships**).
- Worked with **Test-Driven Development** with PHPUnit.
- Tested with [Postman](https://www.postman.com/) and created a documentation [link](https://documenter.getpostman.com/view/14344048/TWDUrJfS).
- Implemented custom errors in exceptions and logs about information of the policy and authentication.
- Create a custom [Artisan command](https://laravel.com/docs/8.x/artisan) to sent an email and tested it in local ([mailhog](http://localhost:8025)).
- Implemented [Task Scheduling](https://laravel.com/docs/8.x/scheduling) to refresh the database each month and sent an email to users weekly.
- Implemented a [Listener and an Event](https://laravel.com/docs/8.x/events) to send an email to the user when one of his quotes were rated and an [Observer](https://laravel.com/docs/8.x/eloquent#observers) in Quotes.
- Implemented [Queue and Jobs](https://laravel.com/docs/8.x/queues) with the container Redis.

## Getting Started :rocket:

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites :clipboard:

The programs you need are:

-   [Docker](https://www.docker.com/get-started).
-   [Docker compose](https://docs.docker.com/compose/install/).

### Installing 🔧

First duplicate the file .env.example as .env.

```
cp .env.example .env
```

Note: You could change some values, anyway docker-compose create the database according to the defined values.

Then install the PHP dependencies:

```
 docker run --rm --interactive --tty \
 --volume $PWD:/app \
 composer install
```

Then create the next alias to run commands in the container with Laravel Sail.

```
alias sail='bash vendor/bin/sail'
```

Create the images (laravel app and mysql) and run the services:

```
sail up
```

With Laravel Sail you can run commands as docker-compose (docker-compose up -d = sail up -d) and php(e.g php artisan migrate = sail artisan migrate). To run Composer, Artisan, and Node / NPM commands just add sail at the beginning (e.g sail npm install). More information [here](https://laravel.com/docs/8.x/sail).

Then generate the application key.

```
sail artisan key:generate
```

Finally generate the database with fake data:

```
sail artisan migrate --seed
```

Note: You could refresh the database any time with migrate:refresh.

And now you have all the environment in the port 80 (http://localhost/).

## Running Artisan Commands

There is a custom command to sent an email as example to the users.

```
sail artisan send:newsletter
```

In docker-compose there is a container about MailHog, this container shows the email sent in your local in the port 8025 by default.

## Running Tasks Scheduled

There are two task, one to refresh the database (monthly) and other to send an email to users (weekly) about how many users and quotes there are. Run it with:

```
sail artisan schedule:run
```

You could use `schedule:list` to look more information and its next schedule. 

## Running Queues

There is a Job (send a welcome email) created when a new user is registered  and there is an event to send an email when a quote is rated, both are stored in queue, to run them run:

```
sail artisan queue:listen
```

Note: Remember in production the better command is `queue:work`, [explanation](https://laravel-news.com/queuelisten).

## Running the tests

To test the Routes, Controllers, Security and the functionality in general run:

```
sail artisan test
```

## Deployment 📦

For production environment you need extra configurations for security as:

Set in the file .env the next configuration.

```
APP_ENV=production
```

## Built With 🛠️

-   [Laravel 8](https://laravel.com/docs/8.x/releases/) - PHP framework.
-   [Laravel Sanctum](https://laravel.com/docs/8.x/sanctum) - Authentication system.
-   [Laravel Sail](https://laravel.com/docs/8.x/sail) - Docker development environment.

## Authors

-   Martín Campos - [martin-stepwolf](https://github.com/martin-stepwolf)

## Contributing

You're free to contribute to this project by submitting [issues](https://github.com/martin-stepwolf/laravel8-api-quotes/issues) and/or [pull requests](https://github.com/martin-stepwolf/laravel8-api-quotes/pulls).

## License

This project is licensed under the [MIT License](https://choosealicense.com/licenses/mit/).

## References :books:

- [Laravel Advanced Course](https://platzi.com/clases/laravel-avanzado/)
- [Postman Course](https://platzi.com/clases/postman/)
- [Test Driven Development with Laravel Course](https://platzi.com/clases/laravel-tdd/)
- [Testing with PHP and Laravel Basic Course](https://platzi.com/clases/laravel-testing/)
- [API REST with Laravel Course](https://platzi.com/clases/laravel-api/)
- [API REST Course](https://platzi.com/clases/api-rest/)
