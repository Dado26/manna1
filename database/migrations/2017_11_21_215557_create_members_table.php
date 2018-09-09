<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('church_id')->unsigned()->index('fk_members_churches1_idx');
			$table->integer('user_id')->unsigned()->index('fk_members_users1_idx');
			$table->string('first_name', 45)->nullable();
			$table->string('last_name', 45)->nullable();
			$table->string('city', 45)->nullable();
			$table->string('adress', 45)->nullable();
			$table->dateTime('baptized_water')->nullable();
			$table->string('baptized_spirit', 45)->nullable();
			$table->text('comment', 65535)->nullable();
			$table->string('image')->nullable();
			$table->integer('phone')->nullable();
			$table->string('email')->nullable();
			$table->boolean('active')->nullable()->default(1);
			$table->timestamps();
			$table->softDeletes();
			$table->primary(['id','church_id','user_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('members');
	}

}
