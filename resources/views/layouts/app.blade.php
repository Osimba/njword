<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    <script src="https://kit.fontawesome.com/9fb397285d.js" crossorigin="anonymous"></script>

    <title>{{ config('app.name') }}</title>
</head>
<body>
    @include('layouts.topnav')

    <div id="app">
        @yield('content')
    </div>

    @include('layouts.footer')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
</body>
</html>