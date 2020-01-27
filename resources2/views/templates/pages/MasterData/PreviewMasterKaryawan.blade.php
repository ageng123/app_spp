@extends('templates.TemplateMasterData')
@section('app-title', 'Master Karyawan')
@section('table-title')
    @if($form_title)
        {{$form_title}}
    @else
        {{'Add Master Data Karyawan'}}
    @endif
@endsection
@section('table')
@if(session('message'))
<script>UIkit.notification({message: '{{session("message")}}', pos: 'top-right',  status: 'danger'});</script>
@endif
   <table class="uk-table uk-table-striped" width="100" cellpadding="10">
    <tr>
        <td colspan="2"><h2>Data Karyawan</h2></td>
    </tr>
    <tr>
        <td style="width: 50%">NIK</td>
        <td>{{ $data->nik }}</td>
    </tr>
    <tr>
        <td style="width: 50%">Nama</td>
        <td>{{ $data->nama_karyawan_text }}</td>
    </tr>
     <tr>
         <td style="width: 50%">Jabatan</td>
         <td>{{ $data->jabatan }}</td>
     </tr>
     <tr>
        <td style="width: 50%">Tempat - Tanggal Lahir</td>
        <td>{{ $data->tpt_lahir.' - '.$data->tgl_lahir }}</td>
    </tr>
    <tr>
        <td style="width: 50%">Jenis Kelamin</td>
        <td>{{ $data->jk = 'L' ? 'Laki - Laki ' : 'Perempuan' }}</td>
    </tr>
    <tr>
        <td style="width: 50%">Alamat</td>
        <td>{{ $data->alamat }}</td>
    </tr>
    <tr>
        <td style="width: 50%">Nomor Telepon</td>
        <td>{{ $data->no_telp }}</td>
    </tr>
</table>
@endsection
