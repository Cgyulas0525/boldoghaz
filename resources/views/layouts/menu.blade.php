<li class="nav-item">
    <a href="{{ route('dashboard') }}"
       class="nav-link">
        <i class="fas fa-tachometer-alt"></i>
        <p>Indító pult</p>
    </a>
</li>

@if (Auth::user()->userstatus_id > 0)
    <li class="nav-item">
        <a href="{{ route('users.index') }}"
           class="nav-link {{ Request::is('users*') && empty(Request::is('*statuses*')) ? 'active' : '' }}">
            <i class="fas fa-chalkboard-teacher"></i>
            <p>Felhasználók</p>
        </a>
    </li>
@endif

@if (Auth::user()->userstatus_id > 0)
    @if (Auth::user()->userstatus_id > 1)
        <li class="nav-item">
            <a href="{{ route('tables.index') }}"
               class="nav-link {{ Request::is('tables*') ? 'active' : '' }}">
                <i class="fas fa-table"></i>
                <p>Táblák</p>
            </a>
        </li>
    @endif
    <li class="nav-item">
        <a href="#" class="nav-link {{ Request::is('*statuses*') ||
                                       Request::is('*types*') ||
                                       Request::is('ecitems*') ||
                                       Request::is('*Classifications*') ? 'active' : '' }}">
            <i class="fas fa-copy"></i>
            <p>
                Szótár adatok
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (Auth::user()->userstatus_id > 1)
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
                <li class="nav-item">
                    <a href="{{ route('equipmenttypes.index') }}"
                       class="nav-link {{ Request::is('equipmenttypes*') ? 'active' : '' }}">
                        <i class="fas fa-house-damage"></i>
                        <p>Felszereltség típus</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('heatingtypes.index') }}"
                       class="nav-link {{ Request::is('heatingtypes*') ? 'active' : '' }}">
                        <i class="fas fa-fire"></i>
                        <p>Fűtés típus</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('energyClassifications.index') }}"
                       class="nav-link {{ Request::is('energyClassifications*') ? 'active' : '' }}">
                        <i class="fas fa-sun"></i>
                        <p>Energetikai besorolás</p>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a href="{{ route('ecitems.index') }}"
                   class="nav-link {{ Request::is('ecitems*') ? 'active' : '' }}">
                    <i class="fas fa-solar-panel"></i>
                    <p>Energ. besorolás elem</p>
                </a>
            </li>
                <li class="nav-item">
                    <a href="{{ route('quantities.index') }}"
                       class="nav-link {{ Request::is('quantities*') ? 'active' : '' }}">
                        <i class="fas fa-pencil-ruler"></i>
                        <p>Mennyiségi egység</p>
                    </a>
                </li>
        </ul>
    </li>
@endif












