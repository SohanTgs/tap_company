<div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if(Auth::user()->image == null)
                    <img alt="image" src="{{ getImage('assets/images/user/profile/'.'default.png')}}"
                        class="user-img-radious-style">
                @else
                    <img alt="image" src="{{ getImage('assets/images/user/profile/'. Auth::user()->image)}}"
                        class="user-img-radious-style">
                @endif
                <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">{{ Auth::user()->firstname.' '.Auth::user()->lastname }}</div>
              <a href="{{ route('user.profile-setting') }}" class="dropdown-item has-icon {{ menuActiveForUser('user.profile-setting',3) }}"> <i class="fa
										fa-user"></i> Profile
              </a>
              <a href="{{ route('user.deposit') }}" class="dropdown-item has-icon {{ menuActiveForUser('user.deposit',3) }}"><i class="fa fa-dollar-sign" aria-hidden="true"></i>
                Deposit
              </a>
              <a href="{{ route('user.withdraw') }}" class="dropdown-item has-icon {{ menuActiveForUser('user.withdraw',3) }}"><i class="fa fa-dollar-sign" aria-hidden="true"></i>
                Withdraw
              </a>
              @if( $currencyApiAvailable != 0 )
              <a href="{{ route('user.balance.transfer') }}" class="dropdown-item has-icon {{ menuActiveForUser('user.balance.transfer',3) }}"><i class="fas fa-exchange-alt"></i>
                Transfer Balance
              </a>
              @endif
               <a href="{{ route('ticket.open') }}" class="dropdown-item has-icon {{ menuActiveForUser('ticket.open',3) }}"><i class="fas fa-info"></i>
                Contact - Authority
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('user.logout') }}" class="dropdown-item has-icon text-danger"> <i class="fa fa-sign-out-alt"></i>
                {{ __('Logout') }}
              </a>
            </div>
          </li>
        </ul>
      </nav>
