<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WasteWise | @yield('page_title', '')</title>
    {{-- Responsive --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="/vendor/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    {{-- DataTables --}}
    <link rel="stylesheet" href="/vendor/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    {{-- AdminLTE Theme --}}
    <link rel="stylesheet" href="/vendor/AdminLTE/dist/css/adminlte.min.css">
    {{-- select2 --}}
    <link rel="stylesheet" href="/vendor/AdminLTE/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/vendor/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('page_css')
    <style type="text/css">
        .card-derel {
            min-height: 455px;
        }

        .card-footer {
            background-color: #FFF;
        }

        td {
            padding: .5rem !important;
        }

        th.dt-body-center,
        td.dt-body-center {
            text-align: center;
        }
    </style>
</head>

<body class="dark-mode sidebar-mini layout-navbar-fixed layout-footer-fixed control-sidebar-slide-open layout-fixed">
    <div class="wrapper">

        {{-- Navbar --}}
        <nav class="main-header navbar navbar-expand navbar-dark" style="background-color: #0047BB;">
            @include('layouts.navbar')
        </nav>

        {{-- Sidebar --}}
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="/" class="brand-link">
                <img src="/images/seal_laguna.png" alt="PGL Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">WasteWise</span>
            </a>
            <div class="sidebar">
                @include('layouts.sidebar')
            </div>
        </aside>

        {{-- Content Wrapper --}}
        <div class="content-wrapper">
            {{-- Content Header --}}
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4>@yield('page_title', '')</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">
                                    {{ $page['crumb'] ?? 'Dashboard' }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Main content --}}
            <section class="content">
                @yield('content')
            </section>
        </div>

        {{-- Footer --}}
        @include('layouts.footer')

    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <script src="/vendor/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/AdminLTE/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/vendor/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="/vendor/AdminLTE/dist/js/adminlte.min.js"></script>
    <script src="/vendor/AdminLTE/dist/js/demo.js"></script>
    <script src="/vendor/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
    <script src="/vendor/AdminLTE/plugins/moment/moment.min.js"></script>
    <script src="/js/jquery.mask.min.js"></script>
    <script src="/js/app.js"></script>

    <script>
        $(function() {
            $('.select2').select2({
                theme: 'bootstrap4',
                dropdownAutoWidth: true,
                width: '100%',
                placeholder: "Select..",
            });

            $('.select2-withTag').select2({
                theme: 'bootstrap4',
                dropdownAutoWidth: true,
                width: '100%',
                allowClear: true,
                placeholder: "Type here..",
                tags: true
            });
        });
    </script>
    @yield('page_script')
</body>

</html>
