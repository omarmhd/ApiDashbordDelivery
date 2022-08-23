<script type="text/javascript">
    $(function() {

        globalThis.table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('coupon.index') }}",
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
