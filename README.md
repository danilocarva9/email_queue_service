### Testing Email Configuration

I am using [mailtrap](https://mailtrap.io/), it is a email sandbox service. Official tutorial can be found [here](https://mailtrap.io/blog/send-email-in-laravel/) to integrate with Larave/Lumen.

Used technologies

* [Docker](https://www.docker.com/)
* [Lumen 8.x](https://lumen.laravel.com/)
* [MySQL](https://www.mysql.com/)

## Installation

Use the package manager [git](https://git-scm.com/downloads) to install the repo.

```bash
git clone https://github.com/jaygaha/notification-microservice.git
cd notification-microservice
docker compose up -d --build
```

### Database migration and seeding

```bash
docker compose exec mail-web sh
/var/www/html# php artisan migrate:fresh --seed
```

If you don't want to use faker data then please omit ``` --seed ```

### Run Job

Manualy run the schedule

```bash
php artisan schedule:run
```

Create a cron job in the server which run every minute.

```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

## TODO

* API Route (CRUD)

## Contributing

All code submissions will only be evaluated and accepted as pull-requests. If you have any questions or find any bugs please feel free to open an issue.

## License

Feel free to use.