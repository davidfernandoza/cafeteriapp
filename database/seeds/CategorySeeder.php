<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
	public function run()
	{

		DB::table('categories')->insert([
			'name' => 'PANADERIA',
			'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		]);
		DB::table('categories')->insert([
			'name' => 'CONFITERIA',
			'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
		]);

	}
}
