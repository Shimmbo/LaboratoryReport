var calendarApp = angular.module('calendarApp');

calendarApp.directive('datePickerInput', function () {
    return {
        restrict: 'A',
        require: 'ngModel',
        link: function (scope, element, attrs, ngModel) {
            var startDate = moment([2012]).format("YYYY-MM-DD");
            element.datepicker({
            	minViewMode: 1,
                format: "yyyy-mm-dd",
                autoclose: true,
                orientation: "top",
                startDate: startDate,
                language: 'es',
                onSelect: function (text) {
                    scope.$apply(function () {
                        ngModel.$setViewValue(text);
                    })
                }
            });
        }
    }
})