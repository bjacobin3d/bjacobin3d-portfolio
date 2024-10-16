<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia></title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800&family=Roboto:wght@400&display=swap" crossorigin="anonymous">

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
