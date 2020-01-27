@extends('templates.TemplateMasterData')
@section('app-title', 'Master Jurusan')
@section('table-title')
    @if($form_title)
        {{$form_title}}
    @else
        {{'Add Master Data Jurusan'}}
    @endif
@endsection
@section('table')
@if(session('message'))
<script>UIkit.notification({message: '{{session("message")}}', pos: 'top-right',  status: 'danger'});</script>
@endif
   <table class="uk-table uk-table-striped" width="100" cellpadding="10">
    <tr>
        <td colspan="2"><h2>Data Jurusan</h2></td>
    </tr>
     <tr>
         <td style="width: 50%">Jurusan</td>
         <td>{{ $data->jurusan_text }}</td>
     </tr>
</table>
@endsection
