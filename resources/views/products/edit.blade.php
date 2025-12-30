@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">出品商品編集</h2>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block font-semibold mb-1">商品名</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}"
               class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">価格</label>
        <input type="number" name="price" value="{{ old('price', $product->price) }}"
               class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">商品説明</label>
        <textarea name="description" rows="4"
                  class="w-full border px-3 py-2 rounded" required>{{ old('description', $product->description) }}</textarea>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">在庫数</label>
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
               class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">商品画像</label>
        <input type="file" name="image" class="w-full">
        @if ($product->image_url)
            <div class="mt-2">
                <img src="{{ asset($product->image_url) }}" alt="現在の画像" class="w-32 h-32 object-cover">
            </div>
        @endif
    </div>

    <div class="flex gap-4 mt-6">
        <a href="{{ route('products.manage', $product->id) }}"
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