var calendarApp = angular.module('calendarApp');
calendarApp.directive('reportDirective', 
  function () {
    return {
        templateUrl: './templates/reportView.php',
        restrict: 'E',
        transclude: true,
        replace: true,
        scope: true,
    };
});