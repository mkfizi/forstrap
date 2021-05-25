<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ __('Forstrap') }}</title>

    {{-- Bootstrap CSS --}}
    <link href="{{ asset('assets/css') }}/bootstrap.min.css" rel="stylesheet">

    {{-- Custom CSS --}}
    <style>
        body{
            background-color: #f7fafc;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('assets/js') }}/popper.min.js"></script>
    <script src="{{ asset('assets/js') }}/bootstrap.min.js"></script>
</body>
</html>