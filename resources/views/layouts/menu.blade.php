<li class="nav-item">
    <a href="{{ route('dashboard') }}"
       class="nav-link">
        <i class="fas fa-tachometer-alt"></i>
        <p>Indító pult</p>
    </a>
</li>

@cannot('felhasználó')
    <li class="nav-item">
        <a href="{{ route('users.index') }}"
           class="nav-link {{ Request::is('users*') && empty(Request::is('*statuses*')) ? 'active' : '' }}">
            <i class="fas fa-chalkboard-teacher"></i>
            <p>Felhasználók</p>
        </a>
    </li>
    @can('fejlesztő')
        <li class="nav-item">
            <a href="{{ route('tables.index') }}"
               class="nav-link {{ Request::is('tables*') ? 'active' : '' }}">
                <i class="fas fa-table"></i>
                <p>Táblák</p>
            </a>
        </li>
    @endcan
    <li class="nav-item">
        <a href="#" class="nav-link {{ Request::is('*statuses*') ||
                                       Request::is('*types*') ||
                                       Request::is('ecitems*') ||
                                       Request::is('eqitems*') ||
                                       Request::is('quantities*') ||
                                       Request::is('structures*') ||
                                       Request::is('*Classifications*') ? 'active' : '' }}">
            <i class="fas fa-copy"></i>
            <p>
                Szótár adatok
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @can('fejlesztő')
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
                    <a href="{{ route('eqitems.index') }}"
                       class="nav-link {{ Request::is('eqitems*') ? 'active' : '' }}">
                        <i class="fas fa-door-open"></i>
                        <p>Felszereltség elem</p>
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
                    <a href="{{ route('ecitems.index') }}"
                       class="nav-link {{ Request::is('ecitems*') ? 'active' : '' }}">
                        <i class="fas fa-solar-panel"></i>
                        <p>Energ. besorolás elem</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('energyClassifications.index') }}"
                       class="nav-link {{ Request::is('energyClassifications*') ? 'active' : '' }}">
                        <i class="fas fa-sun"></i>
                        <p>Energetikai besorolás</p>
                    </a>
                </li>
            @endcan
            <li class="nav-item">
                <a href="{{ route('quantities.index') }}"
                   class="nav-link {{ Request::is('quantities*') ? 'active' : '' }}">
                    <i class="fas fa-pencil-ruler"></i>
                    <p>Mennyiségi egység</p>
                </a>
            </li>
            @cannot('felhasználó')
                <li class="nav-item">
                    <a href="{{ route('structures.index') }}"
                       class="nav-link {{ Request::is('structures*') ? 'active' : '' }}">
                        <i class="fas fa-cogs"></i>
                        <p>Alapszerkezetek</p>
                    </a>
                </li>
            @endcannot
        </ul>
    </li>
@endcannot

{{--<li class="nav-item">--}}
{{--    <a href="{{ route('ececitems.index') }}"--}}
{{--       class="nav-link {{ Request::is('ececitems*') ? 'active' : '' }}">--}}
{{--        <p>Ececitems</p>--}}
{{--    </a>--}}
{{--</li>--}}

{{--<li class="nav-item">--}}
{{--    <a href="{{ route('eqeqitems.index') }}"--}}
{{--       class="nav-link {{ Request::is('eqeqitems*') ? 'active' : '' }}">--}}
{{--        <p>Eqeqitems</p>--}}
{{--    </a>--}}
{{--</li>--}}


