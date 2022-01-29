<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
	use SoftDeletes;
	protected $fillable = ['total_price', 'client'];

	public function products()
	{
		return $this->belongsToMany(Product::class, 'details', 'sale_id', 'product_id')
			->withPivot('price', 'amount')
			->withTimestamps();
	}
}
