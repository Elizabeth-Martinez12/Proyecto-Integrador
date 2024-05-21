<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar silla</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <form method="POST">
                    <div class="form-group ilustracion">
                        <label for="ilustracion">Imagen</label>
                        <input type="file" class="form-control" name="ilustracion" id="ilustracion">
                    </div>

                    <div class="form-group nombre">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>

                    <div class="form-group descripcion">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion">
                    </div>

                    <div class="form-group status">
                      <label for="status">Estatus</label>
                      <select class="form-control" name="status" id="status">
                        <option value="true">Activo</option>
                        <option value="false">Inactivo</option>
                      </select>
                    </div>

                    <div class="form-group created_at">
                        <label for="created_at">Fecha</label>
                        <input type="text" class="form-control" name="created_at" id="created_at_input" readonly>
                    </div>

                    <script>
                        // Obtener la fecha actual en formato YYYY-MM-DD
                        function getFormattedDate() {
                            const date = new Date();
                            const year = date.getFullYear();
                            let month = date.getMonth() + 1;
                            let day = date.getDate();

                            // Agregar ceros a la izquierda si es necesario
                            month = month < 10 ? '0' + month : month;
                            day = day < 10 ? '0' + day : day;

                            return year + '-' + month + '-' + day;
                        }

                        // Establecer el valor del campo input con la fecha actual
                        document.getElementById('created_at_input').value = getFormattedDate();
                    </script>
                </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>