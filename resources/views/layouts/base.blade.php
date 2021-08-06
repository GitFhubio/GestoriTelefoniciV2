<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- favicon --}}
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" >
    {{-- <div id="app"> --}}
        @include('layouts.auth-mynavbar')
        <main>
         @yield('content')
        </main>
        @include('layouts.myfooter')
    {{-- </div> --}}
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</div>
{{-- test animation on scroll --}}
<script src="https://unpkg.com/aos@next/dist/aos.js">
</script>
<script>
AOS.init({ // Global settings:
  once: true, //se metto false lo fa sempre non solo all'avvio,whether animation should happen only once, while scrolling down
  mirror: true,}) // whether elements should animate out while scrolling past them;
  </script>
<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
