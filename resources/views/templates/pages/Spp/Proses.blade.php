@extends('templates.TemplateMasterData')
@section('app-title', 'Data Spp')
@section('table-title')
    @if($form_title)
        {{$form_title}}
    @else
        {{'Add Master Data Kelas'}}
    @endif
@endsection
@section('table')
<table style="width: 100%" cellpadding="5" class="table table-striped">
    <h1>Data Siswa</h1>
    <tr>
        <td>Nama Siswa</td>
        <td>:</td>
        <td>{{$rows->Siswa->nama_siswa_text}}</td>
    </tr>
    <tr>
        <td>Bulan Bayar</td>
        <td>:</td>
        <td>{{ date('F', mktime(null,null,null,$rows->bulan)).' - '.$rows->periode }}</td>
    </tr>
    <tr>
        <td>Tahun Ajaran Siswa</td>
        <td>:</td>
        <td>{{$rows->tahun_ajaran}}</td>
    </tr>
    <tr>
        <td>Bayar</td>
        <td>:</td>
        <td>{{$rows->bayar}}</td>
    </tr>
    <tr>
        <td>Konseptor</td>
        <td>:</td>
        <td>{{$rows->Konseptor ? ($rows->Konseptor->nama_karyawan_text.' | '. $rows->JabatanKonseptor->jabatan_text) : $rows->JabatanKonseptor->jabatan_text}}</td>
    </tr>
</table>
{!! form_start($form) !!}
{!! form_end($form, $renderRest = true) !!}
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