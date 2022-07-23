<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]-->
<script src="{{asset('assets')}}/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{asset('assets')}}/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>

<script src="{{asset('assets')}}/pages/scripts/components-select2.min.js" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('assets')}}/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="{{asset('assets')}}/admin/pages/scripts/table-managed.js"></script>
<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features
        TableManaged.init();


    });
</script>