<!DOCTYPE html>
<!-- This is the opening tag for the HTML document. The language attribute is dynamically set using a Laravel helper function -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 and Vue 3 CRUD Application</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- This is a Laravel Blade directive associated with Vite (a build tool). It includes the necessary scripts for the app. -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app"></div>
</body>

</html>
