<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFiltersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('filters', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('category_id');
			$table->string('name', 191);
			$table->string('en_name', 191);
			$table->integer('parent_id');
			$table->integer('type');
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
		Schema::drop('filters');
	}

}
