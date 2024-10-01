<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $Products = Product::orderBy('created_at', 'desc')->get();
        if ($Products->isEmpty()) {
            return response()->json(['message' => 'No Products', 'Products' => []]);
        }

        return response()->json([
            'Products' =>  $Products
        ]);
    }
}
