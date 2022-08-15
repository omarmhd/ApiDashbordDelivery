@extends('layouts.app')
@section('content')
    <h3 class="page-title">
        {{ $public_content['name'] }} <small></small>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="{{ route('user.index') }}">الرئيسية</a>
                <i class="fa fa-angle-left"></i>
                <a href="{{ route('order.index') }}">{{ $public_content['name'] }}</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>إدارة {{ $public_content['name'] }}
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    {{-- <a id="sample_editable_1_new" class="btn green" href="{{ route('order.create') }}">
                                        {{ $public_content['singular_name'] }} جديد <i class="fa fa-plus"></i>
                                    </a> --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i
                                            class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;">
                                                Print </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                Save as PDF </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                Export to Excel </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="table_id">
                        <thead>
                            <tr>
                                <th>
                                    رقم الطلب
                                </th>
                                <th>
                                    السعر الكلي
                                </th>
                                <th>
                                    حالة الطلب
                                </th>
                                <th>
                                    وقت الاستلام
                                </th>
                                <th>
                                    طريقة الدفع
                                </th>
                                <th>
                                    السائق
                                </th>
                                <th>
                                    تفاصيل الوجبة
                                </th>
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
    @include('dashboard.orders._dataTable')
    @include('part.sweetDelete', ['route' => route('order.destroy', ['order' => ':id'])])

    {{-- <script>
        $('#showMessage').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var attachment = button.data('attachment')
            var content = button.data('content')
            var time = button.data('time')
            var send_name = button.data('send-name')

            $('.attachment').prop('src', attachment)
            $('.content').text(content)
            $('.time').text(time)
            $('.send_name').text(send_name)

        });
    </script> --}}
@endpush
