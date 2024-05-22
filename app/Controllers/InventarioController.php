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
        return redirect()->to('/admin/aula/listaelementos/' . $_POST['idAula']);
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
        $categoriaModel = model('CategoriaModel');
        $aulaModel = model('AulaModel');
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
        $mantenimientoModel = model('MantenimientoModel');
        $reparacionModel = model('ReparacionModel');
        $descontinuadoModel = model('DescontinuadoModel');
        $almacenModel = model('AlmacenModel');  // Asegúrate de tener un modelo para la tabla de Almacén
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
            'fechaSalidaReparacion' => 'permit_empty',
            'nombreAlmacen' => 'permit_empty',
            'descripcionAlmacen' => 'permit_empty',
            'fechaEntrada' => 'permit_empty',
            'fechaSalidaAlmacen' => 'permit_empty'
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
    
        // Obtener el artículo desde la tabla inventario
        $articulo = $inventarioModel->find($id);
        if (!$articulo) {
            return redirect()->back()->withInput()->with('error', 'El artículo no existe en el inventario.');
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
                $articuloData = [
                    'nombre' => $articulo->nombre,
                    'categoria' => $articulo->categoria,
                    'descripcion' => $articulo->descripcion,
                    'idAula' => $articulo->idAula
                ];
    
                switch ($inactivoStatus) {
                    case 'almacen':
                        $almacenData = [
                            'nombre' => $articulo->nombre,  // Usar el nombre del artículo desde inventario
                            'descripcion' => $this->request->getPost('descripcionAlmacen'),
                            'idAula' => $articulo->idAula,
                            'fechaEntrada' => $this->request->getPost('fechaEntrada'),
                            'fechaSalida' => $this->request->getPost('fechaSalidaAlmacen')
                        ];
                        $almacenModel->insert($almacenData);
                        break;
                    case 'reparacion':
                        $reparacionData = [
                            'nombre' => $articulo->nombre,  // Usar el nombre del artículo desde inventario
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
                            'nombre' => $articulo['nombre'],  // Usar el nombre del artículo desde inventario
                            'razon' => $this->request->getPost('razon'),
                            'fechaSalida' => $this->request->getPost('fechaSalida'),
                            'idAula' => $articulo['idAula']
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
    
        return redirect('admin/inventario/mostrar')->with('message', 'Artículo actualizado exitosamente');
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