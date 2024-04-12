<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="icon" href={{ URL::asset('/public/img/BoldogHaz.png')}}/>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    @include('app_scaffold.app-csslink')
    @yield('third_party_stylesheets')

    @stack('page_css')
    @yield('css')
</head>

<body class="hold-transition skin-black-light sidebar-mini">
    @include('app_scaffold.app-wraper')
    @include('app_scaffold.app-script')
    @yield('third_party_scripts')
    @stack('page_scripts')
    @yield('scripts')
</body>
</html>
