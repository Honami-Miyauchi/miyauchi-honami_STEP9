@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">お問い合わせフォーム</h2>

<form action="{{ route('contact.submit') }}" method="POST" class="bg-white p-6 rounded shadow">
    @csrf

    <div class="mb-4">
        <label class="block font-semibold mb-1">名前</label>
        <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">メールアドレス</label>
        <input type="email" name="email" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">お問い合わせ内容</label>
        <textarea name="message" rows="4" class="w-full border px-3 py-2 rounded" required></textarea>
    </div>

    <div class="flex gap-4 mt-6">
        <a href="{{ route('products.index') }}"
           class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
           戻る
        </a>

        <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            送信
        </button>
    </div>
</form>
@endsection
