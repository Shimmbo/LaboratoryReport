var calendarApp = angular.module('calendarApp');


calendarApp.controller('AssignStuffCtrl', ['$scope','$http','$q' ,function ($scope,$http,$q) {
    $scope.showTeacherStuffModal = false;
    $scope.isAnUpdate = false;

    $scope.initTable = function(){
	    var request = $http.get("lib/getStuffTeachers.php");

	    request.success(function(data, status, headers, config) {
	        $scope.stuff_teachers = data;
	    });
	    request.error(function(data, status, headers, config) {
	        alert("Loading teachers failed!");
	    });
    }
    $scope.initTable();
	var teachers = $http.get("lib/getTeachers.php");
	  stuffes = $http.get("lib/getStuffes.php"),
	  hours = $http.get("lib/getCatalogHour.php");
	$q.all([teachers, stuffes, hours]).then(function(arrayOfResults) { 
	  $scope.teachers = arrayOfResults[0].data;
	  $scope.stuffes = arrayOfResults[1].data;
	  $scope.hours = arrayOfResults[2].data;
	});
    $scope.toggleStuffTeacherModal = function(){
        $scope.showTeacherStuffModal = !$scope.showTeacherStuffModal;
    }
    $scope.addStuffTeacher = function(){
        if(!$scope.isAnUpdate){
            $scope.newStuff_teacher = this.newStuff_teacher;
            var request = $http.post("lib/addStuffTeacher.php",JSON.stringify($scope.newStuff_teacher));
            request.success(function(data, status, headers, config) {
                var asd = jQuery.extend(true, {}, $scope.newStuff_teacher);
                $scope.initTable();
                $scope.newStuff_teacher.Id_Stuff = "";
                $scope.newStuff_teacher.Id_Teacher = "";
                $scope.newStuff_teacher.Id_Catalog_Hour = "";
                $scope.newStuff_teacher = {};
                $scope.showTeacherStuffModal = !$scope.showTeacherStuffModal;
            });
            request.error(function(data, status, headers, config) {
                alert("Loading teachers failed!");
            });
        }else{
            var request = $http.post("lib/updateStuffTeacher.php",JSON.stringify($scope.newStuff_teacher));
            request.success(function(data, status, headers, config) {
                $scope.stuff_teacher.Id_Stuff = $scope.newStuff_teacher.Id_Stuff;
                $scope.stuff_teacher.Id_Teacher = $scope.newStuff_teacher.Id_Teacher;
                $scope.stuff_teacher.Id_Catalog_Hour = $scope.newStuff_teacher.Id_Catalog_Hour;
                $scope.newStuff_teacher.Id_Stuff = "";
                $scope.newStuff_teacher.Id_Teacher = "";
                $scope.newStuff_teacher.Id_Catalog_Hour = "";
                $scope.newStuff_teacher = {};
                $scope.showTeacherStuffModal = !$scope.showTeacherStuffModal;
                $scope.isAnUpdate = false;
            });
            request.error(function(data, status, headers, config) {
                alert("Loading teachers failed!");
            });
        }
    }
    $scope.removeStuffTeacher = function(stuff_teacher){
        var index = $scope.stuff_teachers.indexOf(stuff_teacher);
        if (index !== -1) {
            var request = $http.post("lib/deleteStuffTeacher.php",JSON.stringify(stuff_teacher.Id_Stuff_Teacher));
            request.success(function(data, status, headers, config) {
                $scope.stuff_teachers.splice(index, 1);
            });
            request.error(function(data, status, headers, config) {
                alert("Loading teachers failed!");
            });
        }
    }
    $scope.deleteStuffTeacher = function(stuff_teacher){
        $scope.isAnUpdate = true;
        $scope.stuff_teacher = stuff_teacher;
        $scope.newTeacher = jQuery.extend(true, {}, $scope.stuff_teacher);
    }
	$scope.updateStuffTeacher = function(stuff_teacher){
        $scope.isAnUpdate = true;
        $scope.stuff_teacher = stuff_teacher;
        $scope.newStuff_teacher = jQuery.extend(true, {}, $scope.stuff_teacher);
    }

}]);