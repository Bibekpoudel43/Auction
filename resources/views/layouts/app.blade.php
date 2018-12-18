@include('inc.header')
<body>
    <div id="app">
        @include('inc.navbar')
            <main class="">
                <div class="container-fluid">
                @yield('content')
                </div>
            </main>
       @include('inc.footer')
    </div>
</body>
</html>
