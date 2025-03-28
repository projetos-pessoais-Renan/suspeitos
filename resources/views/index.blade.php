@extends('layouts.master')

@section('title', 'Suspeitos')

@section('content')
    <h3>Bem vindo(a) ao sistema de Suspeitos</h3>

    <div class="card shadow-lg border-0 rounded-3" style="max-width: 300px; margin: auto;">
        <div class="card-body text-center">
            <!-- Ícone de bonequinho -->
            <i class="fas fa-user-alt fa-5x text-primary mb-3"></i>

            <!-- Exibindo a quantidade de suspeitos cadastrados -->
            <h5 class="card-title mb-3">Suspeitos cadastrados</h5>
            <p class="card-text fs-4 fw-bold text-secondary">{{ $quantidadeSuspeitos }} Suspeitos</p>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Adicione o script do FontAwesome se não estiver usando -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
