var calendarApp = angular.module('calendarApp');


calendarApp.controller('ReportCtrl', ['$scope','$http', function ($scope,$http) {
	$scope.startDate;
	$scope.visible = false;
    $scope.GenerateReport = function(){
	    var request = $http.post("lib/getReport.php",JSON.stringify($scope.startDate));
	    request.success(function(data, status, headers, config) {
	        $scope.rows = data;
	        $scope.visible =true;
	    });
	    request.error(function(data, status, headers, config) {
	        alert("Loading laboratories failed!");
	    });
    }
    $scope.DownloadReport = function(){
    	var data = $scope.rows.map(function(elem){
    								return elem.Total+";"+ elem.Name+";" + elem.DailyAvg;
								}).join(",");
    	console.log(data);
	    var mapForm = document.createElement("form");
	    mapForm.setAttribute('accept-charset','"UTF-8"')
	    mapForm.method = "POST"; // or "post" if appropriate
	    mapForm.action = "lib/tcpdf/pdfgenerator/GenerateReport.php";

	    var mapInput = document.createElement("input");
	    mapInput.type = "text";
	    mapInput.name = "addrs";
	    mapInput.value = data;
	    mapForm.appendChild(mapInput);

	    document.body.appendChild(mapForm);

	    mapForm.submit();
	    mapForm.delete();
    }
}]);