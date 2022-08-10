<script type="text/javascript">
    $(function() {

        globalThis.table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('settings.index') }}",
            columns: [
                // {
                //     data: 'id',
                //     name: 'id'
                // },
                {
                    data: 'option',
                    name: 'option'
                },
                {
                    data: 'value',
                    name: 'value'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]
        });

    });
</script>
