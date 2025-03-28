@extends('layouts.master')

@section('title', 'Cadastrar Suspeito')

@section('content')

<div class="container mt-4">
    <h3 class="mb-4">Cadastrar Suspeito</h3>

    @if ($errors->any())
        <div class="alert alert-danger" id="error-alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('cadastrar_suspeito_post') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome completo</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>

            <div class="col-md-6">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label for="documento" class="form-label">Documento (CPF ou RG)</label>
                <input type="text" class="form-control" id="documento" name="documento">
            </div>

            <div class="col-md-6">
                <label for="cor_raca" class="form-label">Cor/Raça</label>
                <select class="form-control" id="cor_raca" name="cor_raca">
                    <option value="">Selecione</option>
                    <option value="Branco">Branco</option>
                    <option value="Negro">Negro</option>
                    <option value="Pardo">Pardo</option>
                    <option value="Indígena">Indígena</option>
                    <option value="Amarelo">Amarelo</option>
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label class="form-label">Possui tatuagem?</label>
                <select class="form-control" id="tem_tatuagem" name="tem_tatuagem" onchange="toggleField('tem_tatuagem', 'qual_tatuagem')">
                    <option value="Não">Não</option>
                    <option value="Sim">Sim</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="qual_tatuagem" class="form-label">Qual tatuagem?</label>
                <input type="text" class="form-control" id="qual_tatuagem" name="qual_tatuagem" disabled>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label class="form-label">Possui deficiência?</label>
                <select class="form-control" id="tem_deficiencia" name="tem_deficiencia" onchange="toggleField('tem_deficiencia', 'qual_deficiencia')">
                    <option value="Não">Não</option>
                    <option value="Sim">Sim</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="qual_deficiencia" class="form-label">Qual deficiência?</label>
                <input type="text" class="form-control" id="qual_deficiencia" name="qual_deficiencia" disabled>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label class="form-label">Possui passagem pela polícia?</label>
                <select class="form-control" id="tem_passagem" name="tem_passagem">
                    <option value="Não">Não</option>
                    <option value="Sim">Sim</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
        </div>

        <div class="mt-3">
            <label for="obs" class="form-label">Observações</label>
            <textarea class="form-control" id="obs" name="obs" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Cadastrar</button>
    </form>
</div>

@endsection

@section('scripts')
<script>
    function toggleField(selectId, fieldId) {
        var select = document.getElementById(selectId);
        var field = document.getElementById(fieldId);

        field.disabled = select.value !== "Sim";
    }

    window.addEventListener('DOMContentLoaded', (event) => {
        setTimeout(function() {
            var successAlert = document.getElementById('success-alert');
            if (successAlert) {
                successAlert.style.display = 'none';
            }

            var errorAlert = document.getElementById('error-alert');
            if (errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 3000);
    });
</script>
@endsection
