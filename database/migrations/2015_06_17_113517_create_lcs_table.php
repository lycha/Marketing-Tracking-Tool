<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLcsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lcs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dropPrimary( 'id' );
			$table->integer('expa_id')->unsigned();
			$table->primary('expa_id');			
			$table->string('name')->default('');		
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
