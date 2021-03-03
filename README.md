# Todo List | Laravel - Livewire

[![N|Solid](https://www.cisnedigital.cl/projects/todo-list-livewire/example.jpg)](https://www.cisnedigital.cl/projects/todo-list-livewire/)

DEMO: https://www.cisnedigital.cl/projects/todo-list-livewire/

# Features

-   Laravel 8
-   Livewire + AlpineJs
-   MySQL
-   Tailwind

# Requirements

    - PHP >= 7.3.0
    - Laravel >= 8.0

# Installation

```sh
git clone https://github.com/alexmaldonado-cl/todo-list-livewire.git
composer install
composer run-script post-root-package-install

php artisan key:generate
php artisan migrate

npm install
npm run watch
```

For livewire...

Update at config/livewire.php

```sh
asset_url => 'PUBLIC_PATH'
```
