<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            To-do
        </title>

        @vite(['resources/css/app.css', 'resources/js/main.ts'])

    </head>
    <body class="antialiased font-sans">
        <div id="app">
            <app></app>
        </div>
    </body>
</html>
