@extends('templates.TemplateMasterData')
@section('app-title', 'Master Siswa')
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
    <legend class="uk-legend uk-text-center">Data Mahasiswa</legend>
    {!! form_until($form, 'kelas') !!}
    <legend class="uk-legend uk-text-center" style="margin-top: 1vh">Data Orang Tua</legend>
    @if($edit == true)
    {!! form_row($form->id_orangtua, ['attr' => ['disabled' => true]]) !!}
    {!! form_row($form->nama_orangtua_text, ['attr' => ['disabled' => true]]) !!}
    {!! form_row($form->no_telp, ['attr' => ['disabled' => true]]) !!}
    {!! form_row($form->Submit, ['label' => 'Update Data']) !!}
    @else
    {!! form_end($form, $renderRest = true) !!}
    @endif
@endsection
