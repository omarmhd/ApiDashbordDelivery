
<script type="text/javascript">
    $(function () {

        globalThis.table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('user.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},

                {data: 'first_name', name: 'first_name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'phone', name: 'phone'},
                {data: 'gender', name: 'gender'},
                {data: 'email', name: 'email'},
                {data: 'action'},

            ]
        });

    });
</script>