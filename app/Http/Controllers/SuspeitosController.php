<?php

namespace App\Http\Controllers;

use App\Models\suspeito;
use App\Services\SuspeitoService;
use Illuminate\Http\Request;

class SuspeitosController extends Controller
{
    protected $suspeitoService;

    public function __construct(SuspeitoService $suspeitoService)
    {
        $this->suspeitoService = $suspeitoService;
    }

    public function index()
    {
        $quantidadeSuspeitos = Suspeito::count(); // Conta os suspeitos cadastrados
        return view('index', compact('quantidadeSuspeitos'));
    }


    public function listaSuspeitos(Request $request)
    {
        $query = Suspeito::query();

        // Filtros
        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->filled('data_nascimento')) {
            $query->whereDate('data_nascimento', '=', $request->data_nascimento);
        }

        if ($request->filled('documento')) {
            $query->where('documento', 'like', '%' . $request->documento . '%');
        }

        if ($request->filled('cor_raca')) {
            $query->where('cor_raca', 'like', '%' . $request->cor_raca . '%');
        }

        if ($request->filled('tem_tatuagem')) {
            $query->where('tem_tatuagem', $request->tem_tatuagem);
        }

        if ($request->filled('tem_deficiencia')) {
            $query->where('tem_deficiencia', $request->tem_deficiencia);
        }

        // Obtém a lista de suspeitos com os filtros aplicados
        $suspeitos = $query->get();

        return view('suspeitos.lista-suspeitos', compact('suspeitos'));
    }

    public function cadastrarSuspeitos()
    {
        return view('suspeitos.cadastrar-suspeitos');
    }

    public function cadastroSuspeitoPost(Request $request)
    {
        $this->suspeitoService->cadastrarSuspeitoPost($request);

        return redirect()->back()->with('success', 'Suspeito cadastrado com sucesso!');
    }

    public function detalhesSuspeito($id)
    {
        $suspeito = suspeito::findOrFail($id);

        return view('suspeitos.detalhes-suspeito', compact('suspeito'));
    }

    public function editarSuspeito($id)
    {
        $suspeito = Suspeito::findOrFail($id);
        return view('suspeitos.editar-suspeito', compact('suspeito'));
    }

    public function atualizarSuspeito(Request $request, $id)
    {
        $suspeito = Suspeito::findOrFail($id);

        $this->suspeitoService->atualizarSuspeito($suspeito, $request);

        return redirect()->route('lista_suspeitos')->with('success', 'Suspeito atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $suspeito = Suspeito::findOrFail($id);
        $suspeito->delete();

        return redirect()->route('lista_suspeitos')->with('success', 'Suspeito excluído com sucesso!');
    }
}
