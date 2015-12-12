var calendarApp = angular.module('calendarApp');

calendarApp.controller('CalendarCtrl',
   function($scope, $compile, $timeout, uiCalendarConfig, $http, $q) {
    $scope.showModal = false;
    $scope.showEditModal = false;
    $scope.register = {Id_Laboratory:"",Id_Teacher:"",Id_RegisterCircustance:"",StudentsAssistanceNumber:""};
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    /* event source that pulls from google.com */
    $scope.eventSource = {
            url: "http://www.google.com/calendar/feeds/usa__en%40holiday.calendar.google.com/public/basic",
            className: 'gcal-event',           // an option!
            currentTimezone: 'America/Chicago' // an option!
    };
    $scope.refreshSelects = function(){
      var teachers = $http.get("lib/getTeachers.php");
          laboratories = $http.get("lib/getLaboratories.php"),
          circustances = $http.get("lib/getCircustances.php");
      $q.all([teachers, laboratories, circustances]).then(function(arrayOfResults) { 
          $scope.teachers = arrayOfResults[0].data;
          $scope.laboratories = arrayOfResults[1].data;
          $scope.circustances = arrayOfResults[2].data;
      });
    },
    $scope.initEvents = function(){
      var registers = $http.get("lib/getRegisters.php");
      $q.all([registers]).then(function(arrayOfResults) { 
        angular.forEach(arrayOfResults[0].data, function(value, key){
          $scope.events.push(value);
        });
      });
    }
    $scope.returnEmptyString = function (param){
      return param == null || param == undefined ? "":param;
    }
    /* event source that contains custom events on the scope */
    $scope.events = [
    ];
    /* add custom event*/
    $scope.addRegister = function() {
      $scope.register = this.register;
      $scope.register.Id_RegisterCircustance = $scope.register.Id_RegisterCircustance == undefined ? null : $scope.register.Id_RegisterCircustance; 
      $scope.register.Id_Catalog_Hour = $scope.Catalog_Hour;
      $scope.register.Id_Student = $scope.register.Id_Student == undefined ? null : $scope.register.Id_Student;
      $scope.register.DateRegister = $scope.LastDateClicked.replace("T", " ");
      var request = $http.post("lib/addRegister.php",JSON.stringify($scope.register));
        request.success(function(data, status, headers, config) {
          $scope.showModal = false;
          angular.forEach(data, function(value , key){
            $scope.events.push(value);
          });
        });
        request.error(function(data, status, headers, config) {
            alert("Loading teachers failed!");
        });

    };
    $scope.editRegister = function() {
      $scope.register = this.register;
      $scope.register.Id_RegisterCircustance = $scope.register.Id_RegisterCircustance == undefined ? null : $scope.register.Id_RegisterCircustance; 
      $scope.register.Id_Student = $scope.register.Id_Student == undefined ? null : $scope.register.Id_Student;
      var request = $http.post("lib/updateRegister.php",JSON.stringify($scope.register));
        request.success(function(data, status, headers, config) {
          console.log(data);
          $scope.showEditModal = false;
          $scope.lastCalEvent = data;
          uiCalendarConfig.calendars['myCalendar1'].fullCalendar('updateEvent',$scope.lastCalEvent)
        });
        request.error(function(data, status, headers, config) {
            alert("Loading teachers failed!");
      });
    }
    /* remove event */
    /* Change View */
    $scope.renderCalender = function(calendar) {
      $timeout(function() {
        if(uiCalendarConfig.calendars[calendar]){
          uiCalendarConfig.calendars[calendar].fullCalendar('render');
        }
      });
    };
    $scope.toggleRegisterModal = function(){
      $scope.showModal = !$scope.showModal;
    }
    $scope.toggleEditRegisterModal = function(){
      $scope.showEditModal = !$scope.showEditModal;
    }
     /* Render Tooltip */
    $scope.eventRender = function( event, element, view ) {
          element.html('<span class="removeEvent glyphicon glyphicon-trash pull-right" id="Delete"></span>'+event.title  );
        $compile(element)($scope);
    };
    /* config object */
    $scope.uiConfig = {
      calendar:{
        allDaySlot:false,
        height: 450,
        editable: false,
        header:{
          left: 'title',
          center: '',
          right: 'today prev,next'
        },
        lang:"es",
        defaultView:'agendaWeek',
        minTime:"08:00:00",
        maxTime:"22:00:00",
        slotLabelInterval:"02:00:00",
        eventRender: $scope.eventRender,
        eventAfterRender: function(event, element, view){
          $(element).css('height','20px');
        },
        dayClick: function(date, jsEvent, view, resourceObj) {
          $scope.LastDateClicked = date.format();
          $scope.toggleRegisterModal();
          var hour =date.format('LT');
          if(hour == "8:00 AM" || hour == "8:30 AM" || hour == "9:00 AM" || hour == "9:30 AM"){
            $scope.LastDateClicked = $scope.LastDateClicked.split('T')[0] + "T08:00:00";
            $scope.Catalog_Hour = 1;
          }
          else if(hour == "10:00 AM" || hour == "10:30 AM" || hour == "11:00 AM" || hour == "11:30 AM"){
            $scope.LastDateClicked = $scope.LastDateClicked.split('T')[0] + "T10:00:00";
             $scope.Catalog_Hour = 2;
          }
          else if(hour == "12:00 PM" || hour == "12:30 PM" || hour == "1:00 PM" || hour == "1:30 PM"){
            $scope.LastDateClicked = $scope.LastDateClicked.split('T')[0] + "T12:00:00";
             $scope.Catalog_Hour = 3;
          }
          else if(hour == "4:00 PM" || hour == "4:30 PM" || hour == "5:00 PM" || hour == "5:30 PM"){
            $scope.LastDateClicked = $scope.LastDateClicked.split('T')[0] + "T16:00:00";
             $scope.Catalog_Hour = 4;
          }
          else if(hour == "6:00 PM" || hour == "6:30 PM" || hour == "7:00 PM" || hour == "7:30 PM"){
            $scope.LastDateClicked = $scope.LastDateClicked.split('T')[0] + "T18:00:00";
             $scope.Catalog_Hour = 5;
          }
          else if(hour == "8:00 PM" || hour == "8:30 PM" || hour == "9:00 PM" || hour == "9:30 PM"){
            $scope.LastDateClicked = $scope.LastDateClicked.split('T')[0] + "T20:00:00";
             $scope.Catalog_Hour = 6;
          }
        },
        eventClick : function(calEvent, jsEvent, view){
          if (jsEvent.target.id === 'Delete') {
            console.log($scope.events.indexOf(calEvent));
            var request = $http.post("lib/deleteRegister.php",JSON.stringify(calEvent.id));
            request.success(function(data, status, headers, config) {
              uiCalendarConfig.calendars['myCalendar1'].fullCalendar('removeEvents',calEvent._id);
            });
            request.error(function(data, status, headers, config) {
                alert("Loading teachers failed!");
            });

            return false;
          }
          $scope.toggleEditRegisterModal();
          $scope.lastCalEvent = calEvent;
          $scope.register = calEvent;
          $scope.register.Id_Laboratory = calEvent.Id_Laboratory;
          $scope.register.Id_Teacher = calEvent.Id_Teacher;
          $scope.register.Id_RegisterCircustance = calEvent.Id_Catalog_Circustance;
          $scope.register.StudentsAssistanceNumber = calEvent.StudentsAssistanceNumber;
          $scope.register.Id_Register_Teacher = calEvent.id;
          
        },
        viewRender: function (view, element) {
          $scope.initEvents();
        },
      }
    };

    $scope.uiConfig.calendar.dayNames = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
    $scope.uiConfig.calendar.dayNamesShort = ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"];
    $scope.uiConfig.calendar.monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    $scope.uiConfig.calendar.monthNamesShort = ["Ene", "Feb", "Mar","Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
    /* event sources array*/
    $scope.eventSources = [$scope.events, $scope.eventSource];
});