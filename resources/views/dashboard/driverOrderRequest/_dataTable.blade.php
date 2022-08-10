<script type="text/javascript">
    $(function() {

        var table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('order.select_driver.index', $order_id) }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'order_id',
                    name: 'order_id'
                },
                {
                    data: 'driver_id',
                    name: 'driver_id'
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ]
        });

    });
</script>
