<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/home">{{ config('app.name', 'SoulTradeCo.') }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="/home">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/about">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('medical.users.index') }}">Medical</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('user.users.index') }}">Companionship</a>
    </li>
    {{-- <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="/medicalHome">Action</a>
        <a class="dropdown-item" href="/playHome">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </li> --}}
  </ul>

  <!-- Right Side Of Navbar -->
  <ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest
      @if (Route::has('login'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
      @endif
      
      @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
      @endif
    @else
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          Orders
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          {{-- @can('') --}}
            <a class="dropdown-item" href="{{route('orders.sent')}}">
              Created Orders
            </a>
          {{-- @endcan --}}
          
          {{-- @can('') --}}
            <a class="dropdown-item" href="{{route('orders.received')}}">
              Accepted Orders
            </a>
          {{-- @endcan --}}
        </div>
      </li>

      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          Wallet
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          {{-- @can('') --}}
            <a class="dropdown-item" href="#">
              Balance: RM{{ Auth::user()->balance }}
            </a>
          {{-- @endcan --}}
          
          {{-- @can('') --}}
            <a class="dropdown-item" href="{{route('checkout.index')}}">
              Top Up
            </a>
          {{-- @endcan --}}

          {{-- @can('') --}}
            <a class="dropdown-item" href="{{route('withdrawal.users.index')}}">
              Withdrawal
            </a>
          {{-- @endcan --}}
        </div>
      </li>

      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          @can('manage-users')
            <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                User Management
            </a>
          @endcan
          
          @can('manage-profile')
            <a class="dropdown-item" href="{{ route('profile.users.index') }}">
                Profile Management
            </a>
          @endcan

          <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </div>
      </li>
    @endguest
  </ul>
</nav>