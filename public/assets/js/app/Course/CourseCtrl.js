app.service('CourseService', ['$http', function ($http) {
    var self = this;

    var urlBase = 'courses/';

    self.Get = function () {
        return $http.get(urlBase + 'getcourses');
    };

    self.Save = function (tmpcourse) {
        return $http.post(urlBase + 'create', { course: tmpcourse });
    }
    self.Delete = function (id) {
        return $http.get(urlBase + 'delete/?id=' +id);
    }
}]);

app.controller('CourseController', ['CourseService', '$scope', function (CourseService, $scope) {

    var self = this;
    $scope.Courses = [];
    $scope.Course = {};
    self.current;
    self.edit = false;

    function GetCourses() {
        CourseService.Get().success(function (data) {
            $scope.Courses = data;
            console.clear();
            console.log(data);
        }).error(function (data) {

        });
    };
    GetCourses();

    $scope.Edit = function (index) {
        self.edit = true;
        self.current = index;
        //angular.copy($scope.Courses[index], current);
        angular.copy( $scope.Courses[index],$scope.Course);

    }

    $scope.Delete = function (index) {
        var id = $scope.Courses[index].id;
        console.log(id);
        CourseService.Delete(id).success(function (data) {
            $scope.Courses.splice(index);
            alert("Success");


        }).error(function (error) {


        });
    }

    $scope.Save = function () {

        CourseService.Save($scope.Course).success(function (data) {

            alert("Success");
            if (self.edit) {
                $scope.Courses[self.current] = $scope.Course;
            }
            else {
                $scope.Course.id = data.OperationId;
                $scope.Courses.push($scope.Course);
            }
            $scope.Reset();

        }).error(function (error) {


        });

    }
    $scope.Reset = function () {

        $scope.Course = {};

    }


}]);