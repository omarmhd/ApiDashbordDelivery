@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">
                                    <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-print"></i> Print </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="table_id">
                        <thead>
                        <tr>

                            <th> اسم الزبون</th>
                            <th>البريد الإلكتروني</th>
                            <th> رقم الجوال </th>
                            <th> الرسالة </th>
                            <th> وقت الارسال </th>
                            <th>المرفق</th>
                            <th>الاجراءات</th>


                        </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

@endsection
@push('js')
    @include('dashboard.messages._dataTable')

    <script>
        $('#showMessage').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var attachment =  button.data('attachment')
            var content =  button.data('content')
            var time =  button.data('time')
            var send_name=button.data('send-name')



            $('.attachment').prop('src',attachment)
            $('.content').text(content)
            $('.time').text(time)
            $('.send_name').text(send_name)


        });

    </script>
@endpush
