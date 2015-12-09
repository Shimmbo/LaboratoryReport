<div ng-controller="AssignStuffCtrl">

	<button type="button" ng-click="toggleStuffTeacherModal()" class="btn btn-sm btn-success pull-right">
		<i class="glyphicon glyphicon-plus">
		</i> Asignar horario
	</button>

	<table st-table="displayedCollection" st-safe-src="rowCollection" class="table table-striped">
		<thead>
		<tr>
			<th st-sort="Name">Nombre</th>
			<th st-sort="LastName">Apellido paterno</th>
			<th st-sort="SecondLastName">Apellido materno</th>
			<th st-sort="StuffName">Matería</th>
			<th st-sort="Hour">Horario</th>
		</tr>
		<tr>
			<th colspan="5"><input st-search="" class="form-control" placeholder="Buscar..." type="text"/></th>
		</tr>
		</thead>
		<tbody>
		<tr ng-repeat="stuffteacher in stuff_teachers">
			<td>{{stuffteacher.Name}}</td>
			<td>{{stuffteacher.LastName}}</td>
			<td>{{stuffteacher.SecondLastName}}</td>
			<td>{{stuffteacher.StuffName}}</td>
			<td>{{stuffteacher.Hour}}</td>
			<td >
			<button  type="button" ng-click="updateStuffTeacher(stuffteacher); toggleStuffTeacherModal();" class="btn btn-sm btn-default pull-right">
				<i class="glyphicon glyphicon-pencil">
				</i>
			</button>
			<button type="button" ng-click="removeStuffTeacher(stuffteacher)" class="btn btn-sm btn-danger pull-right">
				<i class="glyphicon glyphicon-remove">
				</i>
			</button>

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
<assign-teacher-stuff title="Registro" visible="showTeacherStuffModal" ></assign-teacher-stuff>
</div>