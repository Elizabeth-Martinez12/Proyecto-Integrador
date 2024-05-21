<?= $this->extend('template/main'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <h2 class="text-center">Editar</h2>
        <div class="col-2"></div>

        <div class="col-8">
            <form action="<?= base_url('admin/inventario/update'); ?>" method="POST">
                <?= csrf_field() ?>

                <input type="hidden" name="id" value="<?php echo $inventario-> id; ?>">



                <label for="idAula" class="form-label">ID del Aula</label>
                <select class="form-control" name="idAula" id="idAula" required>
                    <?php foreach ($aulas as $aula): ?>
                    <?php $selected = ($aula->id == $inventario->idAula) ? 'selected' : ''; ?>
                    <option value="<?= $aula->id ?>" <?= $selected ?>>
                        <?= $aula->id ?> - <?= $aula->numero ?>
                    </option>
                    <?php endforeach; ?>
                </select>


                <label for="nombre" class="form-label">Nombre</label>
                <select class="form-control" name="nombre" id="idMate" required>
                    <?php foreach ($material as $materiales): ?>
                    <?php $selected = ($materiales->idMate == $inventario->nombre) ? 'selected' : ''; ?>
                    <option value="<?= $materiales->idMate ?>" <?= $selected ?>>
                        <?= $materiales->idMate ?> - <?= $materiales->nombre ?>
                    </option>
                    <?php endforeach; ?>
                </select>

                <label for="categoria" class="form-label">Categoría</label>
                <select class="form-control" name="categoria" id="idCategoria" required>
                    <?php foreach ($categoria as $categorias): ?>
                    <?php $selected = ($categorias->idCategoria == $inventario->categoria) ? 'selected' : ''; ?>
                    <option value="<?= $categorias->idCategoria ?>" <?= $selected ?>>
                        <?= $categorias->idCategoria ?> - <?= $categorias->nombre ?>
                    </option>
                    <?php endforeach; ?>
                </select>

                <div class="mb-2 my-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3"
                        required><?=$inventario->descripcion?></textarea>
                </div>

                <div class="mb-3 my-4">
                    <label for="status" class="form-label">Estado</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="1" <?php if ($inventario->status == 1) echo 'selected'; ?>>Activo</option>
                        <option value="0" <?php if ($inventario->status == 0) echo 'selected'; ?>>Inactivo</option>
                    </select>
                </div>


                <div class="mb-3 my-4">
                    <input type="submit" class="btn btn-warning" value="Guardar">
                </div>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<?= $this->endSection();?>