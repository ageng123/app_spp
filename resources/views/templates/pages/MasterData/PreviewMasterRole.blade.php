@extends('templates.TemplateMasterData')
@section('app-title', 'Master Jabatan')
@section('table-title')
    @if($form_title)
        {{$form_title}}
    @else
        {{'Add Master Data Jabatan'}}
    @endif
@endsection
@section('table')
@if(session('message'))
<script>UIkit.notification({message: '{{session("message")}}', pos: 'top-right',  status: 'danger'});</script>
@endif
   <table class="uk-table uk-table-striped" width="100" cellpadding="10">
    <tr>
        <td colspan="2"><h2>Data Jabatan</h2></td>
    </tr>
    <tr>
        <td style="width: 50%">Parent</td>
        <td>{{ $data->Parent->jabatan_text }}</td>
    </tr>
     <tr>
         <td style="width: 50%">Jabatan</td>
         <td>{{ $data->jabatan_text }}</td>
     </tr>
</table>
@endsection
