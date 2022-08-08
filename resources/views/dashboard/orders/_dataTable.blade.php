<script type="text/javascript">
    $(function() {

        globalThis.table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('order.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'total_price',
                    name: 'total_price'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'total_arrive_time',
                    name: 'total_arrive_time'
                },
                {
                    data: 'payment_way',
                    name: 'payment_way'
                },
                {
                    data: 'show_meal_details',
                    name: 'show_meal_details'
                },
            ]
        });

    });
</script>
