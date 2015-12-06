<div class="modal fade" id="RegisterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Registro de maestro</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="Name">Nombre</label>
                        <input type="text" class="form-control" name="Name" placeholder="Nombre" ng-model="newTeacher.Name">
                    </div>
                    <div class="form-group">
                        <label for="LastName">Apellido paterno</label>
                        <input type="text" class="form-control" name="LastName" placeholder="Apellido paterno" ng-model="newTeacher.LastName">
                    </div>
                                        <div class="form-group">
                        <label for="SecondLastName">Apellido materno</label>
                        <input type="text" class="form-control" name="SecondLastName" placeholder="Apellido materno" ng-model="newTeacher.SecondLastName">
                    </div>
                                        <div class="form-group">
                        <label for="Enrollment">Matrícula</label>
                        <input type="text" class="form-control" name="Enrollment" placeholder="Matrícula" ng-model="newTeacher.Enrollment">
                    </div>
                    <button ng-click="addTeacher()" class="btn btn-default">Agregar</button>
                </form>
            </div>
        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>
