@extends('templates.TemplateDashboard')
@section('app-title', 'Dashboard')
@section('body')
<div class="uk-alert-primary" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p style="font-size: 20px">Selamat Datang Di Aplikasi SPP STIKOM CKI</p>
</div>
<div uk-grid>
    <div class="uk-width-1-3@xl uk-width-1-2@m uk-width-1-1@sm">
        <div class="uk-card uk-card-primary ">
            <div class="uk-card-header">
                <h4>Jumlah Siswa</h4>
            </div>
            <div class="uk-card-body">
                <h1 class="uk-text-right">{{$siswa}}</h1>
            </div>
        </div>
    </div>
    <div class="uk-width-1-3@xl uk-width-1-2@m uk-width-1-1@sm">
        <div class="uk-card uk-card-primary ">
            <div class="uk-card-header">
                <h4>Jumlah Karyawan</h4>
            </div>
            <div class="uk-card-body">
                <h1 class="uk-text-right">{{$karyawan}}</h1>
            </div>
        </div>
    </div>
    <div class="uk-width-1-3@xl uk-width-1-2@m uk-width-1-1@sm">
        <div class="uk-card uk-card-primary ">
            <div class="uk-card-header">
                <h4>Jumlah Pemasukan Semester Ini</h4>
            </div>
            <div class="uk-card-body">
                <h1 class="uk-text-right currency"></h1>
            </div>
        </div>
    </div>
    <div class="uk-width-1-1@xl uk-width-1-1@m uk-width-1-1@sm">
        <div class="uk-card uk-card-primary ">
            <div class="uk-card-header">
                <h4>Grafik Pemasukan per Tahun</h4>
            </div>
            <div class="uk-card-body">
                <h1 class="uk-text-right"></h1>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        let curr = {{$total_semester}};
        console.log(curr.toLocaleString('id', {style: 'currency', currency: 'IDR'}));
        $('.currency').text(curr.toLocaleString('id', {style: 'currency', currency: 'IDR'}));
        // $('.currency').text('test');
    })
</script>  
@endsection