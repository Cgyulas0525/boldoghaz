@section('css')
    <link rel="stylesheet" href="pubic/css/app.css">
    @include('app_scaffold.css.datatables_css')
    @include('app_scaffold.css.costumcss')
@endsection

<!-- Name Field -->
<div class="form-group col-sm-6">
    <div class="form-group col-sm-12">
        {!! Form::label('name', 'Típus:') !!}
        {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
    </div>

    <!-- Commit Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('commit', 'Megjegyzés:') !!}
        {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500, 'rows' => 4, 'id' => 'commit']) !!}
    </div>
    @if (isset($constructionphase->id))
        <!-- Parent Id Field -->
        <div class="form-group col-sm-12">
            {!! Form::hidden('parent_id', 'Parent Id:') !!}
            {!! Form::hidden('parent_id', $constructionphase->id, ['class' => 'form-control']) !!}
        </div>
    @else
        <div class="form-group col-sm-12">
            {!! Form::label('parent_id', 'Felettes:') !!}
            {!! Form::select('parent_id', App\Http\Controllers\ConstructionphaseController::DDDW(), null,
                     ['class'=>'select2 form-control cellLabel', 'required' => 'true', 'id' => 'parent_id']) !!}
        </div>
    @endif
</div>

@if ( isset($partnertypes->id))
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-hover table-bordered partners-table" style="width: 100%;"></table>
            </div>
        </div>
        <div class="text-center"></div>
    </div>
@endif

@section('scripts')
    @include('app_scaffold.js.datatables_js')

    <script type="text/javascript">
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.partners-table').DataTable({
                serverSide: true,
                scrollY: 400,
                scrollX: true,
                paging: false,
                // order: [[1, 'asc']],
                ajax: "{{ route('cpChildIndex', isset($constructionphase->id) ? $constructionphase->id : 0 ) }}",
                columns: [
                    {
                        title: '<a class="btn btn-primary" title="Felvitel" href="{!! route('cpChildCreate', $constructionphase->id) !!}"><i class="fa fa-plus-square"></i></a>',
                        data: 'action',
                        sClass: "text-center",
                        width: '200px',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {title: 'Név', data: 'name', name: 'name'},
                ],
                buttons: []
            });

        });
    </script>
@endsection
