<?php namespace Controllers\Admin;

use AdminController;
use Input;
use Lang;
use DB;
use Course;
use Student;
use Student_Course;
use CommitOperation;
use URL;
use Response;
use Redirect;
use Sentry;
use Str;
use Validator;
use View;

class StudentCourseController extends AdminController
{
      protected $student;
      protected $course;

      public function __construct(Course $course,Student $student)
      {
          $this->course = $course;
          $this->student = $student;

      }


      public function getIndex()
      {

        // Show the page
        return View::make('backend/studentcourse/index');
      }


      public function SaveStudentCourse()
      {

           $input = Input::get('studentcourse');
           $operation= CommitOperation::getInstance();
           
           DB::transaction(function(){
               $affectedRows = Student_Course::where('student_id', '=', Input::get('studentid'))->delete();
               if (count(Input::get('studentcourse'))>0) {
                Student_Course::insert(Input::get('studentcourse'));
               }
               
               
           });

           return Response::json($input);
      }

      public function GetStudentCourse()
      {
       // $id=Input::get('id');
        return DB::table('courses')
        ->leftJoin('student_course',function($join){

          $join->on('student_course.course_id', '=', 'courses.id')
               ->where('student_course.student_id','=',Input::get('id'));
           })
        ->select('student_course.id as studentcourseid', 'courses.id', 'courses.name')
        ->get();
        
      }


}