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
        $aulaModel = model('AulaModel');
        $aulaModel = model('AulaModel');
        $materialModel = model('MaterialModel');
        $data['material'] =$materialModel->findAll();
        $data['aulas'] = $aulaModel->findAll();
        $data['reparacion'] = $reparacionModel->findAll();
        $data['aulas'] = $aulaModel->findAll();
        return 
        view('admin/mantenimiento/reparacion', $data);
    }

    public function reparacion1(){   
         $reparacionModel = model('ReparacionModel');
        $aulaModel = model('AulaModel');
        
        $data['reparacion'] = $reparacionModel->findAll();
        $data['aulas'] = $aulaModel->findAll();
        return 
        view('inventa/mantenimiento/reparacion', $data);
    }

    public function reparacion2(){   
        $reparacionModel = model('ReparacionModel');
        $aulaModel = model('AulaModel');
        
        $data['reparacion'] = $reparacionModel->findAll();
        $data['aulas'] = $aulaModel->findAll();
        return 
        view('auditor/mantenimiento/reparacion', $data);
    }

    public function descontinuado(){   
        $descontinuoModel = model('DescontinuadoModel');
        
        // $data['descontinuo'] = $descontinuoModel->findAll();
        $conexion = \Config\Database::connect();
        $descontinuo = $conexion->query("select d.razon as razon, d.fechaSalida as fechaSalida, m.nombre as nombrem, i.nombre as nombrei from descontinuado as d left join inventario as i on i.id = d.nombre left join material as m on m.idMate = i.nombre")->getResultArray();

        return view('admin/mantenimiento/descontinuado', compact('descontinuo'));
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

public function generatePDF1()
    {
        $reparacionModel = model('ReparacionModel');
        $aulaModel = model('AulaModel');

        $data['aulas'] = $aulaModel->findAll();
        $data['reparacion'] = $reparacionModel->findAll();
        

        $html = view('admin/mantenimiento/plantillaReparacion', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("material_list.pdf", array("Attachment" => 0));
    }

    public function generateGeneralPDF1()
{
    $reparacionModel = model('ReparacionModel');
    $aulaModel = model('AulaModel');

        $data['aulas'] = $aulaModel->findAll();
        $data['reparacion'] = $reparacionModel->findAll();


    $html = view('admin/mantenimiento/plantilla_general_Reparacion', $data);

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream("material_list_general.pdf", array("Attachment" => 0));
}

public function generatePDF2()
    {
        
        $descontinuoModel = model('DescontinuadoModel');
        $aulaModel = model('AulaModel');

        $data['aulas'] = $aulaModel->findAll();
        $data['descontinuo'] = $descontinuoModel->findAll();
        


        $html = view('admin/mantenimiento/plantillaDescontinuado', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("material_list.pdf", array("Attachment" => 0));
    }

    public function generateGeneralPDF2()
{
    $descontinuoModel = model('DescontinuadoModel');
    $aulaModel = model('AulaModel');

    $data['aulas'] = $aulaModel->findAll();
    $data['descontinuo'] = $descontinuoModel->findAll();

    $html = view('admin/mantenimiento/plantilla_general_Descontinuado', $data);

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream("material_list_general.pdf", array("Attachment" => 0));
}

public function generarQR($id)
    {
        $inventarioModel = model('InventarioModel');
        $articulo = $inventarioModel->find($id);
    
        $contenido = /*'Imagen: ' . $articulo->imagen . "\n" .*/
                     'Nombre: ' . $articulo->nombre . "\n" .
                     'Categoría: ' . $articulo->categoria . "\n" .
                     'Descripción: ' . $articulo->descripcion . "\n" .
                     'Status: ' . $articulo->status;
    
        $qrOptions = new QROptions([
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel'   => QRCode::ECC_L,
            'scale'      => 10,
        ]);
    
        $qrCode = new QRCode($qrOptions);
    
        $dir = WRITEPATH . 'qr/';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
    
        $archivo = $dir . $id . '.png';
    
        $qrCode->render($contenido, $archivo);
    
        return base_url('admin/qr/' . $id . '.png');
    }
    
    
    public function verQR($archivo)
    {
        $rutaArchivo = WRITEPATH . 'qr/' . $archivo;
        if (!file_exists($rutaArchivo)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Archivo no encontrado: ' . $archivo);
        }
        $respuesta = $this->response
            ->setContentType('image/png')
            ->setBody(file_get_contents($rutaArchivo));
    
        return $respuesta;
    }
    

    public function editar($id){
        $inventarioModel = model('InventarioModel');
        $aulaModel = model('AulaModel');
        $categoriaModel = model('CategoriaModel');
        $materialModel = model('MaterialModel');
        $data['material'] =$materialModel->findAll();
        $data['inventario'] = $inventarioModel->find($id);
        $data['aulas'] = $aulaModel->findAll();
        $data['categoria'] =$categoriaModel->findAll();
        return 
        view('admin/inventario/editar', $data);
    }

    
    public function update()
    {
        $inventarioModel = model('InventarioModel');
        $mantenimientoModel = model('MantenimientoModel');
        $reparacionModel = model('ReparacionModel');
        $descontinuadoModel = model('DescontinuadoModel');
        $aulaModel = model('AulaModel');
    
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nombre' => 'required',
            'categoria' => 'required',
            'descripcion' => 'required',
            'status' => 'required',
            'inactivoStatus' => 'permit_empty',
            'razon' => 'permit_empty',
            'fechaSalida' => 'permit_empty',
            'tipoReparacion' => 'permit_empty',
            'fechaIngreso' => 'permit_empty',
            'fechaSalidaReparacion' => 'permit_empty'
        ]);
    
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        $id = $this->request->getPost('id');
        $idAula = $this->request->getPost('idAula');
    
        // Verificar si el idAula existe en la tabla aula
        if (!$aulaModel->find($idAula)) {
            return redirect()->back()->withInput()->with('error', 'El ID del aula no es válido.');
        }
    
        $data = [
            "nombre" => $this->request->getPost('nombre'),
            "categoria" => $this->request->getPost('categoria'),
            "descripcion" => $this->request->getPost('descripcion'),
            "status" => $this->request->getPost('status'),
            "idAula" => $idAula
        ];
    
        try {
            if ($this->request->getPost('status') == '0') {
                // Si el estado es inactivo, mover el artículo a la tabla correspondiente
                $inactivoStatus = $this->request->getPost('inactivoStatus');
                $articulo = $inventarioModel->find($id);
                $articuloData = [
                    'nombre' => $articulo->nombre,
                    'categoria' => $articulo->categoria,
                    'descripcion' => $articulo->descripcion,
                    'idAula' => $articulo->idAula
                ];
    
                switch ($inactivoStatus) {
                    case 'almacen':
                        $mantenimientoModel->insert($articuloData);
                        break;
                    case 'reparacion':
                        $reparacionData = [
                            'nombre' => $articulo->nombre,
                            'categoria' => $articulo->categoria,
                            'descripcion' => $articulo->descripcion,
                            'idAula' => $articulo->idAula,
                            'tipoReparacion' => $this->request->getPost('tipoReparacion'),
                            'fechaIngreso' => $this->request->getPost('fechaIngreso'),
                            'fechaSalida' => $this->request->getPost('fechaSalidaReparacion')
                        ];
                        $reparacionModel->insert($reparacionData);
                        break;
                    case 'descontinuado':
                        $descontinuadoData = [
                            'nombre' => $articulo->nombre,
                            'razon' => $this->request->getPost('razon'),
                            'fechaSalida' => $this->request->getPost('fechaSalida'),
                            'idAula' => $articulo->idAula
                        ];
                        $descontinuadoModel->insert($descontinuadoData);
                        break;
                }
    
                // Eliminar el artículo de la tabla inventario
                $inventarioModel->delete($id);
            } else {
                // Si el estado es activo, simplemente actualizar el registro
                $inventarioModel->update($id, $data);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error al actualizar el inventario: ' . $e->getMessage());
        }
    
        return redirect('admin/inventario/mostrar', 'refresh');
    }

    public function delete($id){
        $inventarioModel = model('InventarioModel');
        $inventarioModel->delete($id);
        return redirect('admin/mantenimiento/descontinuado','refresh');
    }


}
