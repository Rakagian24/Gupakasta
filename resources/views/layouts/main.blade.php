<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gupakasta | Dinas Perumahan dan Kawasan Pemukiman Kota Bandung</title>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/dpkp.png') }}" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend.css?v=1.0.0') }}">
</head>

<body>

    @include('partials.navbar')

    <div class="wrapper">
        @yield('wrapper')
    </div>

    {{-- <footer class="iq-footer">
        <div class="container-fluid">
            <!-- Breadcrumbs -->
            {{-- {{ Breadcrumbs::render() }} --}}

    <div class="row">
        <div class="col-lg-6">
            <ul class="list-inline mb-0">
                <li class="list-inline-item"><a href="../backend/privacy-policy.html">Privacy Policy</a></li>
                <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terms of Use</a></li>
            </ul>
        </div>
        <div class="col-lg-6 text-right">
            <span class="mr-1">
                Copyright
                <script>
                    document.write(new Date().getFullYear())
                </script>© <a href="#" class="">Datum</a>
                All Rights Reserved.
            </span>
        </div>
    </div>
    </div>
    </footer> <!-- Backend Bundle JavaScript --> --}}
    <script src="{{ asset('js/backend-bundle.min.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('js/customizer.js') }}"></script>

    <script src="{{ asset('js/sidebar.js') }}"></script>

    <!-- Flextree Javascript-->
    <script src="{{ asset('js/flex-tree.min.js') }}"></script>
    <script src="{{ asset('js/tree.js') }}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('js/table-treeview.js') }}"></script>

    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('js/sweetalert.js') }}"></script>

    <!-- Vectoe Map JavaScript -->
    <script src="{{ asset('js/vector-map-custom.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('js/chart-custom.js') }}"></script>
    <script src="{{ asset('js/charts/01.js') }}"></script>
    <script src="{{ asset('js/charts/02.js') }}"></script>

    <!-- slider JavaScript -->
    <script src="{{ asset('js/slider.js') }}"></script>

    <!-- Emoji picker -->
    <script src="{{ asset('vendor/emoji-picker-element/index.js') }}" type="module"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- jQuery  GOBLOK-->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <!-- app JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
</body>

</html>
