@section('content')
    @include('app_scaffold.html.content-header', ['title' => __('Felhasználói típus')])
    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            {!! Form::open(['route' => 'userstatuses.store']) !!}
            @include('app_scaffold.html.card-body', ['fields' => 'pages.dictionaries.userstatuses.html.fields'])
            @include('app_scaffold.html.card-footer', ['route' => 'userstatuses.index'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
