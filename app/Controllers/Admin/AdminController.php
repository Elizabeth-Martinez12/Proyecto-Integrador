<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class AdminController extends BaseController
{
    public function __construct()
    {
        if (session()->get('perfil') != 1) {
            echo view('accesonoautorizado');
            exit;
        }
    }

    public function __construct1()
    {
        if (session()->get('perfil') != 2) {
            echo view('accesonoautorizado');
            exit;
        }
    }

    public function __construct2()
    {
        if (session()->get('perfil') != 3) {
            echo view('accesonoautorizado');
            exit;
        }
    }

    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $usuarios = $usuarioModel->orderBy('id', 'DESC')->findAll();

        $data = [
            'usuarios'  => $usuarios
        ];

        return view('admin/dashboard', $data);
    }
    public function index1()
    {
        $usuarioModel = new UsuarioModel();
        $usuarios = $usuarioModel->orderBy('id', 'DESC')->findAll();

        $data = [
            'usuarios'  => $usuarios
        ];

        return view('inventario/mostrar', $data);
    }

    public function index2()
    {
        $usuarioModel = new UsuarioModel();
        $usuarios = $usuarioModel->orderBy('id', 'DESC')->findAll();

        $data = [
            'usuarios'  => $usuarios
        ];

        return view('auditor/mostrar', $data);
    }

}
