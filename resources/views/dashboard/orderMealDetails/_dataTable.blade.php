<script type="text/javascript">
    $(function() {

        globalThis.table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('order.meal_details.index', $order_id) }}",
            language: {
                "lengthMenu": "عرض _MENU_ صف في الصفحة",
                "zeroRecords": "لم يتم إيجاد شيء",
                "info": "عرض صفحة _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد أي بيانات متاحة",
                "infoFiltered": "(تصفية من _MAX_ العدد الكلي للصفوف)",
                "sSearch": "البحث:"

            },
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
                    data: 'meal_extras',
                    name: 'meal_extras'
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
