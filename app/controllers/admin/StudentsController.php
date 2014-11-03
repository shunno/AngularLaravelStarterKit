<?php namespace Controllers\Admin;

use AdminController;
use Input;
use Lang;
use Student;
use CommitOperation;
use URL;
use Response;
use Redirect;
use Sentry;
use Str;
use Validator;
use View;

class StudentsController extends AdminController
{

        protected $student;

      public function __construct(Student $student)
      {
          $this->student = $student;
      }


      public function getIndex()
      {

        // Show the page
        return View::make('backend/students/index');
      }

      public function getStudents()
      {
               // Grab all the students
 
        return $this->student->paginate(10);

      }

      public function SaveStudent()
      {

           $input = Input::get('student');
           $student= new Student;
           $operation= CommitOperation::getInstance();
            if ($student->id>0) {
              $student=Student::find($student->id);  
           }
           $student->Name=$input['name'];
           $student->Roll=$input['roll'];

           if ($student->save()) {
              
               $operation->OperationId=$student->id;
               
           }
           else{

              $operation->Success=false;
           }

           return Response::json($operation);
      }

      public function DeleteStudent()
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