<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status', '0')->get();
        return view('index', compact('products'));
    }
    public function create(Request $request)
    {
        $request->validate([
            'productName' => 'required:unique:products',
            'productPrice' => 'required',
        ]);

        $product =  Product::insert([
            'product_name' => $request->productName,
            'product_price' => $request->productPrice,
            'description' => $request->description,
            'status' => '0',
            'created_at' => Carbon::now(),
        ]);

        if ($product) {
            return response()->json(['success' => true, 'message' => 'Product created successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to create product']);
        }
    }
}
