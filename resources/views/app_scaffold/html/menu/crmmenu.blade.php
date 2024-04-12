<li class="nav-item">
    <a href="#" class="nav-link {{ Request::is('partners*') ||
                                       Request::is('addresses*') ||
                                       Request::is('emails*') ||
                                       Request::is('partnerbankaccounts*') ||
                                       Request::is('phonenumbers*') ? 'active' : '' }}">
        <i class="fas fa-users-cog"></i>
        <p>
            CRM
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right"></span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('partners.index') }}"
               class="nav-link {{ Request::is('partners*') ? 'active' : '' }}">
                <i class="fas fa-users-cog"></i>
                <p>Partnerek</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('addresses.index') }}"
               class="nav-link {{ Request::is('addresses*') ? 'active' : '' }}">
                <i class="fas fa-address-card"></i>
                <p>Címek</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('emails.index') }}"
               class="nav-link {{ Request::is('emails*') ? 'active' : '' }}">
                <i class="fas fa-at"></i>
                <p>Email címek</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('phonenumbers.index') }}"
               class="nav-link {{ Request::is('phonenumbers*') ? 'active' : '' }}">
                <i class="fas fa-mobile"></i>
                <p>Telefonszámok</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('partnerbankaccounts.index') }}"
               class="nav-link {{ Request::is('partnerbankaccounts*') ? 'active' : '' }}">
                <i class="fas fa-piggy-bank"></i>
                <p>Bankszámlaszámok</p>
            </a>
        </li>

    </ul>
</li>
