<script type="text/javascript">
    $(function() {

        globalThis.table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('message.index') }}",
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


                {data: 'user_name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},

                {data: 'time', name: 'time'},
                {data: 'content', name: 'content'},
                {data: 'attachment', name: 'attachment'},
                {data: 'action', name: 'action'},
            ]
        });

    });
</script>
