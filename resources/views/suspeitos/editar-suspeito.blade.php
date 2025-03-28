@extends('layouts.master')

@section('title', 'Editar Suspeito')

@section('content')
    <h3>Editar Suspeito</h3>

    <form action="{{ route('suspeito.atualizar', $suspeito->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome completo</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $suspeito->nome) }}">
            </div>

            <div class="col-md-6">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento', \Carbon\Carbon::createFromFormat('d/m/Y', $suspeito->data_nascimento)->format('Y-m-d')) }}">

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label for="documento" class="form-label">Documento (CPF ou RG)</label>
                <input type="text" class="form-control" id="documento" name="documento" value="{{ old('documento', $suspeito->documento) }}">
            </div>

            <div class="col-md-6">
                <label for="cor_raca" class="form-label">Cor/Raça</label>
                <select class="form-control" id="cor_raca" name="cor_raca">
                    <option value="">Selecione</option>
                    <option value="Branco" {{ old('cor_raca', $suspeito->cor_raca) == 'Branco' ? 'selected' : '' }}>Branco</option>
                    <option value="Negro" {{ old('cor_raca', $suspeito->cor_raca) == 'Negro' ? 'selected' : '' }}>Negro</option>
                    <option value="Pardo" {{ old('cor_raca', $suspeito->cor_raca) == 'Pardo' ? 'selected' : '' }}>Pardo</option>
                    <option value="Indígena" {{ old('cor_raca', $suspeito->cor_raca) == 'Indígena' ? 'selected' : '' }}>Indígena</option>
                    <option value="Amarelo" {{ old('cor_raca', $suspeito->cor_raca) == 'Amarelo' ? 'selected' : '' }}>Amarelo</option>
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label for="tem_tatuagem" class="form-label">Possui tatuagem?</label>
                <select class="form-control" id="tem_tatuagem" name="tem_tatuagem">
                    <option value="Não" {{ old('tem_tatuagem', $suspeito->tem_tatuagem) == 'Não' ? 'selected' : '' }}>Não</option>
                    <option value="Sim" {{ old('tem_tatuagem', $suspeito->tem_tatuagem) == 'Sim' ? 'selected' : '' }}>Sim</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="qual_tatuagem" class="form-label">Qual tatuagem?</label>
                <input type="text" class="form-control" id="qual_tatuagem" name="qual_tatuagem" value="{{ old('qual_tatuagem', $suspeito->qual_tatuagem) }}">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label for="tem_deficiencia" class="form-label">Possui deficiência?</label>
                <select class="form-control" id="tem_deficiencia" name="tem_deficiencia">
                    <option value="Não" {{ old('tem_deficiencia', $suspeito->tem_deficiencia) == 'Não' ? 'selected' : '' }}>Não</option>
                    <option value="Sim" {{ old('tem_deficiencia', $suspeito->tem_deficiencia) == 'Sim' ? 'selected' : '' }}>Sim</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="qual_deficiencia" class="form-label">Qual deficiência?</label>
                <input type="text" class="form-control" id="qual_deficiencia" name="qual_deficiencia" value="{{ old('qual_deficiencia', $suspeito->qual_deficiencia) }}">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label for="tem_passagem" class="form-label">Possui passagem pela polícia?</label>
                <select class="form-control" id="tem_passagem" name="tem_passagem">
                    <option value="Não" {{ old('tem_passagem', $suspeito->tem_passagem) == 'Não' ? 'selected' : '' }}>Não</option>
                    <option value="Sim" {{ old('tem_passagem', $suspeito->tem_passagem) == 'Sim' ? 'selected' : '' }}>Sim</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
                @if($suspeito->foto)
                    <p><strong>Foto Atual:</strong><br>
                        <img src="{{ asset('storage/' . $suspeito->foto) }}" alt="Foto do Suspeito" class="img-thumbnail w-50">
                    </p>
                @endif
            </div>
        </div>

        <div class="mt-3">
            <label for="obs" class="form-label">Observações</label>
            <textarea class="form-control" id="obs" name="obs" rows="3">{{ old('obs', $suspeito->obs) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Atualizar</button>
        <a href="{{ route('lista_suspeitos') }}" class="btn btn-secondary mt-4">Cancelar</a>
    </form>
@endsection
