<!doctype html>
@include('admin.layouts.top')

<body>

    <!-- Left Panel -->

    @include('admin.layouts.nav')

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('admin.layouts.header')
        <!-- Header-->

        @yield('content')
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    @include('admin.layouts.bottom')
</body>

</html>
