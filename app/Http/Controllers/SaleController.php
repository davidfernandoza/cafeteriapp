<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;

class SaleController extends Controller
{
	private $productController;
	public function __construct(ProductController $productController)
	{
		$this->productController = $productController;
	}

	public function showSales()
	{
		$sales = Sale::with('products')
			->whereHas('products')
			->get();

		return view('sale', compact('sales'));
	}

	public function saveSale(Request $request, Product $product)
	{
		try {
			DB::beginTransaction();
			$sale = new Sale($request->sale);
			$sale->save();

			// Create detail
			$sale->products()->attach($product, $request->detail);
			$this->productController->subtractStock($product, $request->detail['amount']);

			DB::commit();
			return response()->json(['status' => true]);
		} catch (\Throwable $th) {
			DB::rollback();
			throw new \Exception($th);
		}
	}
}
