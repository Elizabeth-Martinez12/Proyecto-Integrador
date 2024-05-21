<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use chillerlan\QRCode\{QRCode, QROptions};
use Dompdf\Dompdf;

class MantenimientoController extends BaseController
{
    public function mostrar(){   
        $mantenimientoModel = model('MantenimientoModel');

        $data['mantenimiento'] = $mantenimientoModel->findAll();
        return 
        view('admin/mantenimiento/mostrar', $data);
    }

    public function mostrar1(){   
        $mantenimientoModel = model('MantenimientoModel');

        $data['mantenimiento'] = $mantenimientoModel->findAll();
        return 
        view('inventa/mantenimiento/mostrar', $data);
    }

    public function mostrar2(){   
        $mantenimientoModel = model('MantenimientoModel');

        $data['mantenimiento'] = $mantenimientoModel->findAll();
        return 
        view('auditor/mantenimiento/mostrar', $data);
    }

    public function almacen(){   
        $mantenimientoModel = model('MantenimientoModel');
        $aulaModel = model('AulaModel');

        $data['mantenimiento'] = $mantenimientoModel->findAll();
        $data['aulas'] = $aulaModel->findAll();
        return 
        view('admin/mantenimiento/almacen', $data);
    }

    public function almacen1(){   
        $mantenimientoModel = model('MantenimientoModel');
        $aulaModel = model('AulaModel');

        $data['mantenimiento'] = $mantenimientoModel->findAll();
        $data['aulas'] = $aulaModel->findAll();
        return 
        view('inventa/mantenimiento/almacen', $data);
    }

    public function almacen2(){   
        $mantenimientoModel = model('MantenimientoModel');
        $aulaModel = model('AulaModel');

        $data['mantenimiento'] = $mantenimientoModel->findAll();
        $data['aulas'] = $aulaModel->findAll();
        return 
        view('auditor/mantenimiento/almacen', $data);
    }

    public function reparacion(){   
        $reparacionModel = model('ReparacionModel');

        $data['reparacion'] = $reparacionModel->findAll();
        return 
        view('admin/mantenimiento/reparacion', $data);
    }

    public function reparacion1(){   
        $reparacionModel = model('ReparacionModel');

        $data['reparacion'] = $reparacionModel->findAll();
        return 
        view('inventa/mantenimiento/reparacion', $data);
    }

    public function reparacion2(){   
        $reparacionModel = model('ReparacionModel');

        $data['reparacion'] = $reparacionModel->findAll();
        return 
        view('auditor/mantenimiento/reparacion', $data);
    }

    public function descontinuado(){   
        $descontinuoModel = model('DescontinuadoModel');

        $data['descontinuo'] = $descontinuoModel->findAll();
        return 
        view('admin/mantenimiento/descontinuado', $data);
    }

    public function descontinuado1(){   
        $descontinuoModel = model('DescontinuadoModel');

        $data['descontinuo'] = $descontinuoModel->findAll();
        return 
        view('inventa/mantenimiento/descontinuado', $data);
    }

    public function descontinuado2(){   
        $descontinuoModel = model('DescontinuadoModel');

        $data['descontinuo'] = $descontinuoModel->findAll();
        return 
        view('auditor/mantenimiento/descontinuado', $data);
    }

    public function buscar1() {
        $keywords = $this->request->getPost('keywords');
    
        $mantenimientoModel = model('MantenimientoModel');
        $data['mantenimiento'] = $mantenimientoModel
            ->like('nombre', $keywords)
            ->orLike('descripcion', $keywords)
            ->orLike('fechaEntrada', $keywords)
            ->orLike('fechaSalida', $keywords)
            ->orLike('created_at', $keywords)
            ->findAll();
    
        return view('admin/mantenimiento/almacen', $data); 
    }   

