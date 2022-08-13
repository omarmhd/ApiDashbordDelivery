@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box grey-cascade">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>إدارة السائقين
                    </div>

                </div>
                <div class="portlet-body">

                    <table class="table table-striped table-bordered table-hover" id="table_id">
                        <thead>
                        <tr>

                            <th>#</th>
                            <th>
                              الاسم
                            </th>
                            <th>
                                رقم الهاتف
                            </th>
                            <th>
                                الايميل
                            </th>
                            <th>
                                الملاحظات

                            </th>
                            <th>
                                الاتاحة

                            </th>
                            <th> الاجراءات</th>


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
    @include('dashboard.users.drivers._dataTable')
    @include('part.sweetDelete',['route'=>route('user.destroy',['user'=>':id'])])
@endpush
