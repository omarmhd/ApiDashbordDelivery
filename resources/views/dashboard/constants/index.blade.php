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
                <a href="{{ route('coupon.index') }}">{{ $public_content['name'] }}</a>
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
                    <div class="tools">
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a id="sample_editable_1_new" class="btn green" href="{{ route('constants.create',['key'=> request('key')]) }}">
                                     اضافة <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bcouponed table-hover" id="table_id">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>
                                        المنطقة
                                    </th>
                                    <th>
                                        الإعدادات
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
        @include('dashboard.constants._dataTable')
        @include('part.sweetDelete', ['route' => route('constants.destroy', ['constant' => ':id','key'=>request('key')])])
    @endpush
