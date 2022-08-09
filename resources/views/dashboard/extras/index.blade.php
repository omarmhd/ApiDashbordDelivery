@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>إدارة الإضافات
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a id="sample_editable_1_new" href="{{route('extra.create')}}" class="btn green">
                                       إضافة  جديد <i class="fa fa-plus"></i>
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
                            <th>الصورة</th>
                            <th>
                              الاسم
                            </th>

                            <th>
                                السعر
                            </th>


                            <th>


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
    @include('dashboard.extras._dataTable')
    @include('part.sweetDelete',['route'=>route('extra.destroy',['extra'=>':id'])])
@endpush
