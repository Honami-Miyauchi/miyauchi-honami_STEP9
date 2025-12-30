@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-bold mb-4">商品詳細</h2>

    @if(session('success'))
    <p class="text-green-600 font-bold mb-4">{{ session('success') }}</p>
    @endif
    @if(session('error'))
    <p class="text-red-600 font-bold mb-4">{{ session('error') }}</p>
    @endif

    <div class="bg-white p-6 rounded shadow">
        <p><strong>ID:</strong> {{ $product->id }}</p>
        <p><strong>商品名:</strong> {{ $product->name }}</p>
        <p><strong>説明:</strong> {{ $product->description }}</p>
        <p><strong>料金:</strong> ¥{{ number_format($product->price) }}</p>

        @if ($product->image_url)
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-48 h-48 object-cover mt-4">
        @endif

        <div class="mt-6 flex items-center gap-4">
            <button id="heartBtn"
                class="w-10 h-10 border-2 border-black rounded-full flex items-center justify-center text-black text-2xl bg-white">
                ♡
            </button>

            <a href="{{ route('products.buy', $product->id) }}"
             class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            カートに入れる
        </a>

        </div>

        <a href="{{ route('products.index') }}" class="inline-block mt-4 text-blue-500 hover:underline">
            ← 商品一覧に戻る
        </a>
    </div>
@endsection


