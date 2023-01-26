<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enroll</title>
    @vite(['resources/css/bootstrap-5.3.css','resources/js/src/bootstrap-5.3.js'])
    @stack('styles')

</head>
<body>

@yield('content')

<script src="{{asset('plugin/jquery.js')}}"></script>
<script src="{{asset('plugin/moment.min.js')}}"></script>

@stack('scripts')

    
</body>
</html>