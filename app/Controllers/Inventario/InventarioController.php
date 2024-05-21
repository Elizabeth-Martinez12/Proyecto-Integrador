<?php

namespace App\Controllers\Inventario;

use App\Controllers\BaseController;

class InventarioController extends BaseController
{
    public function __construct()
    {
        if (session()->get('perfil') != 2) {
            echo view('accesonoautorizado');
            exit;
        }
    }

    public function index()
    {
        return view('inventario/dashboard');
    }
}
