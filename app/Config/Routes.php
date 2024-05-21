<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'UserController::login');

$routes->get('registro', 'RegistroController::new');
$routes->post('registro', 'RegistroController::create');

$routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);


// Rutas para el administrador
$routes->group(
    'admin',
    ['filter' => 'auth'],
    function ($routes) {
        $routes->get('/', 'UserController::login');
        $routes->get('inicioadmin', 'UserController::inicioadmin');
        $routes->get('aula/mostrar', 'AulaController::mostrar');
        $routes->get('aula/aulamenu/(:num)', 'AulaController::menu/$1');
        $routes->get('aula/listaelementos/(:num)', 'AulaController::lista/$1');
        $routes->get('aula/descripcion', 'AulaController::descripcion');
        $routes->get('aula/agregar', 'AulaController::agregar');
        $routes->get('aula/editar/(:num)', 'AulaController::editar/$1');
        $routes->post('aula/listaelemento', 'AulaController::buscar');

        $routes->post('aula/insert', 'AulaController::insert');
        $routes->post('aula/update', 'AulaController::update');

        $routes->get('inventario/generarQR/(:num)', 'InventarioController::generarQR/$1');
        $routes->get('qr/(:any)', 'InventarioController::verQR/$1');


        $routes->get('inventario/mostrar', 'InventarioController::mostrar');
        $routes->get('inventario/agregar', 'InventarioController::agregar');
        $routes->get('inventario/delete/(:num)', 'InventarioController::delete/$1');
        $routes->get('inventario/editar/(:num)', 'InventarioController::editar/$1');

        $routes->post('inventario/insert', 'InventarioController::insert');
        $routes->post('inventario/update', 'InventarioController::update');
        $routes->post('inventario/mostrar', 'InventarioController::buscar');


        $routes->get('mantenimiento/mostrar', 'MantenimientoController::mostrar');
        $routes->get('mantenimiento/almacen', 'MantenimientoController::almacen');
        $routes->post('mantenimiento/almacen', 'MantenimientoController::buscar1');
        $routes->post('mantenimiento/reparacion', 'MantenimientoController::buscar2');
        $routes->post('mantenimiento/descontinuado', 'MantenimientoController::buscar3');
        $routes->get('mantenimiento/reparacion', 'MantenimientoController::reparacion');
        $routes->get('mantenimiento/descontinuado', 'MantenimientoController::descontinuado');
        $routes->get('admin', 'UserController::admin');


        $routes->get('Aula-PDF/(:num)', 'AulaController::generatePDF/$1');
        $routes->get('Aula-General-PDF', 'AulaController::generateGeneralPDF');

        $routes->get('Inventario-PDF', 'InventarioController::generatePDF');
        $routes->get('Inventario-General-PDF', 'InventarioController::generateGeneralPDF');

        $routes->get('Almacen-PDF', 'MantenimientoController::generatePDF');
        $routes->get('Almacen-General-PDF', 'MantenimientoController::generateGeneralPDF');

        $routes->get('Reparacion-PDF', 'MantenimientoController::generatePDF');
        $routes->get('Reparacion-General-PDF', 'MantenimientoController::generateGeneralPDF');

        $routes->get('Reparacion-PDF', 'MantenimientoController::generatePDF');
        $routes->get('Reparacion-General-PDF', 'MantenimientoController::generateGeneralPDF');
    }



);// Rutas para el inventario
$routes->group(
    'inventa',
    ['filter' => 'auth'],
    function ($routes) {
        $routes->get('/', 'UserController::login');
        $routes->get('inicioinventa', 'UserController::inicioinventa');
        $routes->get('aula/mostrar', 'AulaController::mostrar1');
        $routes->get('aula/aulamenu/(:num)', 'AulaController::menu/$1');
        $routes->get('aula/listaelementos/(:num)', 'AulaController::lista1/$1');
        $routes->get('aula/descripcion', 'AulaController::descripcion');
        $routes->get('aula/agregar', 'AulaController::agregar');
        $routes->post('aula/listaelemento', 'AulaController::buscar2');

        $routes->get('inventario/generarQR/(:num)', 'InventarioController::generarQR/$1');
        $routes->get('qr/(:any)', 'InventarioController::verQR/$1');


        $routes->get('inventario/mostrar', 'InventarioController::mostrar1');
        $routes->get('inventario/agregar', 'InventarioController::agregar');

        $routes->post('inventario/insert', 'InventarioController::insert');
        $routes->post('inventario/update', 'InventarioController::update');
        $routes->post('inventario/mostrar', 'InventarioController::buscar');


        $routes->get('mantenimiento/mostrar', 'MantenimientoController::mostrar1');
        $routes->get('mantenimiento/almacen', 'MantenimientoController::almacen1');
        $routes->post('mantenimiento/almacen', 'MantenimientoController::buscar1');
        $routes->post('mantenimiento/reparacion', 'MantenimientoController::buscar2');
        $routes->post('mantenimiento/descontinuado', 'MantenimientoController::buscar3');
        $routes->get('mantenimiento/reparacion', 'MantenimientoController::reparacion');
        $routes->get('mantenimiento/descontinuado', 'MantenimientoController::descontinuado');
        $routes->get('admin', 'UserController::admin');


        $routes->get('Aula-PDF/(:num)', 'AulaController::generatePDF/$1');
        $routes->get('Aula-General-PDF', 'AulaController::generateGeneralPDF');

        $routes->get('Inventario-PDF', 'InventarioController::generatePDF');
        $routes->get('Inventario-General-PDF', 'InventarioController::generateGeneralPDF');

        $routes->get('Almacen-PDF', 'MantenimientoController::generatePDF');
        $routes->get('Almacen-General-PDF', 'MantenimientoController::generateGeneralPDF');

        $routes->get('Reparacion-PDF', 'MantenimientoController::generatePDF');
        $routes->get('Reparacion-General-PDF', 'MantenimientoController::generateGeneralPDF');

        $routes->get('Reparacion-PDF', 'MantenimientoController::generatePDF');
        $routes->get('Reparacion-General-PDF', 'MantenimientoController::generateGeneralPDF');
    }

);

