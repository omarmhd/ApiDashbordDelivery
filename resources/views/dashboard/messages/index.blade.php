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

                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column"
                        id="table_id">
                        <thead>
                        <tr>
                            <th>#</th>

                            <th> اسم المرسل</th>
                            <th>البريد الإلكتروني</th>
                            <th> رقم الجوال </th>

                            <th> وقت الارسال </th>
                            <th> الرسالة </th>
                            <th>المرفقات</th>
                            <th>الاجراءات</th>

                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection
@push('js')
    @include('dashboard.messages._dataTable')
    @include('part.sweetDelete',['route'=>route('message.destroy',['message'=>":id"])])




@endpush
