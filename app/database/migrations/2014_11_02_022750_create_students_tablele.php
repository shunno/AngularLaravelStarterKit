<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTablele extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		 Schema::create('students', function ($table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('roll',50);
            
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		 Schema::drop('students');
    }

}
