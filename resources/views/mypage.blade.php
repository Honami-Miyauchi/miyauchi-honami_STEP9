@extends('layouts.app')

@section('content')

    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-xl font-bold mb-4">マイページ</h2>

        <table class="w-full border-collapse">
            <tr class="border-b">
                <th class="py-2 w-40">ユーザ名</th>
                <td class="py-2">{{ $user->name }}</td>
            </tr>
            <tr class="border-b">
                <th class="py-2">Eメール</th>
                <td class="py-2">{{ $user->email }}</td>
            </tr>
            <tr class="border-b">
                <th class="py-2">名前</th>
                <td class="py-2">{{ $user->name_kanji ?? '未設定' }}</td>
            </tr>
            <tr class="border-b">
                <th class="py-2">カナ</th>
                <td class="py-2">{{ $user->name_kana ?? '未設定' }}</td>
            </tr>
        </table>

        <div class="mt-4">
            <a href="{{ route('profile.edit') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                アカウント編集
            </a>
        </div>
    </div>

    {{-- 出品商品 --}}
    <div class="bg-white p-6 rounded shadow mb-6">
        <h3 class="text-xl font-bold mb-4">出品商品</h3>

        <div class="mb-4 text-right">
            <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                新規登録
            </a>
        </div>

        @if($myProducts->isEmpty())
            <p>まだ出品した商品はありません。</p>
        @else
            <table class="w-full border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="py-2">商品番号</th>
                        <th class="py-2">商品名</th>
                        <th class="py-2">商品説明</th>
                        <th class="py-2">料金(¥)</th>
                        <th class="py-2">詳細</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($myProducts as $product)
                        <tr class="border-b">
                            <td class="py-2">{{ $product->id }}</td>
                            <td class="py-2">{{ $product->name }}</td>
                            <td class="py-2">{{ $product->description }}</td>
                            <td class="py-2">{{ number_format($product->price) }}</td>
                            <td class="py-2">
                            <a href="{{ route('products.manage', $product->id) }}"
                               class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                               詳細
                            </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    {{-- 購入した商品 --}}
    <div class="bg-white p-6 rounded shadow mb-6">
        <h3 class="text-xl font-bold mb-4">購入した商品</h3>

        @if($purchased->isEmpty())
            <p>まだ購入した商品はありません。</p>
        @else
            <table class="w-full border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="py-2">商品名</th>
                        <th class="py-2">商品説明</th>
                        <th class="py-2">料金(¥)</th>
                        <th class="py-2">個数</th>
                        <th class="py-2">購入日</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchased as $item)
                        <tr class="border-b">
                            <td class="py-2">{{ $item->product->name }}</td>
                            <td class="py-2">{{ $item->product->description }}</td>
                            <td class="py-2">{{ number_format($item->product->price) }}</td>
                            <td class="py-2">{{ $item->quantity }}</td>
                            <td class="py-2">{{ $item->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection

