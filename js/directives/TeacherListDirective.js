var calendarApp = angular.module('calendarApp');
calendarApp.directive('teacherList', 
  function () {
    return {
        templateUrl: './templates/teachersList.php',
        restrict: 'E',
        transclude: true,
        replace: true,
        scope: true,
    };
});