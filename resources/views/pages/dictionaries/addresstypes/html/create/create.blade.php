@section('content')
    @include('app_scaffold.html.content-header', ['title' => __('Cím típus')])
    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            {!! Form::open(['route' => 'addresstypes.store']) !!}
            @include('app_scaffold.html.card-body', ['fields' => 'pages.dictionaries.addresstypes.html.fields'])
            @include('app_scaffold.html.card-footer', ['route' => 'addresstypes.index'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
