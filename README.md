laravel-sentry-tutorial
=======================

Sentry walkthough tutorial for Laravel 3.2.1

Installation
------------

1. checkout the code from github

    > git clone https://github.com/markwu/laravel-sentry-tutorial.git sentry-tutorual

2. Modif the following files for your need

    Change to your own key
    > sentry-tutorial/application/appliation.php

    Chenge yo your own database settings
    > sentry-tutorial/application/database.php

3. Migration

    > php artisan migrate::install
    > php artisan migrate sentry

4. That's it. Now you can play the following url to test Sentry functionality

    register a user
    > http://sentry-tutorial/register

    activate a user
    > http://sentry-tutorial/activate

    login
    > http://sentry-tutorial/login

    reset your password
    > http://sentry-tutorial/reset

    confirm the reset
    > http://sentry-tutorial/confirmation
