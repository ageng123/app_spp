@extends('templates.TemplateMasterData')
@section('app-title', 'Tambah Data Pembayaran SPP')
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
    {!! form_until($form, 'Simpan') !!}
    @if($edit == true)
    {!! form_row($form->Submit, ['label' => 'Update Data']) !!}
    {!! form_end($form, $renderRest = true) !!}
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
        defaultDate: "<?php echo date('Y-m-d'); ?>"
    });
});
</script>
@endsection
