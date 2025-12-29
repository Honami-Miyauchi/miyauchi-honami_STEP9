<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function form()
    {
        return view('contact.form');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);


        return redirect()->route('products.index')->with('success', 'お問い合わせを送信しました！');
    }
}