$routes->group(
    'auditor',
    ['filter' => 'auth'],
    function ($routes) {
        $routes->get('/', 'UserController::login');
        $routes->get('inicioauditor', 'UserController::inicioauditor');
        $routes->get('aula/mostrar', 'AulaController::mostrar2');
        $routes->get('aula/listaelementos/(:num)', 'AulaController::lista2/$1');
        $routes->get('aula/descripcion', 'AulaController::descripcion');
        $routes->post('aula/listaelemento', 'AulaController::buscar3');

        $routes->get('inventario/generarQR/(:num)', 'InventarioController::generarQR/$1');
        $routes->get('qr/(:any)', 'InventarioController::verQR/$1');


        $routes->get('inventario/mostrar', 'InventarioController::mostrar2');
        $routes->post('inventario/mostrar', 'InventarioController::buscar');


        $routes->get('mantenimiento/mostrar', 'MantenimientoController::mostrar2');
        $routes->get('mantenimiento/almacen', 'MantenimientoController::almacen2');
        $routes->post('mantenimiento/almacen', 'MantenimientoController::buscar1');
        $routes->post('mantenimiento/reparacion', 'MantenimientoController::buscar2');
        $routes->post('mantenimiento/descontinuado', 'MantenimientoController::buscar3');
        $routes->get('mantenimiento/reparacion', 'MantenimientoController::reparacion');
        $routes->get('mantenimiento/descontinuado', 'MantenimientoController::descontinuado');
        $routes->get('admin', 'UserController::admin');


        $routes->get('Aula-PDF/(:num)', 'AulaController::generatePDF/$1');
        $routes->get('Aula-General-PDF', 'AulaController::generateGeneralPDF');

        $routes->get('Inventario-PDF', 'InventarioController::generatePDF');
        $routes->get('Inventario-General-PDF', 'InventarioController::generateGeneralPDF');

        $routes->get('Almacen-PDF', 'MantenimientoController::generatePDF');
        $routes->get('Almacen-General-PDF', 'MantenimientoController::generateGeneralPDF');

        $routes->get('Reparacion-PDF', 'MantenimientoController::generatePDF');
        $routes->get('Reparacion-General-PDF', 'MantenimientoController::generateGeneralPDF');

        $routes->get('Reparacion-PDF', 'MantenimientoController::generatePDF');
        $routes->get('Reparacion-General-PDF', 'MantenimientoController::generateGeneralPDF');
    }

);

$routes->get('logout', 'UserController::logout');