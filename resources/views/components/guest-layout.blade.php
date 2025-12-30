<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン画面</title>

    {{-- Vite で CSS / JS を読み込む --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-gray-100">

    {{-- ヘッダー --}}
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">
                Cytech EC
            </h1>
            <nav class="flex gap-4 items-center text-sm">
                <a href="/" class="hover:underline">Home</a>
                <a href="/mypage" class="hover:underline">マイページ</a>
            </nav>
        </div>
    </header>

    {{-- メインコンテンツ（ここにログインフォームが入る） --}}
    <main class="min-h-screen flex flex-col items-center pt-10">
        <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md sm:rounded-lg">
            {{ $slot }}
        </div>
    </main>

    {{-- フッター --}}
    <footer class="bg-white border-t mt-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-center">
            <button class="bg-blue-500 text-white px-4 py-2 rounded text-sm">
                お問い合わせ
            </button>
            <p class="text-xs text-gray-500 mt-2">
                © 2024 Company, Inc
            </p>
        </div>
    </footer>

</body>
</html>
