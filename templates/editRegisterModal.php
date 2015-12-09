<div class="modal fade" id="RegisterModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edición de laboratorio utilizado</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="SecondLastName">Comentario de edición</label>
                        <input type="text" class="form-control" name="SecondLastName" ng-model="register.Comments">
                    </div>
                    <div class="form-group">
                        <label for="Name">Laboratorio</label>
                        <select class="form-control" ng-model="register.Id_Laboratory" ng-options="lab.Id_Laboratory as lab.Name for lab in laboratories" select2>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="LastName">Maestro</label>
                         <select class="form-control" ng-model="register.Id_Teacher" ng-options="tea.Id_Teacher as tea.Name +'&nbsp;'+ tea.LastName  +'&nbsp;'+ returnEmptyString(tea.SecondLastName) for tea in teachers" select2>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="LastName">Razón por la que no hubo clases</label>
                         <select class="form-control" ng-model="register.Id_RegisterCircustance" ng-options="cir.Id_RegisterCircustance as cir.Description for cir in circustances" select2>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="SecondLastName">Número de estudiantes</label>
                        <input type="text" class="form-control" name="SecondLastName" placeholder="Capacidad de estudiantes" ng-model="register.StudentsAssistanceNumber">
                    </div>
                    <button ng-click="editRegister()" class="btn btn-default">Actualizar</button>
                </form>
            </div>
        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>
