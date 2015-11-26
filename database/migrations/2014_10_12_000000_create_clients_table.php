<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('account_type');
			$table->string('firstname');
			$table->string('midname');
			$table->string('lastname');
			$table->string('suffix');
			$table->string('account_name');
			$table->string('taxpayer_num');
			$table->date('date_of_birth');
			$table->string('driver_license');
			$table->string('issuing_state');
			$table->date('expiration_date');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('address1');
			$table->string('address2');
			$table->string('address3');
			$table->string('state');
			$table->string('zipcode');
			$table->string('phone');
			$table->string('bank_name');
			$table->string('routing_number');
			$table->string('account_number');
			$table->string('name_on_account');
			$table->integer('bank_account_type');
			$table->rememberToken();
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
		Schema::drop('clients');
	}

}
