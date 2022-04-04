<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{route('user.home')}}"><img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" style="height: 80px;margin-top:16px;" alt="logo"></a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Sohan</li>
            <li class="dropdown {{menuActive('user.home')}}">
              <a href="{{ route('user.home') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Deposit and Withdraw</li>

            <li class="dropdown {{ menuActiveForUser(['user.deposit.history', 'user.withdraw.history', 'user.transfer.history'], 3) }}">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fa fa-history"></i><span>
                  Histories</span></a>
              <ul class="dropdown-menu">
                <li>
                    <a class="nav-link" href="{{ route('user.deposit.history') }}" style="color:{{ menuActiveForUser('user.deposit.history', 2) }}">
                    Deposit Logs
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('user.withdraw.history') }}" style="color:{{ menuActiveForUser('user.withdraw.history', 2) }}">
                        Withdraw Logs
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('user.transfer.history') }}" style="color:{{ menuActiveForUser('user.transfer.history', 2) }}">
                        Transfer Logs
                    </a>
                </li>
            </ul>
            </li>

            <li class="menu-header">All Bonus</li>
            <li class="dropdown {{ menuActiveForUser(['user.all.level.bonus', 'user.referral.bonus', 'user.instant.bonus','user.transaction.bonus','user.withdraw.bonus'], 3) }}">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fa fa-gift"></i><span>
                  Bonus</span></a>
              <ul class="dropdown-menu">
                <li>
                    <a class="nav-link" href="{{ route('user.all.level.bonus') }}" style="color:{{ menuActiveForUser('user.all.level.bonus',2) }}">
                        Levels Bonus
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('user.referral.bonus') }}" style="color:{{ menuActiveForUser('user.referral.bonus',2) }}">
                        Referral Bonus
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('user.instant.bonus') }}" style="color:{{ menuActiveForUser('user.instant.bonus',2) }}">
                        Bonus From Admin
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('user.transaction.bonus') }}" style="color:{{ menuActiveForUser('user.transaction.bonus',2) }}">
                        First Level Trx Bonus
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('user.withdraw.bonus') }}" style="color:{{ menuActiveForUser('user.withdraw.bonus',2) }}">
                        First Level Withdraw Bonus
                    </a>
                </li>
            </ul>
            </li>

            <li class="menu-header">Financial Statement</li>
            <li class="{{ menuActiveForUser('user.previous.history',3) }}"><a class="nav-link" href="{{ route('user.previous.history') }}"><i data-feather="file"></i><span>Balance Sheet</span></a></li>

            <li class="menu-header">Receiver Balaces</li>
            <li class="{{ menuActiveForUser('user.get.balance.log',3) }}"><a class="nav-link" href="{{ route('user.get.balance.log') }}"><i class="fas fa-hand-holding-usd"></i><span>Receive Logs</span></a></li>

            <li class="menu-header">Support Ticket</li>
            <li class="{{ menuActiveForUser('ticket',3) }}"><a class="nav-link" href="{{ route('ticket') }}"><i class="fa fa-info"></i><span>Support Tickets</span></a></li>

            <li class="menu-header">All Referrals Info</li>
            <li class="{{ menuActiveForUser('user.all.referrals.view',3) }}"><a class="nav-link" href="{{ route('user.all.referrals.view') }}"><i class="fas fa-network-wired"></i><span>Links</span></a></li>

            @if( $currencyApiAvailable != 0 )
            <li class="menu-header">Transfer Your Wallet</li>
            <li class="{{ menuActiveForUser('user.transfer.wallet',3) }}"><a class="nav-link" href="{{ route('user.transfer.wallet') }}"><i class="fa fa-forward" aria-hidden="true"></i><span>Transfer Wallet</span></a></li>
            @endif


        </ul>
    </aside>
    </div>

