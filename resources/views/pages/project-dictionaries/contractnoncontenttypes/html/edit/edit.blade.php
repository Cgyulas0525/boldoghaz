@section('content')
    @include('app_scaffold.html.content-header', ['title' => $contractnoncontenttypes->name ])
    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            {!! Form::model($contractnoncontenttypes, ['route' => ['contractnoncontenttypes.update', $contractnoncontenttypes->id], 'method' => 'patch']) !!}
            @include('app_scaffold.html.card-body', ['fields' => 'pages.project-dictionaries.contractnoncontenttypes.html.fields'])
            @include('app_scaffold.html.card-footer', ['route' => 'contractnoncontenttypes.index'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
