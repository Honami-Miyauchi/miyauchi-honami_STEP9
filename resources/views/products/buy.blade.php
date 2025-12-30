@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">購入画面</h2>

<div class="bg-white p-6 rounded shadow">
    <div class="bg-white p-6 rounded shadow">

    {{-- 商品画像を表示 --}}
    @if ($product->image_url)
        <img src="{{ $product->image_url }}"
             alt="{{ $product->name }}"
             class="w-32 h-32 object-cover mb-4">
    @endif
    <p><strong>商品名：</strong> {{ $product->name }}</p>
    <p><strong>説明：</strong> {{ $product->description }}</p>
    <p><strong>金額：</strong> ¥{{ number_format($product->price) }}</p>
    <p><strong>残り：</strong> {{ $product->stock }}</p>

<form action="{{ route('products.purchase', $product->id) }}" method="POST">
    @csrf


        <label class="block mb-2 font-bold">数量：</label>

        <input type="number"
               name="quantity"
               min="1"
               max="{{ $product->stock }}"
               class="border p-2 rounded w-24"
               @if($product->stock == 0) disabled @endif>

        @if($product->stock == 0)
            <p class="text-red-500 mt-2">在庫がありません</p>
        @endif

        <div class="mt-4 flex gap-4">
            <button type="submit"
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
                @if($product->stock == 0) disabled @endif>
                購入する
            </button>

            <a href="{{ route('products.show', $product->id) }}"
               class="text-blue-500 hover:underline">
                戻る
            </a>
        </div>
    </form>
</div>
@endsection
