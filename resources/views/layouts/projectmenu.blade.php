<li class="nav-item">
    <a href="#" class="nav-link {{ Request::is('partners1*') ||
                                   Request::is('contractcontenttypes*')  ||
                                   Request::is('contractnoncontenttypes*') ||
                                   Request::is('contractcustomerprovidetypes*') ||
                                   Request::is('penaltytypes*') ||
                                   Request::is('constructionphases*')  ? 'active' : '' }}">
        <i class="fas fa-tasks"></i>
        <p>
            Projekt szótár
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right"></span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('contractcontenttypes.index') }}"
               class="nav-link {{ Request::is('contractcontenttypes*') ? 'active' : '' }}">
                <i class="fas fa-handshake"></i>
                <p>Szerződés tartalmazza</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('contractnoncontenttypes.index') }}"
               class="nav-link {{ Request::is('contractnoncontenttypes*') ? 'active' : '' }}">
                <i class="fas fa-handshake-slash"></i>
                <p>Nem tartalmazza</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('contractcustomerprovidetypes.index') }}"
               class="nav-link {{ Request::is('contractcustomerprovidetypes*') ? 'active' : '' }}">
                <i class="fas fa-hand-holding-water"></i>
                <p>Megrendelő biztosítja</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('penaltytypes.index') }}"
               class="nav-link {{ Request::is('penaltytypes*') ? 'active' : '' }}">
                <i class="fas fa-swatchbook"></i>
                <p>Kötbér típus</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('constructionphases.index') }}"
               class="nav-link {{ Request::is('constructionphases*') ? 'active' : '' }}">
                <i class="fas fa-tenge"></i>
                <p>Kivitelezési fázisok</p>
            </a>
        </li>

    </ul>
</li>

<li class="nav-item">
    <a href="{{ route('contracts.index') }}"
       class="nav-link {{ Request::is('contracts*') ? 'active' : '' }}">
        <i class="fas fa-file-contract"></i>
        <p>Szerződések</p>
    </a>
</li>

