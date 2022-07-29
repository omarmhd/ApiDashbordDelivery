
<script type="text/javascript">
    $(function () {

        var table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('restaurant.index') }}",

        });

    });
</script>