<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="https://www.boldoghaz.hu/" class="brand-link">
        <img src={{ URL::asset('/public/img/BoldogHaz.png') }}
             alt="{{ config('app.name') }} Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('app_scaffold.html.menu.menu')
            </ul>
        </nav>
    </div>

</aside>
