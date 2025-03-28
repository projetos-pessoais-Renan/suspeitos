<aside class="sidebar-wrapper">
    <div class="sidebar-header">
      <div class="logo-icon">
        <img src="{{ URL::asset('build/images/s.png') }}" class="logo-img" alt="">
      </div>
      <div class="logo-name flex-grow-1">
        <h5 class="mb-0">Suspeitos</h5>
      </div>
      <div class="sidebar-close">
        <span class="material-icons-outlined">close</span>
      </div>
    </div>
    <div class="sidebar-nav" data-simplebar="true">
        <ul class="metismenu" id="sidenav">
          <li>
            <a href="/">
              <div class="parent-icon"><i class="material-icons-outlined">home</i>
              </div>
              <div class="menu-title"> Home</div>
            </a>
          </li>
          {{-- <li class="menu-label">Usuários</li>
          <li>
            <a class="has-arrow" href="javascript:;">
              <div class="parent-icon"><i class="material-icons-outlined">lock</i>
              </div>
              <div class="menu-title">Autenticação</div>
            </a>
            <ul>
              <li><a class="has-arrow" href="javascript:;"><i class="material-icons-outlined">arrow_right</i>Cadastrar Usuário</a>
                <ul>
                  <li><a href="{{ route('cadastrar_admin') }}"><i class="material-icons-outlined"></i>Admin</a></li>
                  <li><a href="{{ route('cadastrar_suporte') }}"><i class="material-icons-outlined"></i>Suporte</a></li>
                </ul>
              </li>
              <li><a class="has-arrow" href="javascript:;"><i class="material-icons-outlined">arrow_right</i>Lista de usuários</a>
                <ul>
                  <li><a href="{{ route('lista_admin') }}"><i class="material-icons-outlined"></i>Admin</a></li>
                  <li><a href="{{ route('lista_suporte') }}"><i class="material-icons-outlined"></i>Suporte</a></li>
                </ul>
              </li>
            </ul>
          </li> --}}
        <li class="menu-label">Suspeitos</li>
        <li>
          <a href="{{ route('lista_suspeitos') }}">
            <div class="parent-icon"><i class="material-icons-outlined">description</i>
            </div>
            <div class="menu-title">Lista de suspeitos</div>
          </a>
        </li>
        <li>
            <a href="{{ route('cadastrar_suspeitos') }}">
              <div class="parent-icon"><i class="material-icons-outlined">face</i>
              </div>
              <div class="menu-title">Cadastrar suspeitos</div>
            </a>
        </li>
    </div>
    {{-- <div class="sidebar-bottom gap-4">
        <div class="dark-mode">
          <a href="javascript:;" class="footer-icon dark-mode-icon">
            <i class="material-icons-outlined">dark_mode</i>
          </a>
        </div>
    </div> --}}
</aside>
