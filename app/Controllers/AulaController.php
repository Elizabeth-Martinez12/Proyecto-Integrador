<?php

namespace App\Controllers;
use chillerlan\QRCode\{QRCode, QROptions};
use Dompdf\Dompdf;

class AulaController extends BaseController
{
    
    public function mostrar(){   
        $aulaModel = model('AulaModel');
        
        $data['aulas'] = $aulaModel->findAll();
        return 
        view('admin/aula/mostrar', $data) ;
    }

    public function mostrar1(){   
        $aulaModel = model('AulaModel');

        $data['aulas'] = $aulaModel->findAll();
        return 
        view('inventa/aula/mostrar', $data) ;
    }

    public function mostrar2(){   
        $aulaModel = model('AulaModel');

        $data['aulas'] = $aulaModel->findAll();
        return 
        view('auditor/aula/mostrar', $data) ;
    }

    public function menu($idAula){   
        $inventarioModel = model('InventarioModel');
        $aulaModel = model('AulaModel'); 
        $materialModel = model('MaterialModel');
        $data['materiales'] = $materialModel->findAll();
        $data['inventarios'] = $inventarioModel->where('idAula', $idAula)->findAll();
    
        $aula = $aulaModel->find($idAula);
        $data['aulas'] = $aula->numero;
    
        return view('admin/aula/aulamenu', $data);
    }
    

    public function menu1($idAula){   
        $materialModel = model('InventarioModel');
    
        $data['materiales'] = $materialModel->where('idAula', $idAula)->findAll();
        $data['aula'] = $idAula; 
    
        return view('inventario/aula/aulamenu', $data);
    }

