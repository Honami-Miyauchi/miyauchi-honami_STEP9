@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-bold mb-4">商品一覧</h2>

    {{-- 検索フォーム --}}
    <form method="GET" action="{{ route('products.index') }}" class="mb-6 flex gap-4">
        <input type="text" name="keyword" value="{{ request('keyword') }}"
            placeholder="商品名を入力" class="border px-2 py-1 rounded w-1/3">

        <input type="number" name="min_price" value="{{ request('min_price') }}"
            placeholder="最低価格" class="border px-2 py-1 rounded w-1/6">

        <input type="number" name="max_price" value="{{ request('max_price') }}"
            placeholder="最高価格" class="border px-2 py-1 rounded w-1/6">

        <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded">検索</button>
    </form>

    {{-- 商品一覧テーブル --}}
    <table class="w-full bg-white shadow-sm rounded-lg overflow-hidden">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="px-4 py-2">商品番号</th>
                <th class="px-4 py-2">商品名</th>
                <th class="px-4 py-2">商品説明</th>
                <th class="px-4 py-2">画像</th>
                <th class="px-4 py-2">料金(¥)</th>
                <th class="px-4 py-2">詳細</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $product->id }}</td>
                    <td class="px-4 py-2">{{ $product->name }}</td>
                    <td class="px-4 py-2">{{ $product->description }}</td>

                    <td class="px-4 py-2">
                        @if ($product->image_url)
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                class="w-16 h-16 object-cover">
                        @else
                            <span class="text-gray-400">画像なし</span>
                        @endif
                    </td>

                    <td class="px-4 py-2">{{ number_format($product->price) }}</td>

                    <td class="px-4 py-2">
                        <a href="{{ route('products.show', $product->id) }}"
                            class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                            詳細
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

