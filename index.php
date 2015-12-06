<!DOCTYPE html>
<html lang="es" ng-app="calendarApp" id="top">
    <head>
        <title>Control de alumnos</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap-theme.min.css" >
        <link rel="stylesheet" href="vendor/fullcalendar-2.4.0/fullcalendar.css">
        <link rel="stylesheet" href="css/app.css" />

    </head>
    <body data-spy="scroll" ng-controller="CalendarCtrl">
        <header class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand " role="button"  href="#">
                        UABCS
                    </a>
                </div>
            </div>
        </header>
        <div role="main">
            <div class="container">
                <section id="directives-calendar">
                    <div class="page-header">
                        <h1>Registro de alumnos en laboratorio</h1>
                    </div>
                    <div class="well">
                        <div class="row-fluid">
                            <div class="span4">
                            </div>
                            <div class="span8">
                                <tabset>
                                    <tab select="renderCalender('myCalendar1');">
                                        <tab-heading>
                                            <i class="glyphicon glyphicon-bell"></i> Calendario
                                        </tab-heading>
                                        <div class="alert-success calAlert" ng-show="alertMessage != undefined && alertMessage != ''">
                                            <h4>{{alertMessage}}</h4>
                                        </div>
                                        <div class="calendar" ng-model="eventSources" calendar="myCalendar1" ui-calendar="uiConfig.calendar"></div>
                                   </tab>
                                   <tab >
                                        <tab-heading>
                                            <i class="glyphicon glyphicon-bell"></i> Maestros
                                        </tab-heading>
                                        <teacher-list></teacher-list>
                                   </tab>
                                   <tab >
                                        <tab-heading>
                                            <i class="glyphicon glyphicon-bell"></i> Laboratorios
                                        </tab-heading>
                                        <laboratory-list></laboratory-list>
                                   </tab>
                                </tabset>
                            </div>

                        </div>
                    </div>
                    
                </section>
            </div>

        </div>
        
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-17352735-3']);
            _gaq.push(['_trackPageview']);
            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>
        <script src="vendor/jquery/jquery-1.9.1.min.js"></script>
        <script src="vendor/bootstrap/bootstrap.min.js" ></script>
        <script src="vendor/angular/angular.min.js"></script>
        <script src="vendor/angular/ui-bootstrap-tpls-0.13.0.js"></script>
        <script src="vendor/moment/moment.js"></script>
        <script src="vendor/fullcalendar-2.4.0/fullcalendar.js"></script>
        <script src="vendor/fullcalendar-2.4.0//gcal.js"></script>
        <script src="vendor/smart-table-master/smart-table.min.js"></script>
        <script src="js/calendar.js"></script>
        <script src="js/app.js"></script>
        <script src="js/controllers/CalendarCtrl.js"></script>
        <script src="js/controllers/TeacherCtrl.js"></script>
        <script src="js/controllers/LaboratoryCtrl.js"></script>
        <script src="js/directives/RegisterTeacherModal.js"></script>
        <script src="js/directives/TeacherListDirective.js"></script>
        <script src="js/directives/RegisterLaboratoryModal.js"></script>
        <script src="js/directives/LaboratoryListDirective.js"></script>
    </body>
</html>
