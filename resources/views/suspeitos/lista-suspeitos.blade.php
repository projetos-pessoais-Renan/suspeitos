@extends('layouts.master')

@section('title', 'Suspeitos')

@section('content')
    <h3>Lista de Suspeitos</h3>

    @if (session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('lista_suspeitos') }}" class="mb-3">
        <div class="row">
            <div class="col-md-2">
                <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ request('nome') }}">
            </div>
            <div class="col-md-2">
                <input type="date" name="data_nascimento" class="form-control" value="{{ request('data_nascimento') }}">
            </div>
            <div class="col-md-2">
                <input type="text" name="documento" class="form-control" placeholder="Documento" value="{{ request('documento') }}">
            </div>
            <div class="col-md-2">
                <input type="text" name="cor_raca" class="form-control" placeholder="Cor/Raça" value="{{ request('cor_raca') }}">
            </div>
            <div class="col-md-2">
                <select name="tem_tatuagem" class="form-control">
                    <option value="">Tem Tatuagem?</option>
                    <option value="Sim" {{ request('tem_tatuagem') == 'Sim' ? 'selected' : '' }}>Sim</option>
                    <option value="Não" {{ request('tem_tatuagem') == 'Não' ? 'selected' : '' }}>Não</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="tem_deficiencia" class="form-control">
                    <option value="">Tem Deficiência?</option>
                    <option value="Sim" {{ request('tem_deficiencia') == 'Sim' ? 'selected' : '' }}>Sim</option>
                    <option value="Não" {{ request('tem_deficiencia') == 'Não' ? 'selected' : '' }}>Não</option>
                </select>
            </div>
            <div class="col-md-1 mt-2">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
            <div class="col-md-2 mt-2">
                <button type="button" class="btn btn-secondary" onclick="clearFilters()">Limpar Filtros</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Documento</th>
                <th scope="col">Cor/Raça</th>
                <th scope="col">Tem Tatuagem?</th>
                <th scope="col">Tem Deficiência?</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suspeitos as $suspeito)
                <tr>
                    <td>{{ $suspeito->nome }}</td>
                    <td>{{ $suspeito->data_nascimento }}</td>
                    <td>{{ $suspeito->documento }}</td>
                    <td>{{ $suspeito->cor_raca }}</td>
                    <td>{{ $suspeito->tem_tatuagem }}</td>
                    <td>{{ $suspeito->tem_deficiencia }}</td>
                    <td>
                        <a href="{{ route('suspeito.detalhes', $suspeito->id) }}" class="btn btn-info btn-sm">Ver Detalhes</a>
                        <a href="{{ route('suspeito.editar', $suspeito->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form id="delete-form-{{ $suspeito->id }}" action="{{ route('suspeito.excluir', $suspeito->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(event, {{ $suspeito->id }}, '{{ $suspeito->nome }}')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(event, suspeitoId, suspeitoNome) {
        event.preventDefault();

        Swal.fire({
            title: 'Tem certeza?',
            text: `Você deseja excluir o suspeito ${suspeitoNome}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                var form = document.getElementById(`delete-form-${suspeitoId}`);
                if (form) {
                    form.submit();
                }
            }
        });
    }

    window.addEventListener('DOMContentLoaded', (event) => {
        setTimeout(function() {
            var successAlert = document.getElementById('success-alert');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
        }, 3000);
    });

    function clearFilters() {
        window.location.href = "{{ route('lista_suspeitos') }}";
    }
</script>
@endsection
