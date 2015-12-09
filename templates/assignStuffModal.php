<div class="modal fade" id="RegisterModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Asignación de materia</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="Name">Matería</label>
                        <select class="form-control" ng-model="newStuff_teacher.Id_Stuff" ng-options="stu.Id_Stuff as stu.Name for stu in stuffes" select2>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="LastName">Maestro</label>
                         <select class="form-control" ng-model="newStuff_teacher.Id_Teacher" ng-options="tea.Id_Teacher as tea.Name +'&nbsp;'+ tea.LastName  +'&nbsp;'+ returnEmptyString(tea.SecondLastName) for tea in teachers" select2>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="LastName">Horario</label>
                         <select class="form-control" ng-model="newStuff_teacher.Id_Catalog_Hour" ng-options="hor.Id_Catalog_Hour as hor.Name for hor in hours" select2>
                        </select>
                    </div>

                    <button ng-click="addStuffTeacher()" class="btn btn-default">Agregar</button>
                </form>
            </div>
        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>
