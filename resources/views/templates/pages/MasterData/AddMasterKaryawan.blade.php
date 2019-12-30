@extends('templates.TemplateMasterData')
@section('app-title', 'Master Karyawan')
@section('table-title')
    @if($form_title)
        {{$form_title}}
    @else
        {{'Add Master Data Siswa'}}
    @endif
@endsection
@section('table')
@if(session('message'))
<script>UIkit.notification({message: '{{session("message")}}', pos: 'top-right',  status: 'danger'});</script>
@endif
    {!! form_start($form) !!}
    <legend class="uk-legend uk-text-center">Data Karyawan</legend>
    @if($edit == true)
    {!! form_row($form->Submit, ['label' => 'Update Data']) !!}
    {!! form_end($form, $renderRest = true) !!}
    @else
    {!! form_end($form, $renderRest = true) !!}
    @endif
@endsection
