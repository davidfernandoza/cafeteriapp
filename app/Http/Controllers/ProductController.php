<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
	public function showProducts()
	{
		$products = Product::with('category')->get();
		return view('product', compact('products'));
	}

	public function saveProduct(Request $request)
	{
		$product = new Product($request->all());
		$product->save();
		return response()->json(['status' => true]);
	}

	public function updateProduct(Product $product, Request $request)
	{
		$product->update($request->all());
		return response()->json(['status' => true]);
	}

	public function deleteProduct(Product $product)
	{
		$product->delete();
		return response()->json(['status' => true]);
	}

	public function subtractStock($product, $amount)
	{
		$product->stock -= $amount;
		$product->update();
	}
}
