<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXOrderdetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('Order_id')->unsigned()->index('order_details_Order_id_foreign');
			$table->integer('product_id');
			$table->integer('item');
			$table->integer('quantity');
			$table->float('price',15,2)->default('0.00');
			$table->float('amount_charged',15,2)->default('0.00');
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
		Schema::drop('order_details');
	}

}
