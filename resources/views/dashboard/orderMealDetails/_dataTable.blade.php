<script type="text/javascript">
    $(function() {

        globalThis.table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('order.meal_details.index', $order_id) }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'order_id',
                    name: 'order_id'
                },
                {
                    data: 'meal_id',
                    name: 'meal_id'
                },
                {
                    data: 'number_of_meals',
                    name: 'number_of_meals'
                },
                {
                    data: 'extras',
                    name: 'extras'
                },
                {
                    data: 'total_price',
                    name: 'total_price'
                },
            ]
        });

    });
</script>
