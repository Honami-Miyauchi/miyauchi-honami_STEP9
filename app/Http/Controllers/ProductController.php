<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PurchaseHistory;


class ProductController extends Controller
{
    public function test()
    {
        return view('products.test');
    }

    public function index(Request $request)
    {
        $query = Product::query();

        if (auth()->check()) {
            $query->where(function ($q) {
                $q->where('user_id', 0)
                  ->orWhere('user_id', '!=', auth()->id());
            });
        }

        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $query->orderBy('id', 'asc');

        $products = $query->get();

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function manage($id)
{
    $product = Product::findOrFail($id);

    if ($product->user_id !== auth()->id()) {
        abort(403, '権限がありません');
    }

    return view('products.manage', compact('product'));
}


    public function buy($id)
    {
        $product = Product::findOrFail($id);
        return view('products.buy', compact('product'));
    }

    public function purchase(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantity = (int)$request->quantity;

        if ($quantity < 1 || $quantity > $product->stock) {
            return back()->with('error', '数量が不正です');
        }

        $product->stock -= $quantity;
        $product->save();

        PurchaseHistory::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'quantity' => $quantity,
        ]);

        return redirect()->route('products.index')
                 ->with('success', '購入が完了しました！');

    }
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
        
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'image_url' => $imagePath,
        ]);

        return redirect()->route('mypage')->with('success', '商品を登録しました！');
    }
    public function destroy($id)
{
    $product = Product::findOrFail($id);

    if ($product->user_id !== auth()->id()) {
        abort(403, '権限がありません');
    }

    $product->delete();

    return redirect()->route('mypage')->with('success', '商品を削除しました！');
}

public function edit($id)
{
    $product = Product::findOrFail($id);

    if ($product->user_id !== auth()->id()) {
        abort(403, '権限がありません');
    }

    return view('products.edit', compact('product'));
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    if ($product->user_id !== auth()->id()) {
        abort(403, '権限がありません');
    }

    $request->validate([
        'name' => 'required',
        'price' => 'required|integer',
        'description' => 'required',
        'stock' => 'required|integer',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $product->image_url = $request->file('image')->store('products', 'public');
    }

    $product->name = $request->name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->stock = $request->stock;
    $product->save();

    return redirect()->route('products.manage', $product->id)->with('success', '商品を更新しました！');
}


}
