@if (strtoupper($format) == 'PDF')
    <div class="row justify-content-center">
        <iframe src="{{ asset($file) }}" width="100%" height="800px"></iframe>
    </div>
@endif

@if (strtoupper($format) == 'DOC' || strtoupper($format) == 'DOCX')
    <div class="row justify-content-center">
        <iframe src='https://docs.google.com/gview?embedded=true&url={{ asset($file) }}' width='100%' height='650px' frameborder='0'></iframe>
{{--        <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{asset($file)}}" frameborder="0" style="width: 62%; min-height: 562px;"></iframe>--}}
    </div>
@endif


