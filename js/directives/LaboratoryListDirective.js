var calendarApp = angular.module('calendarApp');
calendarApp.directive('laboratoryList', 
  function () {
    return {
        templateUrl: './templates/laboratoriesList.php',
        restrict: 'E',
        transclude: true,
        replace: true,
        scope: true,
    };
});