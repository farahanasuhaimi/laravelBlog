<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function homepage() {
        return view('homepage');
    }

    public function aboutPage() {
        $shopName = 'Kedai Nurza';
        $shopWhere = 'Rantau Panjang';
        $product = ['Girl`s Clothes', 'Boy`s Clothes'];
        return view('aboutus', ['name'=>$shopName, 'place'=>$shopWhere, 'products'=>$product]);
    }
}
