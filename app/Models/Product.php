<?php

namespace App\Models;

use App\Models\Sale;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;
	protected $fillable = ['category_id', 'name', 'reference', 'price', 'weight', 'stock'];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function sales()
	{
		return $this->belongsToMany(Sale::class, 'details', 'product_id', 'sale_id')
			->withPivot('price', 'amount')
			->withTimestamps();
	}
}
