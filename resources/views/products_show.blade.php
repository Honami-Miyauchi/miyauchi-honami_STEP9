@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-bold mb-4">商品詳細</h2>

    <div class="bg-white p-6 rounded shadow">
        <p><strong>商品名：</strong> {{ $product->name }}</p>
        <p><strong>説明：</strong> {{ $product->description }}</p>

        @if ($product->image_url)
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-48 mt-4">
        @endif

        <p class="mt-4"><strong>価格：</strong> ¥{{ number_format($product->price) }}</p>

        <a href="{{ route('products.index') }}"
           class="mt-6 inline-block bg-gray-500 text-white px-4 py-2 rounded">
            一覧に戻る
        </a>
    </div>
@endsection
