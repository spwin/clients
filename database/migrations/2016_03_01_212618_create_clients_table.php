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
			// GLOBAL
			$table->increments('id');
			$table->string('title', 100);
			$table->string('web', 100);
			$table->string('email', 100);
			$table->string('phone', 100);
			$table->string('person', 100);
			$table->string('comments', 1000);

			// STATUS
			$table->boolean('status_quote_sent');
			$table->boolean('status_got_reply');
			$table->boolean('status_collaboration');
			$table->boolean('status_friend');

			// SUMMARY [no, low, normal, good, high]
			$table->enum('rate_website', [0,1,2,3,4]);
			$table->enum('rate_performance', [0,1,2,3,4]);
			$table->enum('rate_design', [0,1,2,3,4]);
			$table->enum('rate_mobile', [0,1,2,3,4]);
			$table->enum('rate_seo', [0,1,2,3,4]);
			$table->enum('rate_multilingual', [0,1,2,3,4]);
			$table->enum('rate_social', [0,1,2,3,4]);
			$table->enum('rate_budget', [0,1,2,3,4]);
			$table->enum('rate_trusted', [0,1,2,3,4]);

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
