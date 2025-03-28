@extends('layouts.master')

@section('title', 'Detalhes do Suspeito')

@section('content')
    <h3>Detalhes do Suspeito</h3>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nome: {{ $suspeito->nome }}</h5>
            <p><strong>Data de Nascimento:</strong> {{ $suspeito->data_nascimento }}</p>
            <p><strong>Documento:</strong> {{ $suspeito->documento }}</p>
            <p><strong>Cor/Raça:</strong> {{ $suspeito->cor_raca }}</p>
            <p><strong>Tem Tatuagem:</strong> {{ $suspeito->tem_tatuagem }}</p>
            <p><strong>Qual Tatuagem:</strong> {{ $suspeito->qual_tatuagem ?? 'Não informado' }}</p>
            <p><strong>Tem Deficiência:</strong> {{ $suspeito->tem_deficiencia }}</p>
            <p><strong>Qual Deficiência:</strong> {{ $suspeito->qual_deficiencia ?? 'Não informado' }}</p>
            <p><strong>Tem Passagem pela Polícia:</strong> {{ $suspeito->tem_passagem }}</p>
            <p><strong>Observações:</strong> {{ $suspeito->obs ?? 'Não há observações' }}</p>

            @if($suspeito->foto)
                <p><strong>Foto:</strong><br>
                    <img src="{{ asset('storage/' . $suspeito->foto) }}" alt="Foto do Suspeito" class="img-thumbnail w-50">
                </p>
            @endif

            <a href="{{ route('lista_suspeitos') }}" class="btn btn-secondary">Voltar à lista</a>
            <a href="{{ route('suspeito.editar', $suspeito->id) }}" class="btn btn-warning">Editar</a>
        </div>
    </div>
@endsection
