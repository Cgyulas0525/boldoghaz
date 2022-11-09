<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Típus:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 100, 'id' => 'name']) !!}
</div>

<!-- Businessrate Field -->
<div class="form-group col-sm-2">
    {!! Form::label('businessrate', 'Vállalkozási díj %:') !!}
    {!! Form::number('businessrate', isset($penaltytypes) ? $penaltytypes->businessrate : 0, ['class' => 'form-control text-right','maxlength' => 2, 'id' => 'businessrate']) !!}
</div>

<!-- Daypenalty Field -->
<div class="form-group col-sm-2">
    {!! Form::label('daypenalty', 'Kötbér napi %:') !!}
    {!! Form::number('daypenalty', isset($penaltytypes) ? $penaltytypes->daypenalty : 0, ['class' => 'form-control text-right','maxlength' => 2, 'id' => 'daypenalty']) !!}
</div>

<!-- Daypenaltymax Field -->
<div class="form-group col-sm-2">
    {!! Form::label('daypenaltymax', 'Kötbér max %:') !!}
    {!! Form::number('daypenaltymax', isset($penaltytypes) ? $penaltytypes->daypenaltymax : 0, ['class' => 'form-control text-right','maxlength' => 2, 'id' => 'daypenaltymax']) !!}
</div>

<!-- Commit Field -->
<div class="form-group col-sm-12">
    {!! Form::label('commit', 'Megjegyzés:') !!}
    {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500, 'rows' => 4, 'id' => 'commit']) !!}
</div>

@section('scripts')

    @include('functions.sweetalert_js')

    <script type="text/javascript">

        function daypenaltyComparison(field) {
            let n = parseInt($('#daypenalty').val());
            let b = parseInt($('#daypenaltymax').val());
            console.log(n, b);
            if ( n > b && b != 0) {
                sw("A napi kötbér nem lehet nagyobb a maximum kötbérnél!");
                $(field).focus();
            }
        }

        $('#daypenalty').change(function() {
            daypenaltyComparison('#daypenalty');
            // Toast.fire({
            //     icon: 'warning',
            //     title: 'Signed in successfully'
            // })
        });

        $('#daypenaltymax').change(function() {
            daypenaltyComparison('#daypenaltymax');
        });

        // const Toast = Swal.mixin({
        //     toast: true,
        //     position: 'top',
        //     showConfirmButton: false,
        //     timer: 3000,
        //     timerProgressBar: true,
        //     didOpen: (toast) => {
        //         toast.addEventListener('mouseenter', Swal.stopTimer)
        //         toast.addEventListener('mouseleave', Swal.resumeTimer)
        //     }
        // })


    </script>
@endsection
