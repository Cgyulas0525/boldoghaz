@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="public/css/app.css">
    <link rel="stylesheet" href="public/css/datatables.css">
    <link rel="stylesheet" href="public/css/Highcharts.css">
    @include('layouts.costumcss')
@endsection

@section('content')
    <div class="row">
        @if (Auth::user()->userstatus_id == 0)
            @include('dashboard.userdashboard')
        @elseif (Auth::user()->userstatus_id == 1)
            @include('dashboard.admindashboard')
        @elseif (Auth::user()->userstatus_id == 2)
            @include('dashboard.devdashboard')
        @endif
    </div>

@endsection

@section('scripts')
    @include('layouts.datatables_js')
    @include('layouts.RowCallBack_js')
    @include('layouts.highcharts_js')
    @include('hsjs.hsjs')

    <script type="text/javascript">
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });
    </script>
@endsection

