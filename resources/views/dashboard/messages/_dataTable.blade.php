<script type="text/javascript">
    $(function() {

        var table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('message.index') }}",
            columns: [{
                    data: 'user_name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'content',
                    name: 'content'
                },
                {
                    data: 'time',
                    name: 'time'
                },
                {
                    data: 'attachment',
                    name: 'attachment'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]
        });

    });
</script>
