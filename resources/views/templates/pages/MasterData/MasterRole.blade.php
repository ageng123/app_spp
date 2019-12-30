@extends('templates.TemplateMasterData')
@section('app-title', 'Master Role')
@section('table-title', 'Master Data Role')
@section('table')
@if(session('message'))
<script>UIkit.notification({message: '{{session("message")}}', pos: 'top-right',  status: 'success'});</script>
@endif
<div class="uk-overflow-auto">
    <table id="table" class="uk-table uk-table-hover uk-table-striped">
        <a href="{{ route('role.create') }}" class="uk-button uk-button-primary uk-button-small">Tambah Data</a>
            <thead>
                  <tr>  
                    <td>Parent Jabatan</td>
                    <td>Jabatan</td>
                    <td class="uk-text-center" style="width: 20%">Action</td>
                  </tr>
            </thead>
            <tbody>
                @foreach($row as $rows => $value)
                <tr>  
                    <td>{{$value->parent ? $value->Parent->jabatan_text : ''}}</td>
                    <td>{{$value->jabatan_text}}</td>
                    <td class="uk-text-center">
                       <div class="uk-button-group">
                       <a href="{{ route('role.show', ['role' => $value->id]) }}" class="uk-button uk-button-secondary uk-button-small" title="preview" uk-tooltip><span uk-icon="icon: file-text"></span></a>
                            <a href="{{ route('role.edit', ['role' => $value->id]) }}" class="uk-button uk-button-primary uk-button-small" title="edit" uk-tooltip> <span uk-icon="icon: file-edit"></span></a>
                            <form action="{{route('role.destroy', ['role' => $value->id])}}" method="POST">
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

