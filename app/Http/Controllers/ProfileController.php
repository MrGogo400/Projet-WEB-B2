<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
       $orders = Auth::user()->orders;
       $orders->transform(function($order, $order_number) {
           $order->cart = unserialize($order->cart);
           return $order;
       });
       return view('profile.index', ['orders' => $orders->SortByDesc('created_at')]);
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->save();
        return redirect('/profile')->with('success', 'Profile updated!');
    }
}

