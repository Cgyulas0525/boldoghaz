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
{{--        <li class="nav-item">--}}
{{--            <a href="{{ route('menus.index') }}"--}}
{{--               class="nav-link {{ Request::is('menus*') ? 'active' : '' }}">--}}
{{--                <i class="fas fa-bars"></i>--}}
{{--                <p>Menus</p>--}}
{{--            </a>--}}
{{--        </li>--}}
    @endcan
@endcannot

@include('layouts.szotarmenu')
@include('layouts.crmmenu')
@include('layouts.projectmenu')

