    <!-- include common vendor scripts used in demo pages -->
    <script src="{{asset('backend2')}}/vendors/jquery/dist/jquery.js"></script>
    <script src="{{asset('backend2')}}/vendors/popper.js/dist/umd/popper.js"></script>
    <script src="{{asset('backend2')}}/vendors/bootstrap/dist/js/bootstrap.js"></script>
    @stack('vendor-scripts')
    <!-- include ace.js -->
    <script src="{{asset('backend2')}}/dist/js/ace.js"></script>
    <script src="{{asset('backend2')}}/script_translate.js"></script>
    @stack('page-scripts')
