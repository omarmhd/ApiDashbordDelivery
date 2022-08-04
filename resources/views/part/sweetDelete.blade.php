<script>
    $(document).on('click','.delete',function (e){

        e.preventDefault();

        var id=$(this).data('id')
        var url="{{$route}}";
        url=url.replace(':id',id)

        Swal.fire({
            title: 'هل أنت متأكد?',
            text: "أنت ستقوم بحذف هذا الصف !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم, أريد الحذف!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN':"{{ csrf_token() }}"
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: {
                        id: $(this).val(), // < note use of 'this' here

                    },
                    success: function(result) {
                        if(result.status=="success"){

                        Swal.fire(
                            'تم الحذف!',
                            'تم حذف هذا الصف.',
                            'success'
                        )}
                    },
                    error: function(result) {
                        alert('error');
                    }
                });

            }
        })




    })
</script>