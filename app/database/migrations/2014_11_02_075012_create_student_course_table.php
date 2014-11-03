<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('student_course', function($table) {
            $table->increments('id')->unsigned();

            $table->integer('student_id')->unsigned();

            $table->foreign('student_id')->references('id')->on('students');

            $table->integer('course_id')->unsigned();

            $table->foreign('course_id')->references('id')->on('courses');

            
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
		Schema::table('student_course', function ($table) {

            $table->dropForeign('student_course_student_id_foreign');
            $table->dropForeign('student_course_course_id_foreign');
        });
		
		Schema::drop('student_course');
	}

}
