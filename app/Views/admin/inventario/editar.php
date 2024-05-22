<?= $this->extend('template/main'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <h2 class="text-center">Editar</h2>
        <div class="col-2"></div>

        <div class="col-8">
            <form action="<?= base_url('admin/inventario/update'); ?>" method="POST">
                <?= csrf_field() ?>

                <input type="hidden" name="id" value="<?php echo $inventario->id; ?>">

                <label for="idAula" class="form-label">ID del Aula</label>
                <select class="form-control" name="idAula" id="idAula" required>
                    <?php foreach ($aulas as $aula): ?>
                    <?php $selected = ($aula->id == $inventario->idAula) ? 'selected' : ''; ?>
                    <option value="<?= $aula->id ?>" <?= $selected ?>>
                        <?= $aula->id ?> - <?= $aula->numero ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                
                <div class="form-group ilustracion">
                    <label for="ilustracion">Imagen</label>
                    <input type="file" class="form-control" name="ilustracion" id="ilustracion">
                </div>

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
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required><?=$inventario->descripcion?></textarea>
                </div>

                <div class="mb-3 my-4">
                    <label for="status" class="form-label">Estado</label>
                    <select name="status" id="status" class="form-control" required onchange="toggleInactivoOptions(this.value)">
                        <option value="1" <?php if ($inventario->status == 1) echo 'selected'; ?>>Activo</option>
                        <option value="0" <?php if ($inventario->status == 0) echo 'selected'; ?>>Inactivo</option>
                    </select>
                </div>

                <div class="mb-3 my-4" id="inactivoOptions" style="display: none;">
                    <label for="inactivoStatus" class="form-label">Seleccione la opción para Inactivo</label>
                    <select name="inactivoStatus" id="inactivoStatus" class="form-control" onchange="toggleInactivoFields(this.value)">
                        <option value="">Seleccione una opción</option>
                        <option value="almacen">Almacén</option>
                        <option value="reparacion">Reparación</option>
                        <option value="descontinuado">Descontinuado</option>
                    </select>
                </div>

                <div class="mb-3 my-4" id="almacenFields" style="display: none;">
                    <label for="nombreAlmacen" class="form-label">Nombre</label>
                    <input type="text" name="nombreAlmacen" id="nombreAlmacen" class="form-control">
                    
                    <label for="descripcionAlmacen" class="form-label">Descripción</label>
                    <input type="text" name="descripcionAlmacen" id="descripcionAlmacen" class="form-control">
                    
                    <label for="fechaEntrada" class="form-label">Fecha de Entrada</label>
                    <input type="date" name="fechaEntrada" id="fechaEntrada" class="form-control">
                    
                    <label for="fechaSalidaAlmacen" class="form-label">Fecha de Salida</label>
                    <input type="date" name="fechaSalidaAlmacen" id="fechaSalidaAlmacen" class="form-control">
                </div>

                <div class="mb-3 my-4" id="descontinuadoFields" style="display: none;">
                    <label for="razon" class="form-label">Razón</label>
                    <input type="text" name="razon" id="razon" class="form-control">
                    
                    <label for="fechaSalida" class="form-label">Fecha de Salida</label>
                    <input type="date" name="fechaSalida" id="fechaSalida" class="form-control">
                </div>

                <div class="mb-3 my-4" id="reparacionFields" style="display: none;">
                    <label for="tipoReparacion" class="form-label">Tipo de Reparación</label>
                    <input type="text" name="tipoReparacion" id="tipoReparacion" class="form-control">
                    
                    <label for="fechaIngreso" class="form-label">Fecha de Ingreso</label>
                    <input type="date" name="fechaIngreso" id="fechaIngreso" class="form-control">
                    
                    <label for="fechaSalidaReparacion" class="form-label">Fecha de Salida</label>
                    <input type="date" name="fechaSalidaReparacion" id="fechaSalidaReparacion" class="form-control">
                </div>

                <div class="mb-3 my-4">
                    <input type="submit" class="btn btn-warning" value="Guardar">
                </div>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>

<script>
function toggleInactivoOptions(status) {
    const inactivoOptions = document.getElementById('inactivoOptions');
    inactivoOptions.style.display = status === '0' ? 'block' : 'none';
}

function toggleInactivoFields(option) {
    const almacenFields = document.getElementById('almacenFields');
    const descontinuadoFields = document.getElementById('descontinuadoFields');
    const reparacionFields = document.getElementById('reparacionFields');
    
    almacenFields.style.display = option === 'almacen' ? 'block' : 'none';
    descontinuadoFields.style.display = option === 'descontinuado' ? 'block' : 'none';
    reparacionFields.style.display = option === 'reparacion' ? 'block' : 'none';
}

// Llamada inicial para asegurarse de que los campos correctos estén visibles si hay un valor predefinido
document.addEventListener('DOMContentLoaded', () => {
    const status = document.getElementById('status').value;
    const inactivoStatus = document.getElementById('inactivoStatus').value;

    toggleInactivoOptions(status);
    toggleInactivoFields(inactivoStatus);
});
</script>

<?= $this->endSection(); ?>