    public function buscar2() {
        $keywords = $this->request->getPost('keywords');
    
        $mantenimientoModel = model('ReparacionModel');
        $data['reparacion'] = $mantenimientoModel
            ->like('nombre', $keywords)
            ->orLike('tipoReparacion', $keywords)
            ->orLike('fechaIngreso', $keywords)
            ->orLike('fechaSalida', $keywords)
            ->findAll();
        return view('admin/mantenimiento/reparacion', $data); 
    }
    public function buscar3() {
        $keywords = $this->request->getPost('keywords');
    
        $mantenimientoModel = model('DescontinuadoModel');
        $data['descontinuo'] = $mantenimientoModel
            ->like('nombre', $keywords)
            ->orLike('razon', $keywords)
            ->orLike('fechaSalida', $keywords)
            ->findAll();
        return view('admin/mantenimiento/descontinuado', $data); 
    }


    public function buscar4() {
        $keywords = $this->request->getPost('keywords');
    
        $mantenimientoModel = model('MantenimientoModel');
        $data['mantenimiento'] = $mantenimientoModel
            ->like('nombre', $keywords)
            ->orLike('descripcion', $keywords)
            ->orLike('fechaEntrada', $keywords)
            ->orLike('fechaSalida', $keywords)
            ->orLike('created_at', $keywords)
            ->findAll();
    
        return view('inventa/mantenimiento/almacen', $data); 
    }   

    public function buscar5() {
        $keywords = $this->request->getPost('keywords');
    
        $mantenimientoModel = model('ReparacionModel');
        $data['reparacion'] = $mantenimientoModel
            ->like('nombre', $keywords)
            ->orLike('tipoReparacion', $keywords)
            ->orLike('fechaIngreso', $keywords)
            ->orLike('fechaSalida', $keywords)
            ->findAll();
        return view('inventa/mantenimiento/reparacion', $data); 
    }
    public function buscar6() {
        $keywords = $this->request->getPost('keywords');
    
        $mantenimientoModel = model('DescontinuadoModel');
        $data['descontinuo'] = $mantenimientoModel
            ->like('nombre', $keywords)
            ->orLike('razon', $keywords)
            ->orLike('fechaSalida', $keywords)
            ->findAll();
        return view('inventa/mantenimiento/descontinuado', $data); 
    }


    public function buscar7() {
        $keywords = $this->request->getPost('keywords');
    
        $mantenimientoModel = model('MantenimientoModel');
        $data['mantenimiento'] = $mantenimientoModel
            ->like('nombre', $keywords)
            ->orLike('descripcion', $keywords)
            ->orLike('fechaEntrada', $keywords)
            ->orLike('fechaSalida', $keywords)
            ->orLike('created_at', $keywords)
            ->findAll();
    
        return view('auditor/mantenimiento/almacen', $data); 
    }   

    public function buscar8() {
        $keywords = $this->request->getPost('keywords');
    
        $mantenimientoModel = model('ReparacionModel');
        $data['reparacion'] = $mantenimientoModel
            ->like('nombre', $keywords)
            ->orLike('tipoReparacion', $keywords)
            ->orLike('fechaIngreso', $keywords)
            ->orLike('fechaSalida', $keywords)
            ->findAll();
        return view('auditor/mantenimiento/reparacion', $data); 
    }
    public function buscar9() {
        $keywords = $this->request->getPost('keywords');
    
        $mantenimientoModel = model('DescontinuadoModel');
        $data['descontinuo'] = $mantenimientoModel
            ->like('nombre', $keywords)
            ->orLike('razon', $keywords)
            ->orLike('fechaSalida', $keywords)
            ->findAll();
        return view('auditor/mantenimiento/descontinuado', $data); 
    }

    public function generatePDF()
    {
        
        $mantenimientoModel = model('MantenimientoModel');
        $aulaModel = model('AulaModel');

        $data['aulas'] = $aulaModel->findAll();
        $data['mantenimiento'] = $mantenimientoModel->findAll();
        


        $html = view('admin/mantenimiento/plantillaAlmacen', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("material_list.pdf", array("Attachment" => 0));
    }

    public function generateGeneralPDF()
{
    
    $mantenimientoModel = model('MantenimientoModel');
    $aulaModel = model('AulaModel');

    $data['aulas'] = $aulaModel->findAll();
    $data['mantenimiento'] = $mantenimientoModel->findAll();


    $html = view('admin/mantenimiento/plantilla_general_Almacen', $data);

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream("material_list_general.pdf", array("Attachment" => 0));
}


}
