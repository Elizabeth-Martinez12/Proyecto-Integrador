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
            <form action="<?= base_url('admin/inventario/insert'); ?>" method="POST" onsubmit="return validarFormulario()">
                <?= csrf_field() ?>
                <div class="mb-3 my-4">

                    <label for="idAula" class="form-label">ID del Aula</label>
                    <select class="form-control" name="idAula" id="id" required>
                        <?php foreach ($aulas as $aula): ?>
                        <option value="<?= $aula->id ?>"><?= $aula->id ?> - <?= $aula->numero ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <label for="nombre" class="form-label">Nombre</label>
                    <select class="form-control" name="nombre" id="idMate" required>
                        <?php foreach ($material as $materiales): ?>
                        <option value="<?= $materiales->idMate ?>"><?= $materiales->idMate ?> - <?= $materiales->nombre ?></option>
                        <?php endforeach; ?>
                    </select>


                <label for="categoria" class="form-label">Categoría</label>
                    <select class="form-control" name="categoria" id="idCategoria" required>
                        <?php foreach ($categoria as $categorias): ?>
                        <option value="<?= $categorias->idCategoria ?>"><?= $categorias->idCategoria ?> - <?= $categorias->nombre ?></option>
                        <?php endforeach; ?>
                    </select>


                <div class="mb-3 my-4">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
                </div>

                <div class="mb-3 my-4">
                    <label for="status" class="form-label">Estado</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>

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
