<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->input('categories');
        $products = [];

        if ($selectedCategory) {
            $products = Produk::where('category', $selectedCategory)->get(); 
        }

        return view('home', compact('products', 'selectedCategory'));
    }
}
