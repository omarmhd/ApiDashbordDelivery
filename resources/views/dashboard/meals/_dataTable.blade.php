
<script type="text/javascript">
    $(function () {

        var table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('meal.index') }}",
            columns: [

                {data: 'name', name: 'name'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action'},

            ]
        });

    });
</script>