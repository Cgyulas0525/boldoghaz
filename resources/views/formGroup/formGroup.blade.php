@section('css')
    @include('layouts.costumcss')
@endsection

<div class="form-group col-sm-6">
    <div class="form-group col-sm-12">
        <div class="row">
            <div class="mylabel col-sm-2">
                {{ $label }}
            </div>
            <div class="mylabel col-sm-10">
                @if (isset($file))
                    <label class="image__file-upload">Válasszon
                        {{ $field }}
                    </label>
                @else
                    {{ $field }}
                @endif
            </div>
        </div>
    </div>
</div>
