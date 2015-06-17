<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpaLeadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expa_leads', function(Blueprint $table)
		{
			$table->increments('id');	
			$table->string('keywords')->default('');			
			$table->integer('lc_id')->unsigned();	
			$table->foreign('lc_id')->references('expa_id')->on('lcs');
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
