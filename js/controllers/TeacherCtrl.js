var calendarApp = angular.module('calendarApp');


calendarApp.controller('TeacherCtrl', ['$scope','$http', function ($scope,$http) {
    $scope.showTeacherModal = false;
    $scope.isAnUpdate = false;
    var request = $http.get("lib/getTeachers.php");

    request.success(function(data, status, headers, config) {
        $scope.teachers = data;
    });
    request.error(function(data, status, headers, config) {
        alert("Loading teachers failed!");
    });
    $scope.toggleTeacherModal = function(){
        $scope.showTeacherModal = !$scope.showTeacherModal;
    }
    $scope.addTeacher = function(){
        if(!$scope.isAnUpdate){
            $scope.newTeacher = this.newTeacher;
            var request = $http.post("lib/addTeacher.php",JSON.stringify($scope.newTeacher));
            request.success(function(data, status, headers, config) {
                var asd = jQuery.extend(true, {}, $scope.newTeacher);
                $scope.teachers.push(asd);
                $scope.newTeacher.Name = "";
                $scope.newTeacher.LastName = "";
                $scope.newTeacher.SecondLastName = "";
                $scope.newTeacher.Enrollment = "";
                $scope.newTeacher = {};
                $scope.showTeacherModal = !$scope.showTeacherModal;
            });
            request.error(function(data, status, headers, config) {
                alert("Loading teachers failed!");
            });
        }else{
            var request = $http.post("lib/updateTeacher.php",JSON.stringify($scope.newTeacher));
            request.success(function(data, status, headers, config) {
                $scope.teacher.Name = $scope.newTeacher.Name;
                $scope.teacher.LastName = $scope.newTeacher.LastName;
                $scope.teacher.SecondLastName = $scope.newTeacher.SecondLastName;
                $scope.teacher.Enrollment = $scope.newTeacher.Enrollment;
                $scope.newTeacher.Name = "";
                $scope.newTeacher.LastName = "";
                $scope.newTeacher.SecondLastName = "";
                $scope.newTeacher.Enrollment = "";
                $scope.newTeacher = {};
                $scope.showTeacherModal = !$scope.showTeacherModal;
                $scope.isAnUpdate = false;
            });
            request.error(function(data, status, headers, config) {
                alert("Loading teachers failed!");
            });
        }
    }
    $scope.removeTeacher = function(teacher){
        var index = $scope.teachers.indexOf(teacher);
        if (index !== -1) {
            var request = $http.post("lib/deleteTeacher.php",JSON.stringify(teacher.Id_Teacher));
            request.success(function(data, status, headers, config) {
                $scope.teachers.splice(index, 1);
            });
            request.error(function(data, status, headers, config) {
                alert("Loading teachers failed!");
            });
        }
    }
    $scope.updateTeacher = function(teacher){
        $scope.isAnUpdate = true;
        $scope.teacher = teacher;
        $scope.newTeacher = jQuery.extend(true, {}, $scope.teacher);
    }

}]);