<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarioModel extends Model
{
    protected $table            = 'inventario';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idAula', 'imagen','nombre', 'aula', 'categoria', 'descripcion', 'status', 'created_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function busqueda($keywords, $idAula)
{
    return $this->select('inventario.*, categoria.nombre as categoriaNombre, material.nombre as materialNombre')
                ->join('categoria', 'categoria.idCategoria = inventario.categoria')
                ->join('material', 'material.idMate = inventario.nombre')
                ->where('idAula', $idAula)
                ->groupStart()
                    ->like('inventario.nombre', $keywords)
                    ->orLike('categoria.nombre', $keywords)
                    ->orLike('material.nombre', $keywords)
                    ->orLike('inventario.descripcion', $keywords)
                    ->orLike('inventario.status', $keywords)
                    ->orLike('inventario.created_at', $keywords)
                ->groupEnd()
                ->findAll();
}
public function getArticuloConNombreYCategoria($id)
{
    return $this->select('inventario.*, material.nombre as nombre_material, categoria.nombre as nombre_categoria')
                ->join('material', 'materiales.idMate = inventario.nombre')
                ->join('categoria', 'categorias.idCategoria = inventario.categoria')
                ->where('inventario.id', $id)
                ->first();
}


}
