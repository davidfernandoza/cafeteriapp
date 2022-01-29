<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{

    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');
						$table->unsignedBigInteger('product_id');
						$table->unsignedBigInteger('sale_id');
						$table->integer('price')->unsigned();
						$table->integer('amount')->unsigned();
						$table->softDeletes();
            $table->timestamps();

						$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
						$table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('details');
    }
}
