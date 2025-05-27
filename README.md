# Laravel Demo Project

## Requirements

- [Docker Desktop](https://www.docker.com/products/docker-desktop/).


## Installation

1) Clone [this repository](https://github.com/alejandro-sl-secret-source/laravel-demo).
2) Enter into project directory (`cd laravel-demo`) and run:
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```
This will fetch the packages dependencies without the need of having PHP and Composer installed in the host machine.

3) Create `.env` file copying it from `.env.example`. 
4) Set database default parameters in `.env` file:
    ```
    DB_CONNECTION=mariadb
    DB_HOST=mariadb
    DB_PORT=3306
    DB_DATABASE=demo
    DB_USERNAME=sail
    DB_PASSWORD=password
    ```
5) Run `php artisan key:generate` to create an application key in `.env` file.
6) Start the Laravel application with `./vendor/bin/sail up`. If you want the Docker console output to be dettached, use `./vendor/bin/sail up -d`.
7) The web application will be available in [http://localhost](http://localhost) or [http://127.0.0.1](http://127.0.0.1). Optionally, you can create a custom local domain in your `hosts` file, for example `laravel.demo`; and set it in the `.env` file too.
8) Run the migrations to create the default database tables and sample data: `php artisan migrate`.
9) The application can be stopped with `./vendor/bin/sail stop`.
10) Optionally, you can create a desktop alias to start and stop the application: `laravel-demo='cd /path/to/laravel-demo && ./vendor/bin/sail'`.

## Laravel Documentation
Read the [Laravel Documentation](https://laravel.com/docs/12.x) as much as you need it.

## Recommended Visual Studio Code extensions
- [PHP Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client)
- [PHP Debug](https://marketplace.visualstudio.com/items?itemName=xdebug.php-debug)
- [Laravel](https://marketplace.visualstudio.com/items?itemName=laravel.vscode-laravel)
- [Laravel Extension Pack](https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel-extension-pack)
- [Markdown All in One](https://marketplace.visualstudio.com/items?itemName=yzhang.markdown-all-in-one)


