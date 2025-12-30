@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">出品商品詳細</h2>

<div class="bg-white p-6 rounded shadow">
    @if ($product->image_url)
        <img src="{{ $product->image_url }}"
             alt="{{ $product->name }}"
             class="w-32 h-32 object-cover mb-4">
    @endif

    <p><strong>商品名：</strong> {{ $product->name }}</p>
    <p><strong>説明：</strong> {{ $product->description }}</p>
    <p><strong>金額：</strong> ¥{{ number_format($product->price) }}</p>

    <div class="mt-4 flex gap-4">
        <a href="{{ route('products.edit', $product->id) }}"
           class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
           編集
        </a>

        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                    onclick="return confirm('本当に削除しますか？')">
                削除する
            </button>
        </form>

        <a href="{{ route('mypage') }}"
           class="text-blue-500 hover:underline">
           戻る
        </a>
    </div>
</div>
@endsection
