<li class="nav-item">
    <a href="#" class="nav-link {{ Request::is('partners1*') ||
                                   Request::is('contracts*') ? 'active' : '' }}">
        <i class="fas fa-tasks"></i>
        <p>
            Projekt
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right"></span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('contracts.index') }}"
               class="nav-link {{ Request::is('contracts*') ? 'active' : '' }}">
                <i class="fas fa-file-contract"></i>
                <p>Szerződések</p>
            </a>
        </li>
    </ul>
</li>


