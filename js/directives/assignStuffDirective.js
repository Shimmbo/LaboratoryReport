var calendarApp = angular.module('calendarApp');
calendarApp.directive('stuffTeacherList', 
  function () {
    return {
        templateUrl: './templates/assignStuff.php',
        restrict: 'E',
        transclude: true,
        replace: true,
        scope: true,
    };
});