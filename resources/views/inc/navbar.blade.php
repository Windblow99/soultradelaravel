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
    @can('medical-user')
    @if(Auth::user()->approved == "YES")
      <li class="nav-item">
        <a class="nav-link" href="{{ route('medical.users.index') }}">Medical</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user.users.index') }}">Companionship</a>
      </li>   
    @endif
    @endcan
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
      @can('medical-user')
      @if(Auth::user()->approved == "YES")
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Requests
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('requests.sent')}}">
              Created requests
            </a>          
          
            <a class="dropdown-item" href="{{route('requests.received')}}">
              Accepted requests
            </a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Orders
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('orders.sent')}}">
              Created Orders
            </a>          
          
            <a class="dropdown-item" href="{{route('orders.received')}}">
              Accepted Orders
            </a>
          </div>
        </li>
      @endif
      @endcan
      
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          Wallet
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">
            Balance: RM{{ Auth::user()->balance }}
          </a>
          
          @can('user-only')
          @if(Auth::user()->approved == "YES")
            <a class="dropdown-item" href="{{route('checkout.index')}}">
              Top Up
            </a>
          @endif
          @endcan

          @can('medical-user')
          @if(Auth::user()->approved == "YES")
            <a class="dropdown-item" href="{{route('withdrawal.users.index')}}">
              Withdrawal
            </a>
          @endif
          @endcan
        </div>
      </li>

      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          @can('manage-users')
          @if(Auth::user()->approved == "YES")
            <a class="dropdown-item" href="{{ route('admin.users.index') }}">
              User Management
            </a>
            <a class="dropdown-item" href="{{ route('orders.all') }}">
              Order Management
            </a>
          @endif
          @endcan

          @can('admin-only')
            <a class="dropdown-item" href="{{ route('withdrawals.all') }}">
              Financials
            </a>
          @endcan
          
          @can('manage-profile')
            <a class="dropdown-item" href="{{ route('profile.users.index') }}">
                Profile Management
            </a>
          @endcan

          @can('manage-profile')
            <a class="dropdown-item" href="{{ route('changepwd.index') }}">
                Change Password
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