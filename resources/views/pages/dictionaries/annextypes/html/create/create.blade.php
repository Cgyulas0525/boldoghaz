@section('content')
    @include('app_scaffold.html.content-header', ['title' => __('Melléklet típus')])
    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            {!! Form::open(['route' => 'annextypes.store']) !!}
            @include('app_scaffold.html.card-body', ['fields' => 'pages.dictionaries.annextypes.html.fields'])
            @include('app_scaffold.html.card-footer', ['route' => 'annextypes.index'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
