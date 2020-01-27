@extends('templates.TemplateMasterData')
@section('app-title', 'Master Password')
@section('table-title', 'Master Data Password')
@section('table')
@if(session('message'))
<script>UIkit.notification({message: '{{session("message")}}', pos: 'top-right',  status: 'success'});</script>
@endif
<div class="uk-overflow-auto">
    <table id="table" class="uk-table uk-table-hover uk-table-striped">
            <thead>
                  <tr>  
                    <td>Username</td>
                    <td>Nama User</td>
                    <td>Jabatan User</td>
                    <td class="uk-text-center" style="width: 20%">Action</td>
                  </tr>
            </thead>
            <tbody>
                @foreach($row as $rows => $value)
                <tr>  
                    <td>{{$value->username}}</td>
                    <td>
                        @if($value->Detail->nik != null)
                            {{$value->Detail->Karyawan->nama_karyawan_text }}
                        @elseif($value->Detail->nisn != null and $value->Detail->role == 1)
                        {{$value->Detail->Siswa->nama_siswa_text}}
                        @elseif($value->Detail->id_orangtua != null and $value->Detail->role ==2)
                        {{$value->Detail->OT->nama_orangtua_text}}
                        @endif
                    </td>
                    <td>
                        {{$value->Detail->Role->jabatan_text}}
                    </td>
                    <td class="uk-text-center">
                       <div class="uk-button-group">
                            <a href="{{ route('mp.edit', ['mp' => $value->id]) }}" class="uk-button uk-button-primary uk-button-small" title="edit" uk-tooltip> <span uk-icon="icon: file-edit"></span></a>
                            <form action="{{route('mp.destroy', ['mp' => $value->id])}}" method="POST">
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
