<script type="text/javascript">
    $(function() {

        var table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('order.all') }}",
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
                    // data: 'زر عرض الوجبات',
                    name: 'زر عرض الوجبات'
                },
            ]
        });

    });
</script>
