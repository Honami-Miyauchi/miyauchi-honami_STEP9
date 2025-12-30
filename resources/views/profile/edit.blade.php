@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">アカウント情報編集</h2>

<form action="{{ route('profile.update') }}" method="POST" class="bg-white p-6 rounded shadow">
    @csrf
    @method('PATCH')

    <div class="mb-4">
        <label class="block font-semibold mb-1">ユーザ名</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}"
               class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Eメール</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}"
               class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">名前</label>
        <input type="text" name="name_kanji" value="{{ old('name_kanji', $user->name_kanji) }}"
               class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">カナ</label>
        <input type="text" name="name_kana" value="{{ old('name_kana', $user->name_kana) }}"
               class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="flex gap-4 mt-6">
        <a href="{{ route('mypage') }}"
           class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
           戻る
        </a>

        <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            更新
        </button>
    </div>
</form>
@endsection