    public function menu2($idAula){   
        $materialModel = model('InventarioModel');
    
        $data['materiales'] = $materialModel->where('idAula', $idAula)->findAll();
        $data['aula'] = $idAula; 
    
        return view('auditor/aula/aulamenu', $data);
    }

    
    public function generarQR($id)
    {
        $inventarioModel = model('InventarioModel');
        $articulo = $inventarioModel->find($id);
        
        // Obtener nombre del material
        $materialModel = model('MaterialModel');
        $material = $materialModel->find($articulo->nombre);
        
        // Obtener nombre de la categoría
        $categoriaModel = model('CategoriaModel');
        $categoria = $categoriaModel->find($articulo->categoria);
        
        // Obtener número de aula
        $aulaModel = model('AulaModel');
        $aula = $aulaModel->find($articulo->idAula); // Usar idAula en lugar de aula
    
        $contenido = /*'Imagen: ' . $articulo->imagen . "\n" .*/
                     'Nombre: ' . $material->nombre . "\n" .
                     'Categoría: ' . $categoria->nombre . "\n" .
                     'Descripción: ' . $articulo->descripcion . "\n" .
                     'Status: ' . $articulo->status . "\n" .
                     'Aula: ' . $aula->numero; // Agregar el número de aula al contenido del QR
    
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

    public function lista($idAula)
{
    $inventarioModel = model('InventarioModel');
    $materialModel = model('MaterialModel');
    $aulaModel = model('AulaModel');
    $categoriaModel = model('CategoriaModel');

    $data['categorias'] = $categoriaModel->findAll();
    $data['aulas'] = $aulaModel->findAll();
    $data['material'] = $materialModel->findAll();
    $data['inventarios'] = $inventarioModel->where('idAula', $idAula)->findAll();
    $data['idAula'] = $idAula;

    return view('admin/aula/listaelemento', $data);
}


public function lista1($idAula)
{
    $inventarioModel = model('InventarioModel');
    $materialModel = model('MaterialModel');
    $aulaModel = model('AulaModel');
    $categoriaModel = model('CategoriaModel');

    $data['categorias'] = $categoriaModel->findAll();
    $data['aulas'] = $aulaModel->findAll();
    $data['materiales'] = $materialModel->findAll();
    $data['inventarios'] = $inventarioModel->where('idAula', $idAula)->findAll();
    $data['idAula'] = $idAula;

    return view('inventa/aula/listaelemento', $data);
}

public function lista2($idAula)
{
    $inventarioModel = model('InventarioModel');
    $materialModel = model('MaterialModel');
    $aulaModel = model('AulaModel');
    $categoriaModel = model('CategoriaModel');

    $data['categorias'] = $categoriaModel->findAll();
    $data['aulas'] = $aulaModel->findAll();
    $data['materiales'] = $materialModel->findAll();
    $data['inventarios'] = $inventarioModel->where('idAula', $idAula)->findAll();
    $data['idAula'] = $idAula;

    return view('auditor/aula/listaelemento', $data);
}
    
    
    public function descripcion(){   
        $inventarioModel = model('InventarioModel');
        $materialModel = model('MaterialModel');
        $aulaModel = model('AulaModel');
        $data['aulas'] = $aulaModel->findAll();
        $data['materiales'] = $materialModel->findAll();
        $data['inventarios'] = $inventarioModel->findAll();
        return 
        view('admin/aula/descripcion',);
    }

    public function descripcion1(){   
        $inventarioModel = model('InventarioModel');
        $aulaModel = model('AulaModel');
        $data['aulas'] = $aulaModel->findAll();
        $data['material'] = $inventarioModel->findAll();
        return 
        view('inventa/aula/descripcion',);
    }

    public function descripcion2(){   
        $inventarioModel = model('InventarioModel');
        $aulaModel = model('AulaModel');
        $data['aulas'] = $aulaModel->findAll();
        $data['material'] = $inventarioModel->findAll();
        return 
        view('auditor/aula/descripcion',);
    }

    public function agregar($idAula){ 
        helper(['form', 'url']);
        $inventarioModel = model('InventarioModel');
        $categoriaModel = model('CategoriaModel');
        $aulaModel = model('AulaModel');
        $materialModel = model('MaterialModel');
    
        $data['material'] = $materialModel->findAll();
        $data['inventarios'] = $inventarioModel->where('idAula', $idAula)->findAll();
        $data['aulas'] = $aulaModel->findAll();
        $data['categoria'] = $categoriaModel->findAll();
        $data['idAula'] = $idAula;
    
        return view('admin/aula/agregar', $data);
    }
    


    public function insert()
    {
        $inventarioModel = model('InventarioModel');
        $aulaModel = model('AulaModel');
        $categoriaModel = model('CategoriaModel');
        $materialModel = model('MaterialModel');
        $data['material'] =$materialModel->findAll();
        $data['aulas'] = $aulaModel->findAll();
        $validation = \Config\Services::validation();
        $validation->setRules([
            'idAula' =>'required',
            'nombre' => 'required',
            'categoria' => 'required',
            'descripcion' => 'required',
            'status' => 'required',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $data = [
            "idAula" => $_POST['idAula'],
            "nombre" => $_POST['nombre'],
            "categoria" => $_POST['categoria'],
            "descripcion" => $_POST['descripcion'],
            "status" => $_POST['status'],
        ];
        $inventarioModel->insert($data);
        return redirect('admin/aula/listaelementos');
    } 


    public function agregar1(){ 
        helper(['form', 'url']);
        $inventarioModel = model('InventarioModel');
        $categoriaModel = model('CategoriaModel');
        $aulaModel = model('AulaModel');
        $materialModel = model('MaterialModel');
        $data['material'] =$materialModel->findAll();
        $data['inventarios'] =$inventarioModel->findAll();
        $data['aulas'] = $aulaModel->findAll();
        $data['categoria'] =$categoriaModel->findAll();
        return 
        view('inventa/aula/agregar',);
    }


    public function insert1()
    {
        $inventarioModel = model('InventarioModel');
        $aulaModel = model('AulaModel');
        $categoriaModel = model('CategoriaModel');
        $materialModel = model('MaterialModel');
        $data['material'] =$materialModel->findAll();
        $data['aulas'] = $aulaModel->findAll();
        $validation = \Config\Services::validation();
        $validation->setRules([
            'idAula' =>'required',
            'nombre' => 'required',
            'categoria' => 'required',
            'descripcion' => 'required',
            'status' => 'required',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $data = [
            "idAula" => $_POST['idAula'],
            "nombre" => $_POST['nombre'],
            "categoria" => $_POST['categoria'],
            "descripcion" => $_POST['descripcion'],
            "status" => $_POST['status'],
        ];
        $inventarioModel->insert($data);
        return redirect('inventa/aula/listaelementos');
    } 

    public function delete($id){
        $inventarioModel = model('InventarioModel');
        $inventarioModel->delete($id);
        return redirect('admin/aula/listaelemento','refresh');
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
        view('admin/aula/editar', $data);
    }

    
    public function update()
    {
        $inventarioModel = model('InventarioModel');
        $aulaModel = model('AulaModel');
        $categoriaModel = model('CategoriaModel');
        $materialModel = model('MaterialModel');
        $validation = \Config\Services::validation(); 
        $validation->setRules([
            'nombre' => 'required',
            'categoria' => 'required',
            'descripcion' => 'required',
            'status' => 'required',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $data = [
            "nombre" => $_POST['nombre'],
            "categoria" => $_POST['categoria'],
            "descripcion" => $_POST['descripcion'],
            "status" => $_POST['status'],
            "idAula" => $_POST['idAula'] // Asegúrate de incluir esto si estás usando idAula en tu formulario
        ];
        
        $inventarioModel->update($_POST['id'], $data);
        return redirect()->to('/admin/aula/listaelementos/' . $_POST['idAula']);
    }


    public function buscar()
{
    $keywords = $this->request->getPost('keywords');
    $idAula = $this->request->getPost('idAula');
    $inventarioModel = model('InventarioModel');
    $aulaModel = model('AulaModel');
    $categoriaModel = model('CategoriaModel');
    $materialModel = model('MaterialModel');

    $data['aulas'] = $aulaModel->findAll();
    $data['categorias'] = $categoriaModel->findAll();
    $data['materiales'] = $materialModel->findAll();
    $data['idAula'] = $idAula;
    $data['inventarios'] = $inventarioModel->busqueda($keywords, $idAula);

    return view('admin/aula/listaelemento', $data); 
}




    
    public function buscar1() {
        $keywords = $this->request->getPost('keywords');
    
        $inventarioModel = model('InventarioModel');
        $data['materiales'] = $inventarioModel
            ->like('nombre', $keywords)
            ->orLike('categoria', $keywords)
            ->orLike('descripcion', $keywords)
            ->orLike('status', $keywords)
            ->orLike('created_at', $keywords)
            ->findAll();
    
        return view('inventa/aula/listaelemento', $data); 
    }

    
    public function buscar2() {
        $keywords = $this->request->getPost('keywords');
    
        $inventarioModel = model('InventarioModel');
        $data['materiales'] = $inventarioModel
            ->like('nombre', $keywords)
            ->orLike('categoria', $keywords)
            ->orLike('descripcion', $keywords)
            ->orLike('status', $keywords)
            ->orLike('created_at', $keywords)
            ->findAll();
    
        return view('auditor/aula/listaelemento', $data); 
    }

    public function generatePDF($idAula)
    {
        $inventarioModel = model('InventarioModel');
        $materialModel = model('MaterialModel');
        $aulaModel = model('AulaModel');
        $categoriaModel = model('CategoriaModel');

        $data['categorias'] = $categoriaModel->findAll();
        $data['aulas'] = $aulaModel->findAll();
        $data['materiales'] = $materialModel->findAll();
        $data['inventarios'] = $inventarioModel->where('idAula', $idAula)->findAll();
        $data['idAula'] = $idAula;

        if (empty($data['materiales'])) {
            echo 'No hay materiales para mostrar.';
            return;
        }

        $html = view('admin/aula/plantilla', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("material_list_$idAula.pdf", array("Attachment" => 0));
    }

    public function generateGeneralPDF()
    {
        $inventarioModel = model('InventarioModel');
        $materialModel = model('MaterialModel');
        $aulaModel = model('AulaModel');
        $categoriaModel = model('CategoriaModel');

        $data['categorias'] = $categoriaModel->findAll();
        $data['aulas'] = $aulaModel->findAll();
        $data['materiales'] = $materialModel->findAll();
        $data['inventarios'] = $inventarioModel->findAll();  // No filtramos por idAula

        if (empty($data['materiales'])) {
            echo 'No hay materiales para mostrar.';
            return;
        }

        $html = view('admin/aula/plantilla_general', $data); // Usa una plantilla diferente si es necesario

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("material_list_general.pdf", array("Attachment" => 0));
    }
    


}