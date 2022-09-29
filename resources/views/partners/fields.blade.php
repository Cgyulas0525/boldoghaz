@include('layouts.css')

<!-- Name Field -->
<div class="col-lg-4">
    {!! Form::hidden('id', $partners->id, ['class' => 'form-control', 'id' => 'partnerid']) !!}
    {!! Form::label('name', 'Név:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100,'id' => 'name']) !!}
</div>

<div class="col-lg-3">
    {!! Form::label('taxnumber', 'Adószám:') !!}
    {!! Form::text('taxnumber', null, ['class' => 'form-control','maxlength' => 25,'id' => 'taxnumber', 'data-inputmask'=>"'mask': '99999999-9-99'"]) !!}
</div>

<!-- Registrationnumber Field -->
<div class="col-lg-3">
    {!! Form::label('registrationnumber', 'Cégjegyzékszám:') !!}
    {!! Form::text('registrationnumber', null, ['class' => 'form-control','maxlength' => 25,'id' => 'registrationnumber', 'data-inputmask'=>"'mask': '99-99-999999'"]) !!}
</div>

<div class="col-lg-2">
    {!! Form::label('live', 'Aktív:') !!}
    {!! Form::hidden('live', $partners->live, ['class' => 'form-control','id' => 'live']) !!}
    {!! Form::text('livetxt', App\Classes\Utility\utilityClass::igenNem($partners->live), ['class' => 'form-control','maxlength' => 25,'id' => 'livetxt', 'readonly' => 'true']) !!}
</div>

<!-- Commit Field -->
<div class="col-lg-12">
    {!! Form::label('commit', 'Megjegyzés:') !!}
    {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500, 'rows' => 4, 'id' => 'commit']) !!}
</div>

@section('scripts')
    @include('layouts.datatables_js')
    @include('functions.ajax_js')
    @include('partners.tables.ppts_js')
    @include('partners.tables.pemails_js')
    @include('partners.tables.paddress_js')
    @include('partners.tables.pphones_js')
    @include('partners.tables.pba_js')

    <script type="text/javascript">

        $('[data-widget="pushmenu"]').PushMenu('collapse');

        var table;
        var table;
        var tableEmails;
        var tablePhones;
        var tableAddress;
        var tablePba;

        $('#taxnumber').inputmask();
        $('#registrationnumber').inputmask();

        ajaxSetup();

        makeTables();

        function liveNumber() {
            return $('#live').val();
        }

        function allShow() {
            $('#name').attr('readonly', false);
            $('#taxnumber').removeAttr('readonly');
            $('#registrationnumber').removeAttr('readonly');
            $('.saveButton').show();
            $('.paddressbox').show();
            $('.pemailsbox').show();
            $('.pphonesbox').show();
            $('.pptsbox').show();
            $('.pbabox').show();

        }

        function allHide() {
            $('#name').attr('readonly', true);
            $('#taxnumber').attr('readonly', true);
            $('#registrationnumber').attr('readonly', true);
            $('.saveButton').hide();
            $('.paddressbox').hide();
            $('.pemailsbox').hide();
            $('.pphonesbox').hide();
            $('.pptsbox').hide();
            $('.pbabox').hide();
        }

        function hideShow(live) {
            if (live == 1) {
                allShow();
            }
            if (live == 0) {
                allHide();
            }
        }

        function makeTables() {
            table        = pptsTable();
            tableEmails  = pemailsTable();
            tablePhones  = pphonesTable();
            tableAddress = paddressTable();
            tablePba     = pbaTable();
        }

        hideShow(liveNumber());
    </script>
@endsection
