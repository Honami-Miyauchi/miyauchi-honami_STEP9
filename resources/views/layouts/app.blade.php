<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>
<body class="font-sans antialiased bg-gray-100">

    @include('layouts.header')

    <main class="max-w-7xl mx-auto py-6 px-4">
        @yield('content')
    </main>

    @include('layouts.footer')

</body>
</html>
