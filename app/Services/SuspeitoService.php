<?php

namespace App\Services;

use App\Models\suspeito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuspeitoService
{
    public function cadastrarSuspeitoPost(Request $request)
    {
        $request->validate([
            'nome' => 'nullable|string|max:255',
            'data_nascimento' => 'nullable|date',
            'documento' => 'nullable|string|max:50',
            'tem_tatuagem' => 'nullable',
            'qual_tatuagem' => 'nullable|string|max:255',
            'tem_deficiencia' => 'nullable',
            'qual_deficiencia' => 'nullable|string|max:255',
            'cor_raca' => 'nullable|string|max:50',
            'tem_passagem' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'obs' => 'nullable|string',
        ]);

        $suspeito = new Suspeito();
        $suspeito->nome = $request->nome;
        $suspeito->data_nascimento = $request->data_nascimento;
        $suspeito->documento = $request->documento;
        $suspeito->tem_tatuagem = $request->tem_tatuagem;
        $suspeito->qual_tatuagem = $request->qual_tatuagem;
        $suspeito->tem_deficiencia = $request->tem_deficiencia;
        $suspeito->qual_deficiencia = $request->qual_deficiencia;
        $suspeito->cor_raca = $request->cor_raca;
        $suspeito->tem_passagem = $request->tem_passagem;
        $suspeito->obs = $request->obs;

        if ($request->hasFile('foto')) {

            $nome = str_replace(' ', '_', strtolower($request->nome));
            $dataNascimento = date('Ymd', strtotime($request->data_nascimento));

            $extensao = $request->file('foto')->getClientOriginalExtension();

            $nomeArquivo = "{$nome}_{$dataNascimento}.{$extensao}";

            $path = $request->file('foto')->storeAs('suspeitos', $nomeArquivo, 'public');

            $suspeito->foto = $path;
        }

        $suspeito->save();

        return $suspeito;
    }

    public function listarSuspeitos()
    {
        return Suspeito::all();
    }

    public function atualizarSuspeito(Suspeito $suspeito, Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'nullable|string|max:255',
            'data_nascimento' => 'nullable|date',
            'documento' => 'nullable|string',
            'tem_tatuagem' => 'nullable|string',
            'qual_tatuagem' => 'nullable|string',
            'tem_deficiencia' => 'nullable|string',
            'qual_deficiencia' => 'nullable|string',
            'cor_raca' => 'nullable|string',
            'tem_passagem' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
            'obs' => 'nullable|string',
        ]);

        $suspeito->nome = $validatedData['nome'];
        $suspeito->data_nascimento = $validatedData['data_nascimento'];
        $suspeito->documento = $validatedData['documento'];
        $suspeito->tem_tatuagem = $validatedData['tem_tatuagem'];
        $suspeito->qual_tatuagem = $validatedData['qual_tatuagem'];
        $suspeito->tem_deficiencia = $validatedData['tem_deficiencia'];
        $suspeito->qual_deficiencia = $validatedData['qual_deficiencia'];
        $suspeito->cor_raca = $validatedData['cor_raca'];
        $suspeito->tem_passagem = $validatedData['tem_passagem'];
        $suspeito->obs = $validatedData['obs'];

        if ($request->hasFile('foto')) {
            if ($suspeito->foto) {
                Storage::delete('public/' . $suspeito->foto);
            }

            $fotoPath = $request->file('foto')->store('suspeitos', 'public');
            $suspeito->foto = $fotoPath;
        }

        $suspeito->save();

        return $suspeito;
    }
}
