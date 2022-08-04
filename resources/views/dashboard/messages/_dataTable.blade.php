<script type="text/javascript">
    $(function() {

        var table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('message.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},


                {data: 'user_name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},

                {data: 'time', name: 'time'},
                {data: 'content', name: 'content'},
                {data: 'attachment', name: 'attachment'},
                {data: 'action', name: 'action'},
            ]
        });

    });
</script>
