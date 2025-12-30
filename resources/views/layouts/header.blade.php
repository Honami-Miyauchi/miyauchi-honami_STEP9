<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Cytech EC</h1>

        <nav class="flex gap-4 items-center text-sm">

            {{-- ログインしていない時 --}}
            @guest
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">ログイン</a>
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">新規登録</a>
            @endguest

            {{-- ログインしている時 --}}
            @auth
                <span>{{ Auth::user()->name_kanji }} さん</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-500 hover:underline">ログアウト</button>
                </form>
            @endauth

        </nav>
    </div>
</header>

