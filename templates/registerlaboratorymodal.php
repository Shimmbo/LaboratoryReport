<div class="modal fade" id="RegisterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Registro de laboratorio</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="Name">Nombre</label>
                        <input type="text" class="form-control" name="Name" placeholder="Nombre" ng-model="newLaboratory.Name">
                    </div>
                    <div class="form-group">
                        <label for="LastName">Descripción</label>
                        <input type="text" class="form-control" name="LastName" placeholder="Descripción" ng-model="newLaboratory.Description">
                    </div>
                                        <div class="form-group">
                        <label for="SecondLastName">Número de estudiantes</label>
                        <input type="text" class="form-control" name="SecondLastName" placeholder="Capacidad de estudiantes" ng-model="newLaboratory.NoStudents">
                    </div>
                    <button ng-click="addLaboratory()" class="btn btn-default">Agregar</button>
                </form>
            </div>
        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>
