<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produits = Produit::paginate(8);
        // return view('home', ['allproduits' => $produits]);
        return view('home',compact('produits')
    );}

    public function search(Request $request)
    {
        $search = $request->get('search');
        $produits = \DB::table('produits')->where('name', 'like', '%'.$search.'%')->paginate(8);
        return view ('home', ['produits' => $produits]);
    }
}
