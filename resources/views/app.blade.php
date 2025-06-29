<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @yield('title')
        </title>

        @vite(['resources/css/app.css', 'resources/js/main.ts'])

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    </head>
    <body class="antialiased font-sans bg-slate-100 min-h-screen py-4 text-slate-600 grid">
        <div 
            id="app" 
            class="w-3xl mx-auto bg-white rounded-xl shadow-xs flex flex-col overflow-hidden h-full"
        ></div>
    </body>
</html>
