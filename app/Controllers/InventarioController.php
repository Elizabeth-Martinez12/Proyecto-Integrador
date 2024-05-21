<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use chillerlan\QRCode\{QRCode, QROptions};
use Dompdf\Dompdf;


class InventarioController extends BaseController
{
    
    public function mostrar(){   
        $inventarioModel = model('InventarioModel');
        $aulaModel = model('AulaModel');
        $categoriaModel = model('CategoriaModel');
        $materialModel = model('MaterialModel');
        $data['material'] =$materialModel->findAll();
        $data['aulas'] = $aulaModel->findAll();
        $data['inventario'] = $inventarioModel->findAll();
        $data['categoria'] =$categoriaModel->findAll();
        return 
        view('admin/inventario/mostrar', $data);
    }
    
    public function mostrar1(){   
        $inventarioModel = model('InventarioModel');
        $aulaModel = model('AulaModel');
        $categoriaModel = model('CategoriaModel');
        $materialModel = model('MaterialModel');
        $data['material'] =$materialModel->findAll();
        $data['aulas'] = $aulaModel->findAll();
        $data['inventario'] = $inventarioModel->findAll();
        $data['categoria'] =$categoriaModel->findAll();
        return 
        view('inventa/inventario/mostrar', $data);
    }

    public function mostrar2(){   
        $inventarioModel = model('InventarioModel');
        $aulaModel = model('AulaModel');
        $categoriaModel = model('CategoriaModel');
        $materialModel = model('MaterialModel');
        $data['material'] =$materialModel->findAll();
        $data['aulas'] = $aulaModel->findAll();
        $data['inventario'] = $inventarioModel->findAll();
        $data['categoria'] =$categoriaModel->findAll();
        return 
        view('auditor/inventario/mostrar', $data);
    }

    public function agregar(){ 
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
        view('admin/inventario/agregar', $data);
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
        view('inventa/inventario/agregar', $data);
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
        return redirect('admin/inventario/mostrar');
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
        return redirect('inventa/inventario/mostrar');
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



    public function delete($id){
        $inventarioModel = model('InventarioModel');
        $inventarioModel->delete($id);
        return redirect('admin/inventario/mostrar','refresh');
    }

    public function delete1($id){
        $inventarioModel = model('InventarioModel');
        $inventarioModel->delete($id);
        return redirect('inventa/inventario/mostrar','refresh');
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
        return redirect('admin/inventario/mostrar','refresh');
    }


    public function buscar() {
        $keywords = $this->request->getPost('keywords');
        $inventarioModel = model('InventarioModel');
        $aulaModel = model('AulaModel');
        $categoriaModel = model('CategoriaModel');
        $materialModel = model('MaterialModel');
    
        $data['material'] = $materialModel->findAll();
        $data['aulas'] = $aulaModel->findAll();
        $data['inventario'] = $inventarioModel->findAll();
        $data['categoria'] = $categoriaModel->findAll();
    
        $db = \Config\Database::connect();
        $builder = $db->table('inventario');
        $builder->select('inventario.*, categoria.nombre as nombre_categoria, material.nombre as nombre_material, aula.numero as nombre_aula');
        $builder->join('categoria', 'categoria.idCategoria = inventario.categoria', 'left');
        $builder->join('material', 'material.idMate = inventario.nombre', 'left');
        $builder->join('aula', 'aula.id = inventario.idAula', 'left');
        $builder->like('inventario.nombre', $keywords);
        $builder->orLike('categoria.nombre', $keywords);
        $builder->orLike('material.nombre', $keywords); 
        $builder->orLike('aula.numero', $keywords); 
        $builder->orLike('inventario.descripcion', $keywords);
        $builder->orLike('inventario.status', $keywords);
        $builder->orLike('inventario.created_at', $keywords);
        $query = $builder->get();
        $data['inventario'] = $query->getResult();
    
        return view('admin/inventario/mostrar', $data); 
    }
    
    


    public function buscar1() {
        $keywords = $this->request->getPost('keywords');
        $inventarioModel = model('InventarioModel');
        $aulaModel = model('AulaModel');
        $categoriaModel = model('CategoriaModel');

        $materialModel = model('MaterialModel');
        $data['material'] =$materialModel->findAll();
        
        $data['aulas'] = $aulaModel->findAll();
        $data['inventario'] = $inventarioModel->findAll();
        $data['categoria'] =$categoriaModel->findAll();
        

        $inventarioModel = model('InventarioModel');
        $data['inventario'] = $inventarioModel
            ->like('nombre', $keywords)
            ->orLike('categoria', $keywords)
            ->orLike('descripcion', $keywords)
            ->orLike('status', $keywords)
            ->orLike('created_at', $keywords)
            ->findAll();
    
        return view('inventa/inventario/mostrar', $data); 
    }

    public function buscar2() {
        $keywords = $this->request->getPost('keywords');
        $inventarioModel = model('InventarioModel');
        $aulaModel = model('AulaModel');
        $categoriaModel = model('CategoriaModel');

        $materialModel = model('MaterialModel');
        $data['material'] =$materialModel->findAll();
        
        $data['aulas'] = $aulaModel->findAll();
        $data['inventario'] = $inventarioModel->findAll();
        $data['categoria'] =$categoriaModel->findAll();
        

        $inventarioModel = model('InventarioModel');
        $data['inventario'] = $inventarioModel
            ->like('nombre', $keywords)
            ->orLike('categoria', $keywords)
            ->orLike('descripcion', $keywords)
            ->orLike('status', $keywords)
            ->orLike('created_at', $keywords)
            ->findAll();
    
        return view('auditor/inventario/mostrar', $data); 
    }

    public function generatePDF()
    {
        $inventarioModel = model('InventarioModel');
        $materialModel = model('MaterialModel');
        $aulaModel = model('AulaModel');
        $categoriaModel = model('CategoriaModel');

        $data['categorias'] = $categoriaModel->findAll();
        $data['aulas'] = $aulaModel->findAll();
        $data['materiales'] = $materialModel->findAll();
        $data['inventarios'] = $inventarioModel->findAll();
        

        if (empty($data['materiales'])) {
            echo 'No hay materiales para mostrar.';
            return;
        }

        $html = view('admin/inventario/plantilla', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("material_list.pdf", array("Attachment" => 0));
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
    $data['inventarios'] = $inventarioModel->findAll();

    if (empty($data['materiales'])) {
        echo 'No hay materiales para mostrar.';
        return;
    }

    $html = view('admin/inventario/plantilla_general', $data);

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream("material_list_general.pdf", array("Attachment" => 0));
}


}