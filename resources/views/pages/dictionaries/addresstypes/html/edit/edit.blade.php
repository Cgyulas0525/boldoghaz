@section('content')
    @include('app_scaffold.html.content-header', ['title' => $addresstypes->name ])
    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            {!! Form::model($addresstypes, ['route' => ['addresstypes.update', $addresstypes->id], 'method' => 'patch']) !!}
            @include('app_scaffold.html.card-body', ['fields' => 'pages.dictionaries.addresstypes.html.fields'])
            @include('app_scaffold.html.card-footer', ['route' => 'addresstypes.index'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
