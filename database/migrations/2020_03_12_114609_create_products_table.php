<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('user_id');
			$table->string('name', 191);
			$table->integer('brand_id');
			$table->string('body', 191);
			$table->string('image', 191);
			$table->integer('price');
			$table->integer('discount');
			$table->integer('status');
			$table->integer('count');
			$table->integer('salesـnumber')->default(0);
			$table->integer('special')->default(0);
			$table->integer('category_id');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
