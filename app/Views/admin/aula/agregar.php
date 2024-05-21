<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Agregar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Articulo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="row">
                        <h2 class="text-center">Agregar</h2>
                        <div class="col-2"></div>

                        <div class="col-8">
                            <form action="<?= base_url('admin/aula/insert' ); ?>" method="POST"
                                onsubmit="return validarFormulario()">
                                <?= csrf_field() ?>
                                <div class="mb-3 my-4">
                                    <label for="idAula" class="form-label">ID del Aula</label>
                                    <input type="text" class="form-control" name="idAula" id="idAula"
                                        value="<?= $idAula ?>" readonly>
                                </div>


                                <div class="form-group ilustracion">
                                    <label for="ilustracion">Imagen</label>
                                    <input type="file" class="form-control" name="ilustracion" id="ilustracion">
                                </div>

                                <label for="nombre" class="form-label">Nombre</label>
                                <select class="form-control" name="nombre" id="idMate" required>
                                    <?php foreach ($material as $materiales): ?>
                                    <option value="<?= $materiales->idMate ?>"><?= $materiales->idMate ?> -
                                        <?= $materiales->nombre ?></option>
                                    <?php endforeach; ?>
                                </select>


                                <label for="categoria" class="form-label">Categoría</label>
                                <select class="form-control" name="categoria" id="idCategoria" required>
                                    <?php foreach ($categorias as $categoria): ?>
                                    <option value="<?= $categoria->idCategoria ?>"><?= $categoria->idCategoria ?> -
                                        <?= $categoria->nombre ?></option>
                                    <?php endforeach; ?>
                                </select>


                                <div class="mb-3 my-4">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion"
                                        required></textarea>
                                </div>

                                <div class="mb-3 my-4">
                                    <label for="status" class="form-label">Estado</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                                <div class="form-group created_at">
                                    <label for="created_at">Fecha</label>
                                    <input type="text" class="form-control" name="created_at" id="created_at_input"
                                        readonly>
                                </div>
                                <script>
                                function getFormattedDate() {
                                    const date = new Date();
                                    const year = date.getFullYear();
                                    let month = date.getMonth() + 1;
                                    let day = date.getDate();

                                    month = month < 10 ? '0' + month : month;
                                    day = day < 10 ? '0' + day : day;

                                    return year + '-' + month + '-' + day;
                                }

                                document.getElementById('created_at_input').value = getFormattedDate();
                                </script>

                                <div class="mb-3 my-4">
                                    <input type="submit" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>