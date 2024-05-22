<?php

$rutaQR = "/qr"; 

$nombreQR = $inventa->nombre . "_" . time();

$contenidoQR = base64_decode($inventa->qr);
$rutaArchivoQR = $rutaQR . $nombreQR . ".png"; 
if (file_exists($rutaArchivoQR)) {
    unlink($rutaArchivoQR);
}
file_put_contents($rutaArchivoQR, $contenidoQR);

?>


<?php

?>



<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="modalQRLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalQRLabel">Código QR de <?=$inventa->nombre?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="<?=$inventa->qr?>" alt="Código QR de <?=$inventa->nombre?>" class="img-fluid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
