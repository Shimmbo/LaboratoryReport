<!DOCTYPE html>
<html lang="es" ng-app="calendarApp" id="top">
    <head>
        <title>Control de alumnos</title>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->

        <link rel="stylesheet" href="vendor/fullcalendar-2.4.0/fullcalendar.css">
        <link rel="stylesheet" href="css/app.css" />
        <link rel="stylesheet" href="css/Style.css" />

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
                                
                                </tabset>
                            </div>

                        </div>
                    </div>
                    
                </section>
            </div>

        </div>
  <register-modal title="Registro" visible="showModal"></register-modal>
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
        <!--script src="vendor/bootstrap/bootstrap.min.js"></script-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="vendor/angular/angular.min.js"></script>
        <script src="vendor/angular/ui-bootstrap-tpls-0.13.0.js"></script>
        <script src="vendor/moment/moment.js"></script>
        <script src="vendor/fullcalendar-2.4.0/fullcalendar.js"></script>
        <script src="vendor/fullcalendar-2.4.0//gcal.js"></script>
        <script src="js/calendar.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>
