<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

        {{-- ヘッダー --}}
        <header class="bg-gray-100 p-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">Cytech EC</h1>

            <nav class="flex gap-4 items-center">
                <a href="/" class="text-blue-600">Home</a>
                <a href="/mypage" class="text-blue-600">マイページ</a>

                @auth
                    <span>ログインユーザー: {{ Auth::user()->name }}</span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-red-500">ログアウト</button>
                    </form>
                @endauth
            </nav>
        </header>

        {{-- メイン --}}
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

        {{-- フッター（カードの外） --}}
        <footer class="bg-gray-100 p-4 text-center mt-10">
            <button class="bg-blue-500 text-white px-4 py-2 rounded">お問い合わせ</button>

            <div class="mt-2">
                <a href="/" class="text-blue-600">Home</a> |
                <a href="/mypage" class="text-blue-600">マイページ</a>
            </div>

            <p class="text-sm mt-2">© 2024 Company, Inc</p>
        </footer>

    </body>
</html>
