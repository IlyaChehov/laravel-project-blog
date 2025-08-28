@include('frontend.layouts.components.head')

<body>
<div id="wrapper">

    @include('frontend.layouts.components.header')

    @yield('content')

    @include('frontend.layouts.components.footer')

    <div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->

<!-- Core JavaScript
================================================== -->
<script src="js/jquery.min.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>

</body>
</html>