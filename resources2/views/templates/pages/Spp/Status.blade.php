@extends('templates.TemplateMasterData')
@section('app-title', 'Status SPP')
@section('table-title', 'Status SPP')
@section('table')
@if(session('message'))
<script>UIkit.notification({message: '{{session("message")}}', pos: 'top-right',  status: 'success'});</script>
@endif
<div class="uk-overflow-auto">
    <table id="table" class="uk-table uk-table-hover uk-table-striped">
            <thead>
                  <tr>  
                    <td>No.</td>
                    <td>Periode</td>
                    <td>Tahun Ajaran</td>
                    <td>Nama Siswa</td>
                    <td>Tanggal Submit</td>
                    <td>Status</td>
                    {{-- <td class="uk-text-center" style="width: 20%">Action</td> --}}
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
                    <td>{{$value->Status->status_text}}</td>
                    {{-- <td class="uk-text-center">
                       <div class="uk-button-group">
                       <a href="{{ route('Semua.show', ['Semua' => $value->id]) }}" class="uk-button uk-button-secondary uk-button-small" title="preview" uk-tooltip><span uk-icon="icon: file-text"></span></a>
                        </div>
                       
                    </td> --}}
                  </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection
