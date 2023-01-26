<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrol - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <style>
             body {
                font-family: 'Nunito', sans-serif;
            }
    </style>
</head>
<body>

    @yield('content')

    <script src="{{asset('plugin/jquery.js')}}"></script>
    <script src="{{asset('plugin/moment.min.js')}}"></script>

    @stack('scripts')
    
</body>
</html>