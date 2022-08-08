
<script type="text/javascript">
    $(function () {

        globalThis.table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('user.index') }}",
            columns: [
                {data: 'name', name: 'name'},
                {data: 'last_name', name: 'last_name'},
                {data: 'phone', name: 'phone'},
                {data: 'gender', name: 'gender'},
                {data: 'email', name: 'email'},
                {data: 'action'},

            ]
        });

    });
</script>