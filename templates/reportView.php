
<div ng-controller="ReportCtrl">
	<form>
    	<div class="form-group">
			<div class="col-md-4">
				<input date-picker-input type="text" class="form-control" ng-model="startDate" id="dateFrom">
			</div>
        </div>
        <button ng-click="GenerateReport()" class="btn btn-default pull-right">Generar reporte</button>
    </form>
    <a ng-show="visible" ng-click="DownloadReport()" class="btn btn-default pull-right">Descargar reporte</a>
	<table st-table="displayedCollection" st-safe-src="rowCollection" class="table table-striped">
		<thead>
		<tr>
			<th st-sort="Name">Total de alumnos</th>
			<th st-sort="LastName">Carrera</th>
			<th st-sort="SecondLastName">Alumno por día</th>
		</tr>
		<tr>
			<th colspan="5"><input st-search="" class="form-control" placeholder="Buscar..." type="text"/></th>
		</tr>
		</thead>
		<tbody>
		<tr ng-repeat="row in rows">
			<td>{{row.Total}}</td>
			<td>{{row.Name}}</td>
			<td>{{row.DailyAvg}}</td>
			<td >
			</td>
		</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="5" class="text-center">
					<div st-pagination="" st-items-by-page="itemsByPage" st-displayed-pages="10"></div>
				</td>
			</tr>
		</tfoot>
	</table>
</div>