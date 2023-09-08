<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['products'] = Product::where('status', '1')->get();
        $data['categories'] = Category::where('status', '1')->get();
        return view('home/home', $data);
    }
}
