app.service('StudentCourseService', ['$http', function ($http) {
    var self = this;

    var urlBase = 'studentcourse/';

    self.Get = function () {
        return $http.get(urlBase + 'getstudentcourse');
    };

    self.GetStudents=function () {
        return $http.get('students/getstudents');
    }
    self.GetStudentCourse=function(tmpid){

        return $http.get(urlBase+'getstudentcourse?id='+tmpid);
    }

    self.Save = function (tmpsudentcourse,stdid) {
        return $http.post(urlBase + 'create', { studentcourse: tmpsudentcourse,studentid:stdid });
    }
}]);

app.controller('StudentCourseController', ['StudentCourseService', '$scope', function (StudentCourseService, $scope) {

    var self = this;
    $scope.Students = [];
    $scope.StudentCourse=[];
    $scope.Student = {};
    $scope.checkAll=false;
    self.current;
    self.edit = false;

    $scope.allchecked=function(){


        angular.forEach($scope.StudentCourse,function(item){

            item.studentcourse=!$scope.checkAll;
        });
    }

    function GetStudents() {

        StudentCourseService.GetStudents().success(function (data) {
            $scope.Students = data.data;
            console.clear();
            console.log(data);
        }).error(function (data) {

        });
    };
    GetStudents();
    $scope.GetStudentCourse=function(){
    $scope.StudentCourse = [];
     var id=$scope.Student;
    if (id>0) {


     StudentCourseService.GetStudentCourse(id).success(function (data) {
            angular.forEach(data,function(item){

                if (item.studentcourseid>0) {
                    item.studentcourse=true;
                }
                else{

                     item.studentcourse=false;
                }
            });
            $scope.StudentCourse = data;
            console.clear();
            console.log(data);
        }).error(function (data) {

        });
    }
      };
    //GetStudentCourse();
    $scope.getStatus=function(value){

        if (value===null) {

            return false;
        }
        else
        {

            return true;
        }

    };


    $scope.Save = function () {

        var datasToSave=[];

        angular.forEach($scope.StudentCourse,function(item){

            if (item.studentcourse==true) {

                datasToSave.push({student_id:$scope.Student,course_id:item.id});
            };

        });

        console.log(datasToSave);

        StudentCourseService.Save(datasToSave,$scope.Student).success(function (data) {

            alert("Success");
            if (self.edit) {
                $scope.Students[self.current] = $scope.Student;
            }
            else {
                $scope.Student.id = data.OperationId;
                $scope.Students.push($scope.Student);
            }
            $scope.Reset();

        }).error(function (error) {


        });

    }
    $scope.Reset = function () {

        $scope.Student = {};
        $scope.StudentCourse=[];
        $scope.checkAll=false;

    }


}]);