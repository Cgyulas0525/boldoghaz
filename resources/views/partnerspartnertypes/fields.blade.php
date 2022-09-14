<!-- Partnertypes Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('partnertypes_id', 'Típus:') !!}
    @if (isset($partnerspartnertypes))
        {!! Form::select('partnertypes_id',
                    App\Classes\Partners\partnerDataDDDWClass::typesNotInPartnerspartnertypesModify($partnerspartnertypes->partner_id, $partnerspartnertypes->partnertypes_id), $partnerspartnertypes->partnertypes_id,
                     ['class'=>'select2 form-control cellLabel', 'required' => 'true', 'id' => 'partnertypes_id']) !!}
    @else
        {!! Form::select('partnertypes_id',
                    App\Classes\Partners\partnerDataDDDWClass::typesNotInPartnerspartnertypes($parentId), null,
                     ['class'=>'select2 form-control cellLabel', 'required' => 'true', 'id' => 'partnertypes_id']) !!}
    @endif
</div>

<!-- Commit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commit', 'Megjegyzés:') !!}
    {!! Form::textarea('commit', null, ['class' => 'form-control','maxlength' => 500, 'rows' => 4, 'id' => 'commit']) !!}
</div>

<!-- Partner Id Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('partner_id', 'Partner Id:') !!}
    {!! Form::hidden('partner_id', isset($parentId) ? $parentId : $partnerspartnertypes->partner_id, ['class' => 'form-control']) !!}
</div>
