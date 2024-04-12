@section('content')
    @include('app_scaffold.html.content-header', ['title' => $annextypes->name ])
    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            {!! Form::model($annextypes, ['route' => ['annextypes.update', $annextypes->id], 'method' => 'patch']) !!}
            @include('app_scaffold.html.card-body', ['fields' => 'pages.dictionaries.annextypes.html.fields'])
            @include('app_scaffold.html.card-footer', ['route' => 'annextypes.index'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
