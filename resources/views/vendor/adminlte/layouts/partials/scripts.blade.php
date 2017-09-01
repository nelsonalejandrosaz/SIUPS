<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- jQuery 2.1.4 -->
<script  src="{{ asset('/plugins/jquery-2.2.3.min.js') }}"></script>
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
@yield('JSExtras')
