<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function listaAdmin()
    {
        return view('usuarios.admin.lista-admin');
    }

    public function cadastrarAdmin()
    {
        return view('usuarios.admin.cadastrar-admin');
    }

    public function listaSuporte()
    {
        return view('usuarios.suporte.lista-suporte');
    }

    public function cadastrarSuporte()
    {
        return view('usuarios.suporte.cadastrar-suporte');
    }
}
