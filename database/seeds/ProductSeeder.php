<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
	public function run()
	{
		DB::table('products')->insert([
			'category_id' => 1,
			'name' => 'Cafe',
			'reference' => 'fg3423',
			'price' => 15000,
			'weight' => 1,
			'stock'=> 6,
			'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		]);

		DB::table('products')->insert([
			'category_id' => 2,
			'name' => 'Mecato',
			'reference' => 'mg34s3',
			'price' => 25000,
			'weight' => 1,
			'stock'=> 0,
			'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		]);

	}
}
