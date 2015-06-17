<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarketingLeadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('marketing_leads', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('uniqid', 39)->nullable();
			$table->dateTime('timestamp')->nullable()->default('now()');
			$table->string('utm_source', 50)->nullable();
			$table->string('utm_medium', 50)->nullable();
			$table->string('utm_campaign', 50)->nullable();
			$table->string('program', 50)->nullable();
			$table->string('bucket', 50)->nullable();
			$table->string('lc', 50)->nullable();
			$table->string('lc_form', 50)->nullable();
			$table->string('name', 50)->nullable();
			$table->string('surname', 50)->nullable();
			$table->string('email', 50)->nullable();
			$table->string('phone_number', 50)->nullable();
			$table->integer('registered')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('marketing_leads');
	}

}
