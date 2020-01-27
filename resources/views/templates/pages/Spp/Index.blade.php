@extends('templates.TemplateMasterData')
@section('app-title', 'SPP')
@section('table-title', 'List Data SPP')
@section('table')
@if(session('message'))
<script>UIkit.notification({message: '{{session("message")}}', pos: 'top-right',  status: 'success'});</script>
@endif
<div class="uk-overflow-auto">
    @if(Session::get('role') == 2)
    <a href="{{route('Semua.print')}}" class="uk-button uk-button-danger"> print data SPP </a>
    @else
    <a href="{{route('Semua.print')}}" class="uk-button uk-button-danger"> print data SPP Siswa</a>
    @endif
    <table id="table" class="uk-table uk-table-hover uk-table-striped">
            <thead>
                  <tr>  
                    <td>No.</td>
                    <td>Periode</td>
                    <td>Tahun Ajaran</td>
                    <td>Nama Siswa</td>
                    <td>Tanggal Submit</td>
                    <td>Semester</td>
                    <td>Status</td>
                    <td class="uk-text-center" style="width: 20%">Action</td>
                  </tr>
            </thead>
            <tbody>
                @foreach($row as $rows => $value)
                <tr>  
                    <td>{{$rows + 1}}</td>
                    <td>{{$value->periode}}</td>
                    <td>{{$value->tahun_ajaran}}</td>
                    <td>{{$value->siswa->nama_siswa_text}}</td>
                    <td>{{date('d F Y', strtotime($value->tgl_submit))}}</td>
                    <td>{{$value->semester ? $value->semester : 'Data Semester Tidak Ditemukan'}}</td>
                    <td>{{$value->Status->status_text}}</td>
                    <td class="uk-text-center">
                       <div class="uk-button-group">
                        @if($value->Status->id != 3)    
                       <a href="{{ route('Semua.show', ['Semua' => $value->id]) }}" class="uk-button uk-button-secondary uk-button-small" title="preview" uk-tooltip><span uk-icon="icon: file-text"></span></a>
                        @else    
                        <a href="{{ route('Semua.edit', ['Semua' => $value->id]) }}" class="uk-button uk-button-primary uk-button-small" title="edit" uk-tooltip> <span uk-icon="icon: file-edit"></span></a>
                            <form action="{{route('Semua.destroy', ['Semua' => $value->id])}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="uk-button uk-button-danger uk-button-small"><span uk-icon="icon: trash"></span></button>
                            </form>
                        @endif
                        </div>
                       
                    </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection
