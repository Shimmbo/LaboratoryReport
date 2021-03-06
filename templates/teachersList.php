<div ng-controller="TeacherCtrl">

	<button type="button" ng-click="toggleTeacherModal()" class="btn btn-sm btn-success pull-right">
		<i class="glyphicon glyphicon-plus">
		</i> Agregar maestro
	</button>

	<table st-table="displayedCollection" st-safe-src="rowCollection" class="table table-striped">
		<thead>
		<tr>
			<th st-sort="Name">Nombre</th>
			<th st-sort="LastName">Apellido paterno</th>
			<th st-sort="SecondLastName">Apellido materno</th>
			<th st-sort="Enrollment">Matrícula</th>
		</tr>
		<tr>
			<th colspan="5"><input st-search="" class="form-control" placeholder="Buscar..." type="text"/></th>
		</tr>
		</thead>
		<tbody>
		<tr ng-repeat="teacher in teachers">
			<td>{{teacher.Name}}</td>
			<td>{{teacher.LastName}}</td>
			<td>{{teacher.SecondLastName}}</td>
			<td>{{teacher.Enrollment}}</td>
			<td >
			<button  type="button" ng-click="updateTeacher(teacher); toggleTeacherModal();" class="btn btn-sm btn-default pull-right">
				<i class="glyphicon glyphicon-pencil">
				</i>
			</button>
			<button type="button" ng-click="removeTeacher(teacher)" class="btn btn-sm btn-danger pull-right">
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
<register-teacher-modal title="Registro" visible="showTeacherModal" ></register-teacher-modal>
</div>