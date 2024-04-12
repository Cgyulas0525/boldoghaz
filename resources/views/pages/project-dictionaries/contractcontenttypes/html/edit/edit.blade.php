@section('content')
    @include('app_scaffold.html.content-header', ['title' => $contractcontenttypes->name ])
    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            {!! Form::model($contractcontenttypes, ['route' => ['contractcontenttypes.update', $contractcontenttypes->id], 'method' => 'patch']) !!}
            @include('app_scaffold.html.card-body', ['fields' => 'pages.project-dictionaries.contractcontenttypes.html.fields'])
            @include('app_scaffold.html.card-footer', ['route' => 'contractcontenttypes.index'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
