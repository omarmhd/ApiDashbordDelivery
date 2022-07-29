@extends('layouts.app')
@push('css')
    <script type="text/javascript" src="{{asset('assets')}}/global/plugins/bootstrap-fileinput.css"></script>
 @endpush
@section('content')



<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-equalizer font-red-sunglo"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">إضافة مقترحة</span>
                </div>

            </div>
            <div class="alert alert-danger">
                <ul>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach

                    @endif
                </ul>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->

                <form action="{{route('extra.store')}}" method="post" class="form-horizontal"   enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <h3 class="form-section">البيانات الأساسية</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">اسم الاضافة</label>
                                    <div class="col-md-9">

                                        <input type="text" class="form-control" placeholder="" value="" name="name">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">السعر</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" placeholder="" value="" name="price">


                                    </div>
                                </div>
                            </div>
                            <!--/span-->

                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">

                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">الحالة</label>
                                    <div class="col-md-9">
                                        <select name="active" id="" class="form-control">
                                            <option value="1">فعال</option>
                                            <option value="0">متوقف</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!--/span-->
                        </div>
                        <!--/row-->



                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label col-md-3">صورة الإضافة</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                                            <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="image"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>

                                    </div>



                                </div>
                            </div>


                        </div>


                        <!--/row-->
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">Submit</button>
                                        <button type="button" class="btn default">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> </div>
                        </div>
                    </div>
                </form>



                <!-- END FORM-->

        </div>
    </div>
</div>

@endsection


