app.service('StudentService', ['$http', function ($http) {
    var self = this;

    var urlBase = 'students/';

    self.Get = function () {
        return $http.get(urlBase + 'getstudents');
    };

    self.Save = function (tmpsudent) {
        return $http.post(urlBase + 'create', { student: tmpsudent });
    }
    self.Delete = function (id) {
        return $http.get(urlBase + 'delete/?id=' +id);
    }
}]);

app.controller('StudentController', ['StudentService', '$scope', function (StudentService, $scope) {

    var self = this;
    $scope.Students = [];
    $scope.Student = {};
    self.current;
    self.edit = false;

    function GetStudents() {
        StudentService.Get().success(function (data) {
            $scope.Students = data.data;
            console.clear();
            console.log(data);
        }).error(function (data) {

        });
    };
    GetStudents();

    $scope.Edit = function (index) {
        self.edit = true;
        self.current = index;
        //angular.copy($scope.Students[index], current);
        angular.copy( $scope.Students[index],$scope.Student);

    }

    $scope.Delete = function (index) {
        var id = $scope.Students[index].id;
        console.log(id);
        StudentService.Delete(id).success(function (data) {
            $scope.Students.splice(index);
            alert("Success");


        }).error(function (error) {


        });
    }

    $scope.Save = function () {

        StudentService.Save($scope.Student).success(function (data) {

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

    }


}]);