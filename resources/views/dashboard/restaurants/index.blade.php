@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> إدارة المطاعم</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a id="sample_editable_1_new" href="{{ route('restaurant.create') }}"
                                        class="btn sbold green"> إضافة مطعم
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column"
                        id="table_id">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> الاسم </th>
                                <th> الهاتف </th>
                                <th> الحالة </th>
                                <th> التقييم </th>
                                <th> العنوان </th>
                                <th> الإعدادات </th>
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
    @include('dashboard.restaurants._dataTable')
@endpush
