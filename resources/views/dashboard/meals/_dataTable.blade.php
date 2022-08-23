
<script type="text/javascript">
    $(function () {

        globalThis.table = $('#table_id').DataTable({
            serverSide: true,
            ajax: "{{ route('meal.index') }}",
            language: {
                "lengthMenu": "عرض _MENU_ صف في الصفحة",
                "zeroRecords": "لم يتم إيجاد شيء",
                "info": "عرض صفحة _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد أي بيانات متاحة",
                "infoFiltered": "(تصفية من _MAX_ العدد الكلي للصفوف)",
                "sSearch": "البحث:"

            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'price', name: 'price'},
                {data: 'active', name: 'active'},
                {data: 'action', name: 'action'},

            ]
        });

    });
</script>
