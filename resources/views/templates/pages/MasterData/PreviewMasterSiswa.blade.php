@extends('templates.TemplateMasterData')
@section('app-title', 'Master Mahasiswa')
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
   <table class="uk-table uk-table-striped" width="100" cellpadding="10">
       <tr>
           <td colspan="2"><h2>Data Siswa</h2></td>
       </tr>
        <tr>
            <td style="width: 50%">NISN Siswa</td>
            <td>{{ $data->nisn }}</td>
       </tr>
       <tr>
            <td>Nama Siswa</td>
            <td>{{ $data->nama_siswa_text }}</td>
        </tr>
        <tr>
            <td>Tempat / Tanggal Lahir Siswa</td>
            <td>{{ $data->tpt_lahir.', '.$data->tgl_lahir }}</td>
        </tr>
        <tr>
            <td>Alamat Siswa</td>
            <td>{{ $data->alamat }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin Siswa</td>
            <td>{{ $data->jk = 'L' ? 'Laki - Laki' : 'Perempuan' }}</td>
        </tr>
        <tr>
            <td>Kelas & Jurusan Siswa</td>
            <td>{{ $data->Kelas->kelas_text.' - '.$data->Jurusan->jurusan_text }}</td>
        </tr>
        <tr>
            <td>Tempat / Tanggal Lahir Siswa</td>
            <td>{{ $data->tpt_lahir.', '.$data->tgl_lahir }}</td>
        </tr>
   </table>
   <table class="uk-table uk-table-striped" width="100" cellpadding="10">
    <tr>
        <td colspan="2"><h2>Data Orang Tua</h2></td>
    </tr>
     <tr>
         <td style="width: 50%">NIK</td>
         <td>{{ $data->id_orangtua }}</td>
     </tr>
     <tr>
         <td>Nama</td>
         <td>{{ $data->nama_orangtua_text }}</td>
     </tr>
     <tr>
         <td>No Telp</td>
         <td>{{ $data->no_telp }}</td>
     </tr>
</table>
@endsection
