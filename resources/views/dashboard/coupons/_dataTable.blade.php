<script type="text/javascript">
    $(function() {

        var table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('coupon.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'code',
                    name: 'code'
                },
                {
                    data: 'ammount',
                    name: 'ammount'
                },
                {
                    data: 'uses',
                    name: 'uses'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'is_selected',
                    name: 'is_selected'
                },
                {
                    data: 'start_avilable_at',
                    name: 'start_avilable_at'
                },
                {
                    data: 'end_avilable_at',
                    name: 'end_avilable_at'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]
        });

    });
</script>
