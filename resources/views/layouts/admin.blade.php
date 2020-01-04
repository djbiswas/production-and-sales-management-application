<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.css"/>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
<div>
<div class="wrapper">

    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3> <a href="/">{{ config('app.name', 'Laravel') }} </a></h3>
        </div>

        <ul class="list-unstyled components">
            <p><a href="/">DASHBOARD</a></p>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Purchases</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="/materialPurchases">All Purchase</a>
                    </li>
                    <li>
                        <a href="/materialPurchases/create">New Purchase</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="#currencySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Currency Convert</a>
                <ul class="collapse list-unstyled" id="currencySubmenu">
                    <li>
                        <a href="/currencies">List Of Currencies</a>
                    </li>
                    <li>
                        <a href="/currencies/create">Add New Currency</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#saleSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Sales</a>
                <ul class="collapse list-unstyled" id="saleSubmenu">
                    <li>
                        <a href="#">All Sales</a>
                    </li>
                    <li>
                        <a href="#">New Sales</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#supplierSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Suppliers</a>
                <ul class="collapse list-unstyled" id="supplierSubmenu">
                    <li>
                        <a href="/suppliers">All Suppliers</a>
                    </li>
                    <li>
                        <a href="/suppliers/create">New Suppliers</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#customerSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Customers</a>
                <ul class="collapse list-unstyled" id="customerSubmenu">
                    <li>
                        <a href="/customers">All Customers</a>
                    </li>
                    <li>
                        <a href="/customers/create">New Customer</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#reportSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Reports</a>
                <ul class="collapse list-unstyled" id="reportSubmenu">
                    <li>
                        <a href="/materialPurchases">Purchase</a>
                    </li>
                    <li>
                        <a href="/customers">Customers</a>
                    </li>
                    <li>
                        <a href="/suppliers">Suppliers</a>
                    </li>

                </ul>
            </li>

            <li class="">
                <a href="#">Products</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a class="download dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
{{--                <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Log Out</a>--}}
            </li>
            <li>
                <a href="/" class="article">Back to Admin</a>
            </li>
        </ul>
    </nav>


    <!-- Page Content  -->
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    {{-- <span>Toggle Sidebar</span>--}}
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">

                        <li class="nav-item active">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">Page</a>--}}
{{--                        </li>--}}

                    </ul>
                </div>
            </div>
        </nav>

        <div id="content-main">

            @include('flash::message')
            @yield('content')

        </div>


    </div>
</div>


<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

{{--bootstrap JS--}}
<script src="{{ asset('js/admin.js') }}" ></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.js"></script>



    <script type="text/javascript">
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <script>

        $(document).ready(function() {
            $('.select2_op').select2();
        });

    </script>

    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>

    @yield('scripts')
</body>

</html>
