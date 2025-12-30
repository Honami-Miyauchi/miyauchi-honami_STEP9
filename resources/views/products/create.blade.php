@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">商品登録</h2>

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block">商品名</label>
            <input type="text" name="name" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block">価格</label>
            <input type="number" name="price" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block">商品説明</label>
            <textarea name="description" class="border p-2 w-full" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block">在庫数</label>
            <input type="number" name="stock" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block">商品画像</label>
            <input type="file" name="image" class="border p-2 w-full">
        </div>

        <div class="flex gap-4">
            <a href="{{ route('mypage') }}" class="bg-gray-400 text-white px-4 py-2 rounded">
                戻る
            </a>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                登録
            </button>
        </div>
    </form>
</div>
@endsection