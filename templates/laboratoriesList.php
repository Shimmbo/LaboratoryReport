<div ng-controller="LaboratoryCtrl">

	<button type="button" ng-click="toogleLaboratoryModal()" class="btn btn-sm btn-success pull-right">
		<i class="glyphicon glyphicon-plus">
		</i> Agregar laboratorio
	</button>

	<table st-table="displayedCollection" st-safe-src="rowCollection" class="table table-striped">
		<thead>
		<tr>
			<th st-sort="Name">Nombre</th>
			<th st-sort="Description">Descripción</th>
			<th st-sort="NoStudents">Capacidad de estudiantes</th>
		</tr>
		<tr>
			<th colspan="5"><input st-search="" class="form-control" placeholder="Buscar..." type="text"/></th>
		</tr>
		</thead>
		<tbody>
		<tr ng-repeat="laboratory in laboratories">
			<td>{{laboratory.Name}}</td>
			<td>{{laboratory.Description}}</td>
			<td>{{laboratory.NoStudents}}</td>
			<td >
			<button  type="button" ng-click="updateLaboratory(laboratory); toogleLaboratoryModal();" class="btn btn-sm btn-default pull-right">
				<i class="glyphicon glyphicon-pencil">
				</i>
			</button>
			<button type="button" ng-click="removeLaboratory(laboratory)" class="btn btn-sm btn-danger pull-right">
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
<register-laboratory-modal title="Registro" visible="showLaboratoryModal" ></register-laboratory-modal>
</div>