<?php namespace Controllers\Admin;

use AdminController;
use Input;
use Lang;
use Course;
use CommitOperation;
use URL;
use Response;
use Redirect;
use Sentry;
use Str;
use Validator;
use View;

class CoursesController extends AdminController
{

        protected $course;

      public function __construct(Course $course)
      {
          $this->course = $course;
      }


      public function getIndex()
      {

        // Show the page
        return View::make('backend/courses/index');
      }

      public function getcourses()
      {
        
 
        return $this->course->get();

      }

      public function SaveCourse()
      {

           $input = Input::get('course');
           $course= new Course;
           $operation= CommitOperation::getInstance();
           $course->name=$input['name'];
           if ($course->save()) {
              
               $operation->OperationId=$course->id;
               
           }
           else{

              $operation->Success=false;
           }

           return Response::json($operation);
      }

      public function Deletecourse()
      {

        $id=Input::get('id');
        $student = Student::find($id);
        $operation= CommitOperation::getInstance();
        if ($student->delete()) {
          $operation->OperationId=$student->id;
        }
        else{

           $operation->Success=false;
        }

        return Response::json($operation);
      }


}