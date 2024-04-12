<li class="nav-item">
    <a href="#" class="nav-link {{ Request::is('*statuses*') ||
                                   Request::is('ecitems*') ||
                                   Request::is('eqitems*') ||
                                   Request::is('quantities*') ||
                                   Request::is('structures*') ||
                                   Request::is('additionalelements*') ||
                                   Request::is('settlements*') ||
                                   Request::is('financialinstitutions*') ||
                                   Request::is('partnertypes*') ||
                                   Request::is('addresstypes*') ||
                                   Request::is('phonenumbertypes*') ||
                                   Request::is('equipmenttypes*') ||
                                   Request::is('heatingtypes*') ||
                                   Request::is('contracttypes*') ||
                                   Request::is('housetypes*') ||
                                   Request::is('retentiontypes*') ||
                                   Request::is('annextypes*') ||
                                   Request::is('vismaiortypes*') ||
                                   Request::is('*Classifications*') ? 'active' : '' }}">
        <i class="fas fa-copy"></i>
        <p>
            Szótár adatok
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right"></span>
        </p>
    </a>
    <?php
        $icon = 'fas fa-hands';
    ?>
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
            <li class="nav-item">
                <a href="{{ route('retentiontypes.index') }}"
                   class="nav-link {{ Request::is('retentiontypes*') ? 'active' : '' }}">
                    <i class="fas fa-unlink"></i>
                    <p>Visszatartás típus</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('annextypes.index') }}"
                   class="nav-link {{ Request::is('annextypes*') ? 'active' : '' }}">
                    <i class="fas fa-paperclip"></i>
                    <p>Melléklet típus</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('vismaiortypes.index') }}"
                   class="nav-link {{ Request::is('vismaiortypes*') ? 'active' : '' }}">
                    <i class="fas fa-exclamation-triangle"></i>
                    <p>Vismaior típus</p>
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
        <li class="nav-item">
            <a href="{{ route('financialinstitutions.index') }}"
               class="nav-link {{ Request::is('financialinstitutions*') ? 'active' : '' }}">
                <i class="fas fa-piggy-bank"></i>
                <p>Péznintézetek</p>
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
            <li class="nav-item">
                <a href="{{ route('additionalelements.index') }}"
                   class="nav-link {{ Request::is('additionalelements*') ? 'active' : '' }}">
                    <i class="fas fa-cubes"></i>
                    <p>Kiegészítő elemek</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('settlements.index') }}"
                   class="nav-link {{ Request::is('settlements*') ? 'active' : '' }}">
                    <i class="fas fa-city"></i>
                    <p>Települések</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('contracttypes.index') }}"
                   class="nav-link {{ Request::is('contracttypes*') ? 'active' : '' }}">
                    <i class="fas fa-file-signature"></i>
                    <p>Szerződés típus</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('housetypes.index') }}"
                   class="nav-link {{ Request::is('housetypes*') ? 'active' : '' }}">
                    <i class="fas fa-house-user"></i>
                    <p>Ház típus</p>
                </a>
            </li>
        @endcannot
    </ul>
</li>

