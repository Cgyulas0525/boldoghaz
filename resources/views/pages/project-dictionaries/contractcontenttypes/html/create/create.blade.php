@section('content')
    @include('app_scaffold.html.content-header', ['title' => __('Szerződés tartalmazza')])
    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            {!! Form::open(['route' => 'contractcontenttypes.store']) !!}
            @include('app_scaffold.html.card-body', ['fields' => 'pages.project-dictionaries.contractcontenttypes.html.fields'])
            @include('app_scaffold.html.card-footer', ['route' => 'contractcontenttypes.index'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
