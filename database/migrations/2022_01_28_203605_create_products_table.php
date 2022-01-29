<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
	public function up()
	{
		Schema::create('products', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('category_id');
			$table->string('name');
			$table->string('reference');
			$table->integer('price');
			$table->integer('weight');
			$table->integer('stock');
			$table->softDeletes();
			$table->timestamps();

			$table
				->foreign('category_id')
				->references('id')
				->on('categories')
				->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::dropIfExists('products');
	}
}
