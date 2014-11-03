@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
@lang('admin/posts/title.blogmanagement') ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div ng-controller="StudentCourseController">

<div class="row">
 <div class="col-md-4">
    <h2>Student</h2>
<div class="form-group">
                        <label>Name</label>
                        <select  ng-model="Student" class="form-control" ng-change="GetStudentCourse()" required>
                            <option value="">Please Select a Student</option>
                                <option ng-repeat="student in Students" value="@{{student.id}}">@{{student.name}}</option>
                            </select>

                    </div>
                   

                
                    <button type="submit" class="btn btn-primary" ng-click="Save()">Save</button>
                    <button type="submit" class="btn btn-warning" ng-click="Reset()">Reset</button>
                


</div>

<div class="col-md-8">
    <h2> Assign Course </h1>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th class="span1"><input type="checkbox" ng-model="checkAll" ng-click="allchecked()"/> Check All</th>
            <th class="span6">Name</th>
            
            
        </tr>
    </thead>
    <tbody>
        <tr ng-repeat="course in StudentCourse">
            <td><input type="checkbox" ng-model="course.studentcourse"/></td>
            <td ng-bind="course.name"> </td>
        </tr>
        
    </tbody>
</table>
</div>
</div>


@stop

{{-- Student Angular --}}
@section('body_bottom')
<script src="{{ asset('assets/js/app/app.js') }}"></script>
<script src="{{ asset('assets/js/app/StudentCourse/StudentCourseCtrl.js') }}"></script>

@stop
