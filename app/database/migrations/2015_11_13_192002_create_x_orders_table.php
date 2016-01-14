<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('Order_id');
			$table->date('date');
			$table->string('customer')->nullable();
			$table->string('status');
			$table->float('total_amount',15,2)->default('0.00');
			$table->float('discount',15,2)->default('0.00');
			$table->float('payable_amount',15,2)->default('0.00');
			$table->float('payment',15,2)->default('0.00');
			$table->float('balance',15,2)->default('0.00');
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
		Schema::drop('orders');
	}

}
