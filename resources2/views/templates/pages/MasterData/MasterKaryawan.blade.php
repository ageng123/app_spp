@extends('templates.TemplateMasterData')
@section('app-title', 'Master Karyawan')
@section('table-title', 'Master Data Karyawan')
@section('table')
@if(session('message'))
<script>UIkit.notification({message: '{{session("message")}}', pos: 'top-right',  status: 'success'});</script>
@endif
<div class="uk-overflow-auto">
    <table id="table" class="uk-table uk-table-hover uk-table-striped">
        <a href="{{ route('karyawan.create') }}" class="uk-button uk-button-primary uk-button-small">Tambah Data</a>
            <thead>
                  <tr>  
                    <td>No. Urut</td>
                    <td>No. Induk Kepegawaian</td>
                    <td>Jabatan</td>
                    <td>Nama</td>
                    <td>Tempat / Tanggal Lahir</td>
                    <td>Alamat</td>
                    <td>Nomor Telpon</td>
                    <td class="uk-text-center">Action</td>
                  </tr>
            </thead>
            <tbody>
                @foreach($row as $rows => $value)
                <tr>  
                <td>{{ $rows + 1 }}</td>
                    <td>{{$value->nik}}</td>
                    <td>{{$value->Detail->Role->jabatan_text}}</td>
                    <td>{{$value->nama_karyawan_text}}</td>
                    <td>{{$value->tpt_lahir}} / {{$value->tgl_lahir}}</td>
                    <td>{{$value->alamat}}</td>
                    <td>{{$value->no_telp}}</td>
                    <td class="uk-text-center">
                       <div class="uk-button-group">
                       <a href="{{ route('karyawan.show', ['karyawan' => $value->id]) }}" class="uk-button uk-button-secondary uk-button-small" title="preview" uk-tooltip><span uk-icon="icon: file-text"></span></a>
                            <a href="{{ route('karyawan.edit', ['karyawan' => $value->id]) }}" class="uk-button uk-button-primary uk-button-small" title="edit" uk-tooltip> <span uk-icon="icon: file-edit"></span></a>
                            <form action="{{route('karyawan.destroy', ['karyawan' => $value->id])}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="uk-button uk-button-danger uk-button-small"><span uk-icon="icon: trash"></span></button>
                            </form>
                        </div>
                       
                    </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection