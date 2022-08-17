@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>إدارة المستخدمين
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a id="sample_editable_1_new" href="{{ route('user.create') }}" class="btn green">
                                        مستخدم جديد <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="table_id">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                {{-- <th>اسم العائلة</th> --}}
                                <th>الصلاحية</th>
                                <th>رقم الهاتف</th>
                                <th>الجنس</th>
                                <th>البريد الإلكتروني</th>
                                <th>الإعدادات</th>
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
    @include('dashboard.users._dataTable')
    @include('part.sweetDelete', ['route' => route('user.destroy', ['user' => ':id'])])
@endpush
