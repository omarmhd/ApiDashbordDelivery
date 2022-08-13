
<script type="text/javascript">
    $(function () {

        globalThis.table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('driver.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'first_name', name: 'first_name'},
                {data: 'phone', name: 'email'},
                {data: 'email', name: 'email'},
                {data: 'notes', name: 'notes'},
                {data: 'available', name: 'available'},
                {data: 'action'},

            ]
        });

    });
</script>