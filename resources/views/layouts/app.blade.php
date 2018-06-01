<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div id="app">
        <div class="wrapper">
            @include('layouts.app.header')
            @section('sidebar')
                @include('layouts.app.sidebar')
            @show
            <div class="content-wrapper">
                <section class="content-header">
                    @yield('content-header')
                </section>
                <section class="content">
                    @include('flash::message')
                    @yield('content')

                </section>
            </div>
            @include('layouts.app.footer')
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
