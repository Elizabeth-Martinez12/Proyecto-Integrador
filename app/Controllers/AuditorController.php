<?php

namespace App\Controllers;
use App\Models\AuditorModel;
use Dompdf\Dompdf;

class AuditorController extends BaseController
{

    public function generatePDF() {
        $materialModel = model('MaterialModel');
      
        $data['material'] = $materialModel->findAll();
      
        $html = view('auditor/plantilla', $data);
      
        $dompdf = new Dompdf();
      
        $dompdf->loadHtml($html);
      
        $dompdf->setPaper('A4', 'landscape');
      
        $dompdf->render();
      
        $dompdf->stream("material_list.pdf", array("Attachment" => 0));
      }
    
    public function mostrar(){  
        
        return 
        view('auditor/mostrar',);
    }
    public function menu(){  
        
        return 
        view('auditor/aulamenu',);
    }
    public function lista(){  
        $materialModel = model('MaterialModel');

        $data['material'] = $materialModel->findAll();
        return 
        view('auditor/listaelemento', $data);
    }
    public function descripcion(){  
        
        return 
        view('auditor/descripcion',);
    }
}