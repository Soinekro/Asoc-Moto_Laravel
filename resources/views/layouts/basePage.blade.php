<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ str_replace('_',' ',config('app.name', 'Laravel')) }}</title>

        @include('layouts.commom_fonts')
        @include('layouts.commom_css')
        @include('layouts.commom_js')
</head>
<body>
    @yield('content')
    @yield('footer')
</body>
</html>
