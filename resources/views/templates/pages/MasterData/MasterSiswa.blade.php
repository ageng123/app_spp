@extends('templates.TemplateMasterData')
@section('app-title', 'Master Mahasiswa')
@section('table-title', 'Master Data Mahasiswa')
@section('table')
@if(session('message'))
<script>UIkit.notification({message: '{{session("message")}}', pos: 'top-right',  status: 'success'});</script>
@endif
<div class="uk-overflow-auto">
    <table id="table" class="uk-table uk-table-hover uk-table-striped">
        <a href="{{ route('siswa.create') }}" class="uk-button uk-button-primary uk-button-small">Tambah Data</a>
            <thead>
                  <tr>  
                    <td>No. Urut</td>
                    <td>No. Induk</td>
                    <td>Nama</td>
                    <td>Tempat / Tanggal Lahir</td>
                    <td>Alamat</td>
                    <td>Kelas - Jurusan</td>
                    <td class="uk-text-center">Action</td>
                  </tr>
            </thead>
            <tbody>
                @foreach($row as $rows => $value)
                <tr>  
                <td>{{ $rows + 1 }}</td>
                    <td>{{$value->nisn}}</td>
                    <td>{{$value->nama_siswa_text}}</td>
                    <td>{{$value->tpt_lahir}} / {{$value->tgl_lahir}}</td>
                    <td>{{$value->alamat}}</td>
                    <td>{{$value->Kelas['kelas_text']}} - {{$value->Jurusan['jurusan_text']}}</td>
                    <td class="uk-text-center">
                       <div class="uk-button-group">
                       <a href="{{ route('siswa.show', ['siswa' => $value->id]) }}" class="uk-button uk-button-secondary uk-button-small" title="preview" uk-tooltip><span uk-icon="icon: file-text"></span></a>
                            <a href="{{ route('siswa.edit', ['siswa' => $value->id]) }}" class="uk-button uk-button-primary uk-button-small" title="edit" uk-tooltip> <span uk-icon="icon: file-edit"></span></a>
                            <form action="{{route('siswa.destroy', ['siswa' => $value->id])}}" method="POST">
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

