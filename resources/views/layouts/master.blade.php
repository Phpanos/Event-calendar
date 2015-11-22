<!-- Stored in resources/views/layouts/master.blade.php -->

<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link type="text/css" href="{{ __DIR__ . '/../../event-calendar/vendor/phpanos/event-calendar/public/assets/app.css' }}">
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>