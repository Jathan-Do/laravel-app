@include('admin.includes.header')   
<body class=" layout-fluid">
    <script src="{{ asset('./dist/js/demo-theme.min.js?1692870487') }}"></script>
    <div class="page">
        <!-- Sidebar -->
        @include('admin.includes.sidebar')
        <div class="page-wrapper">
            @yield('content')
        </div>
    </div>
@include('admin.includes.footer')   