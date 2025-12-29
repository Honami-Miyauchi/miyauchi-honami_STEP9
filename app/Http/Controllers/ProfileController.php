<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\PurchaseHistory;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        $user = $request->user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'name'     => 'required|string|max:255',
            'kana'     => 'required|string|max:255',
        ]);

        $user = $request->user();

        $user->username = $request->username;
        $user->email    = $request->email;
        $user->name     = $request->name;
        $user->kana     = $request->kana;

        $user->save();

        return redirect()->route('mypage')
            ->with('success', 'アカウント情報を更新しました！');
    }

    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function mypage()
    {
        $user = auth()->user();

        $myProducts = \App\Models\Product::where('user_id', $user->id)->get();

        $purchased = PurchaseHistory::where('user_id', $user->id)
            ->with('product')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('mypage', compact('user', 'myProducts', 'purchased'));
    }
}
