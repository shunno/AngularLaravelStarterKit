@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
@lang('admin/posts/title.blogmanagement') ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div ng-controller="StudentController">

<div class="row">
 <div class="col-md-4">
<div class="form-group">
                        <label>Name</label>
                        <input type="text" ng-model="Student.name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Roll</label>
                        <input type="text" ng-model="Student.roll" class="form-control" required>
                    </div>
                

                
                    <button type="submit" ng-disabled="SaveDisabled" class="btn btn-primary" ng-click="Save()">Save</button>
                    <button type="submit" class="btn btn-warning" ng-click="Reset()">Reset</button>
                


</div>

<div class="col-md-8">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th class="span1"></th>
            <th class="span6">Name</th>
            <th class="span1"><i class="fa fa-comments"></i>Roll</th>
            
        </tr>
    </thead>
    <tbody>
    
        <tr ng-repeat="student in Students">
            <td><a ng-click="Edit($index)"><span class="glyphicon glyphicon-pencil"></span></a></td>
            <td ng-bind="student.name"> </a></td>
            <td ng-bind="student.roll"> </td>
           
            <td><a ng-click="Delete($index)"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
        
    </tbody>
</table>
</div>
</div>


@stop

{{-- Student Angular --}}
@section('body_bottom')
<script src="{{ asset('assets/js/app/app.js') }}"></script>
        <script src="{{ asset('assets/js/app/student/StudentCtrl.js') }}"></script>

@stop
