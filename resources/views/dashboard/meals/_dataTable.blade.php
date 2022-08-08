
<script type="text/javascript">
    $(function () {

        globalThis.table = $('#table_id').DataTable({
            serverSide: true,
            ajax: "{{ route('meal.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'price', name: 'price'},
                {data: 'active', name: 'active'},
                {data: 'action', name: 'action'},

            ]
        });

    });
</script>