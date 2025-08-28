@include('frontend.layouts.components.head')

<body>
<div id="wrapper">

    @include('frontend.layouts.components.header')

    <main>
        <section class="section lb m3rem">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        @yield('content')
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        @include('frontend.layouts.components.sidebar')
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
    </main>

    @include('frontend.layouts.components.footer')

    <div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->

<!-- Core JavaScript
================================================== -->
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/tether.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/animate.js') }}"></script>
<script src="{{ asset('assets/frontend/js/custom.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>

</body>
</html>