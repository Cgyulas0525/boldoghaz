<li class="nav-item">
    <a href="{{ route('dashboard') }}"
       class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Indító pult</p>
    </a>
</li>

@if (Auth::user()->userstatus_id > 1)
    <li class="nav-item">
        <li class="nav-item">
            <a href="{{ route('tables.index') }}"
               class="nav-link {{ Request::is('tables*') ? 'active' : '' }}">
                <i class="fas fa-table"></i>
                <p>Táblák</p>
            </a>
        </li>
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Szótár adatok
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('userstatuses.index') }}"
                   class="nav-link {{ Request::is('userstatuses*') ? 'active' : '' }}">
                    <i class="fas fa-hands"></i>
                    <p> Felhasználó típus</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('partnertypes.index') }}"
                   class="nav-link {{ Request::is('partnertypes*') ? 'active' : '' }}">
                    <i class="fas fa-people-arrows"></i>
                    <p> Partner típus</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('addresstypes.index') }}"
                   class="nav-link {{ Request::is('addresstypes*') ? 'active' : '' }}">
                    <i class="fas fa-landmark"></i>
                    <p> Cím típus</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('phonenumbertypes.index') }}"
                   class="nav-link {{ Request::is('phonenumbertypes*') ? 'active' : '' }}">
                    <i class="fas fa-blender-phone"></i>
                    <p>Telefonszám típus</p>
                </a>
            </li>
        </ul>
    </li>
@endif

@if (Auth::user()->userstatus_id > 0)
    <li class="nav-item">
        <a href="{{ route('users.index') }}"
           class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
            <i class="fas fa-chalkboard-teacher"></i>
            <p>Felhasználók</p>
        </a>
    </li>
@endif



<li class="nav-item">
    <a href="{{ route('phonenumbertypes.index') }}"
       class="nav-link {{ Request::is('phonenumbertypes*') ? 'active' : '' }}">
        <p>Phonenumbertypes</p>
    </a>
</li>


