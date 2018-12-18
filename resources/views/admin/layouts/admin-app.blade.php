@include('admin.inc.header')
<body>
@include('admin.inc.preloader')
    <div id="main-wrapper">
    @include('admin.inc.topnav')
        @include('admin.inc.sidenav')
            <div class="page-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
       @include('admin.inc.footer')
    </div>
</body>
</html>
