@section('content')
    @include('app_scaffold.html.content-header', ['title' => $userstatus->name ])
    <div class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="card">
            {!! Form::model($userstatus, ['route' => ['userstatuses.update', $userstatus->id], 'method' => 'patch']) !!}
            @include('app_scaffold.html.card-body', ['fields' => 'pages.dictionaries.userstatuses.html.fields'])
            @include('app_scaffold.html.card-footer', ['route' => 'userstatuses.index'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection
