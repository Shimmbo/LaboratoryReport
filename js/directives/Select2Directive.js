var calendarApp = angular.module('calendarApp');
calendarApp.directive('select2', function($timeout, $parse){
	return {
		restrict:'A',
		require:'ngModel',
		link:function(scope,element,attrs){
			$timeout(function (){
				element.select2();
				element.select2Initialized = true;
			});

			var refreshSelect = function(newVal, oldVal){
				if(!element.select2Initialized) return;
				$timeout(function (){
					element.trigger('change');
				});
			};

			var recreateSelect = function(){
				if(!element.select2Initialized) return;
				$timeout(function (){
					element.select2('destoy');
					element.select2();
				});
			};

			scope.$watch(attrs.ngModel, refreshSelect);

			if(attrs.ngOptions){
				var list = attrs.ngOptions.match(/ in ([^ ]*)/);
				scope.$watch(list,recreateSelect);
			}

			if(attrs.ngDisabled){
				scope.$watch(attrs.ngDisabled, refreshSelect);
			}
		}
	}
})