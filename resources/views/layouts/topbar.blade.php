<header class="top-header">
    <nav class="navbar navbar-expand align-items-center gap-4">
      <div class="btn-toggle">
        <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
      </div>
      <div class="search-bar flex-grow-1">
        <div class="position-relative">
          <div class="search-popup p-3">
            <div class="card rounded-4 overflow-hidden">
              <div class="card-body search-content">
              </div>
            </div>
          </div>
        </div>
      </div>
      <ul class="navbar-nav gap-1 nav-right-links align-items-center">
        <li class="nav-item dropdown">
          <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
            <div class="notify-list">
            </div>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
             <img src="{{ URL::asset('build/images/avatars/logo_civil.jpg') }}" class="rounded-circle p-1 border" width="45" height="45">
          </a>
          <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
            <a class="dropdown-item  gap-2 py-2" href="javascript:;">
              <div class="text-center">
                <img src="{{ URL::asset('build/images/avatars/logo_civil.jpg') }}" class="rounded-circle p-1 shadow mb-3" width="90" height="90"
                  alt="">
                <h5 class="user-name mb-0 fw-bold">{{ Auth::user()->name }}</h5>
              </div>
            </a>
            <hr class="dropdown-divider">
            {{-- <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
              class="material-icons-outlined">person_outline</i>Profile</a>
                        <hr class="dropdown-divider"> --}}
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <button type="submit" class="dropdown-item d-flex align-items-center gap-2 py-2">
                    <i data-lucide="log-out" class="material-icons-outlined">power_settings_new</i>
                    Sair
                </button>
            </form>
          </div>
        </li>
      </ul>
    </nav>
  </header>
