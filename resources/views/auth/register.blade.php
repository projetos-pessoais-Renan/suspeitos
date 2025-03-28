


@extends('layouts.auth')

@section('title', 'Register')

@section('content')

  <!--authentication-->

<div class="mx-3 mx-lg-0">
  <div class="card my-5 col-xl-9 col-xxl-8 mx-auto rounded-4 overflow-hidden border-3 p-4">
    <div class="row g-4">
      <div class="col-lg-6 d-flex">
        <div class="card-body">
            <img src="{{ URL::asset('build/images/s.png') }}" class="mb-5" width="145" alt=""><span style="font-size: 40px; margin-left: -50px" > uspeitos</span>
          <h2 class="mb-0">Cadastre-se</h2>

          <div class="form-body mt-4">
            <form class="row g-3" method="POST" action="{{ route('register') }}">
            @csrf
              <div class="col-12">
                <label for="inputUsername" class="form-label">Nome completo</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="inputUsername" placeholder="Nome completo">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>Nome completo é obrigatório</strong>
                    </span>
                @enderror
              </div>
              <div class="col-12">
                <label for="inputEmailAddress" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="inputEmailAddress" placeholder="exemplo@usuario.com">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>E-mail é obrigatório</strong>
                    </span>
                @enderror
            </div>
              <div class="col-12">
                <label for="inputChoosePassword" class="form-label">Senha</label>
                <div class="input-group" id="show_hide_password">
                  <input type="password" class="form-control border-end-0 @error('password') is-invalid @enderror" name="password" id="inputChoosePassword" placeholder="Informe a senha">
                  <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>Senha e confirmação de senha são obrigatórios</strong>
                    </span>
                @enderror
                </div>
              </div>
              <div class="col-12">
                <label for="inputChoosePassword" class="form-label">Confirme a senha</label>
                <div class="input-group" id="show_hide_password">
                  <input type="password" class="form-control border-end-0" name="password_confirmation" id="inputChoosePassword" placeholder="Confirme a senha">
                  <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>Confirmação de senha inválida</strong>
                    </span>
                @enderror
                </div>
              </div>

              {{-- <div class="col-12">
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                  <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms &amp; Conditions</label>
                </div>
              </div> --}}
              <div class="col-12">
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
              </div>
              <div class="col-12">
                <div class="text-start">
                  <p class="mb-0">Já é cadastrado? <a href="{{ route('login') }}">Clique aqui</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6 d-lg-flex d-none">
        <div class="p-3 rounded-4 w-100 d-flex align-items-center justify-content-center bg-light">
          <img src="{{ URL::asset('build/images/auth/register1.png') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div><!--end row-->
  </div>
</div>

<!--authentication-->

@endsection
