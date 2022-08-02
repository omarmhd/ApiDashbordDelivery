

@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>رسالة </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form class="form-horizontal" role="form">
                        <div class="form-body">
                                    <h2 class="margin-bottom-20">تفاصيل الرسالة</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">اسم الأول:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$message->user->name}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">اسم العائلة :</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$message->user->last_name}} </p>

                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">البريد الإلكتروني :</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static">  {{$message->user->email}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> رقم الجوال:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$message->user->email}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Category:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> Category1 </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Membership:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> Free </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <h3 class="form-section">Address</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Address:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> #24 Sun Park Avenue, Rolton Str </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">City:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> New York </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">State:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> New York </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Post Code:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> 457890 </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Country:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> USA </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                        </div>
        </div>
    </div>

@endsection
