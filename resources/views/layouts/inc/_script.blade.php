<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]-->
<script src="{{ asset('assets') }}/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('assets') }}/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('assets') }}/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="{{ asset('assets') }}/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
    type="text/javascript"></script>
<script src="{{ asset('assets') }}/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript">
</script>
<script src="{{ asset('assets') }}/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{ asset('assets') }}/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript">
</script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets') }}/pages/scripts/form-samples.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('assets') }}/global/scripts/datatable.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="{{ asset('assets') }}/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="{{ asset('assets') }}/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
    type="text/javascript"></script>
<script src="{{ asset('assets') }}/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets') }}/global/scripts/app.min.js" type="text/javascript"></script>

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('assets') }}/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="{{ asset('assets') }}/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="{{ asset('assets') }}/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {

        $('.btn-add').click(function(e) {
            e.preventDefault();
            // Create clone of <div class='input-form'>

            var newel = $(this).parent().parent().siblings('.group-duplicate').clone();
            newel.show()
            newel.find('div').children("input").prop("disabled", false);
            newel.removeClass('group-duplicate')


            // Add after last <div class='input-form'>
            $(newel).insertAfter($(this).parent().parent());

        });

        $(document).on("click", ".btn-remove", function(e) {

            e.preventDefault();

            $(this).parent().parent().remove()
            // Create clone of <div class='input-form'>

        });

        $(document).on("click", "input[name=exBread]", function() {
            var $this = $(this);
            if ($(this).is(":checked")) {
                $('.box-bread').fadeIn()
                $('.box-bread-child').find('input').removeAttr("disabled");

            } else {
                $('.box-bread').fadeOut()
                $('.box-bread-child').find('input').prop("disabled", true);

            }
        });
        $(document).on("click", "input[name=exSweet]", function() {
            var $this = $(this);
            if ($(this).is(":checked")) {
                $('.box-sweet-child').find('input').removeAttr("disabled");

                $('.box-sweet').fadeIn()
            } else {
                $('.box-sweet').fadeOut()
                $('.box-sweet-child').find('input').prop("disabled", true);

            }
        });
    });
</script>
