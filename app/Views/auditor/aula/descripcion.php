<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Silla 1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="color: black;">
                <div class="row">
                    <div class="col-md-4">
                    <?php foreach ($inventarios as $row) : ?>
                        <img src="<?= $row->imagen ?>" width="150" height="150" alt="Logo">
                    </div>
                    <div class="col-md-8">
                        <h3 style="color: #007bff;"><?= $row->nombre ?></h3>
                        <p style="font-weight: bold;">
                            Aula: <?= $row->id ?>
                        </p>
                        <p>
                            Descripción: <?= $row->descripcion ?>
                        </p>
                        <p>
                            Fecha de registro: <?= $row->created_at ?>
                        </p>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>