@extends('templates.TemplateMasterData')
@section('app-title', 'Master Kelas')
@section('table-title')
    @if($form_title)
        {{$form_title}}
    @else
        {{'Add Master Data Kelas'}}
    @endif
@endsection
@section('table')
@if(session('message'))
<script>UIkit.notification({message: '{{session("message")}}', pos: 'top-right',  status: 'danger'});</script>
@endif
    {!! form_start($form) !!}
    <legend class="uk-legend uk-text-center">Data Pembayaran SPP</legend>
    @if($edit == true)
    {!! form_row($form->Submit, ['label' => 'Update Data']) !!}
    @else
    {!! form_end($form, $renderRest = true) !!}
    @endif
@endsection
@section('javascript')
<script>
    $(document).ready(function() {
    $('.select2').select2();
    $(".flatpicker").flatpickr({
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
    });
});
</script>
@endsection