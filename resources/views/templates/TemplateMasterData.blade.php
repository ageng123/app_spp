@extends('templates.TemplateDashboard')
@section('app-title', 'Dashboard Home')
@section('stylesheet')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.uikit.min.css">
@endsection
@section('body')
<div class="uk-card uk-card-default uk-width-1-1@m">
    <div class="uk-card-header uk-background-primary" >
        <div class="uk-grid-small uk-flex-middle" uk-grid>
            <div class="uk-width-expand">
                <h3 class="uk-card-title uk-margin-remove-bottom" style="color: white !important">@yield('table-title')</h3>
            </div>
        </div>
    </div>
    <div class="uk-card-body">
        @yield('table')
    </div>
</div>
@endsection
@section('javascript')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#table').DataTable({
                "bLengthChange" : false,
                "pageLength": 20,
                language: {
                    searchPlaceholder: "Pencarian @yield('table-title')",
                    searchLabel: false
                },
                "oLanguage": {
                    "sSearch": " _INPUT_" //search
                }
            });
            $('#table_filter input').addClass('uk-input');
            $('#table_filter label').addClass('hidden');
        });
    </script>
@endsection