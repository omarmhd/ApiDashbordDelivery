
<script type="text/javascript">
    $(function () {

        globalThis.table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('restaurant.index') }}",

        });

    });
</script>