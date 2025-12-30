<x-guest-layout>
    <x-input-error :messages="$errors->all()" class="mb-4" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- ユーザ名（name） --}}
        <div>
            <label for="name">ユーザ名</label>
            <input id="name" class="block mt-1 w-full" type="text" name="name"
                   value="{{ old('name') }}" required autofocus>
        </div>

        {{-- 名前（漢字） --}}
        <div class="mt-4">
            <label for="name_kanji">名前（漢字）</label>
            <input id="name_kanji" class="block mt-1 w-full" type="text" name="name_kanji"
                   value="{{ old('name_kanji') }}" required>
        </div>

        {{-- 名前（カナ） --}}
        <div class="mt-4">
            <label for="name_kana">名前（カナ）</label>
            <input id="name_kana" class="block mt-1 w-full" type="text" name="name_kana"
                   value="{{ old('name_kana') }}" required>
        </div>

        {{-- メールアドレス --}}
        <div class="mt-4">
            <label for="email">メールアドレス</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email"
                   value="{{ old('email') }}" required>
        </div>

        {{-- パスワード --}}
        <div class="mt-4">
            <label for="password">パスワード</label>
            <input id="password" class="block mt-1 w-full" type="password" name="password" required>
        </div>

        {{-- パスワード確認 --}}
        <div class="mt-4">
            <label for="password_confirmation">パスワード（確認）</label>
            <input id="password_confirmation" class="block mt-1 w-full" type="password"
                   name="password_confirmation" required>
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="ml-4 bg-blue-500 text-white px-4 py-2 rounded">
                新規登録
            </button>
        </div>
    </form>
</x-guest-layout>
