var calendarApp = angular.module('calendarApp');


calendarApp.controller('LaboratoryCtrl', ['$scope','$http', function ($scope,$http) {
    $scope.showLaboratoryModal = false;
    $scope.isAnUpdate = false;
    var request = $http.get("lib/getLaboratories.php");

    request.success(function(data, status, headers, config) {
        $scope.laboratories = data;
    });
    request.error(function(data, status, headers, config) {
        alert("Loading laboratories failed!");
    });
    $scope.toogleLaboratoryModal = function(){
        $scope.showLaboratoryModal = !$scope.showLaboratoryModal;
    }
    $scope.addLaboratory = function(){
        if(!$scope.isAnUpdate){
            $scope.newLaboratory = this.newLaboratory;
            var request = $http.post("lib/addLaboratory.php",JSON.stringify($scope.newLaboratory));
            request.success(function(data, status, headers, config) {
                var asd = jQuery.extend(true, {}, $scope.newLaboratory);
                $scope.laboratories.push(asd);
                $scope.newLaboratory.Name = "";
                $scope.newLaboratory.Description = "";
                $scope.newLaboratory.NoStudents = "";
                $scope.newLaboratory = {};
                $scope.showLaboratoryModal = !$scope.showLaboratoryModal;
            });
            request.error(function(data, status, headers, config) {
                alert("Loading laboratories failed!");
            });
        }else{
            var request = $http.post("lib/updateLaboratory.php",JSON.stringify($scope.newLaboratory));
            request.success(function(data, status, headers, config) {
                $scope.laboratory.Name = $scope.newLaboratory.Name;
                $scope.laboratory.Description = $scope.newLaboratory.Description;
                $scope.laboratory.NoStudents = $scope.newLaboratory.NoStudents;
                $scope.newLaboratory.Name = "";
                $scope.newLaboratory.Description = "";
                $scope.newLaboratory.NoStudents = "";
                $scope.newLaboratory = {};
                $scope.showLaboratoryModal = !$scope.showLaboratoryModal;
                $scope.isAnUpdate = false;
            });
            request.error(function(data, status, headers, config) {
                alert("Loading laboratories failed!");
            });
        }
    }
    $scope.removeLaboratory = function(laboratory){
        var index = $scope.laboratories.indexOf(laboratory);
        if (index !== -1) {
            var request = $http.post("lib/deleteLaboratory.php",JSON.stringify(laboratory.Id_Laboratory));
            request.success(function(data, status, headers, config) {
                $scope.laboratories.splice(index, 1);
            });
            request.error(function(data, status, headers, config) {
                alert("Loading laboratories failed!");
            });
        }
    }
    $scope.updateLaboratory = function(laboratory){
        $scope.isAnUpdate = true;
        $scope.laboratory = laboratory;
        $scope.newLaboratory = jQuery.extend(true, {}, $scope.laboratory);
    }

}]);