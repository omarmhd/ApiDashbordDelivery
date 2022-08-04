@extends('layouts.app')
@section('content')



<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-equalizer font-red-sunglo"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase">إضافة مطعم جديد</span>
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
                <form action="{{route('restaurant.store')}}" method="post" class="form-horizontal"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <h3 class="form-section">المعلومات الأساسية</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">الاسم</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="" value="{{old('name',$restaurant->name)}}" name="name">

                                    </div>
                                </div>
                            </div>
                            <!--/span-->

                            <div class="col-md-6">
                                <div class="form-group has-error">
                                    <label class="control-label col-md-3">العنوان </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="" value="{{old('address',$restaurant->address)}}" name="address">

                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">رفم الجوال</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="" value="{{old('phone',$restaurant->phone)}}"  name="phone">


                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">الحالة</label>
                                    <div class="col-md-9">
                                        <select name="active" id="" class="form-control">
                                            <option {{old('active',$restaurant->active)=="1"?"selected":""}} value="1">فعال</option>
                                            <option {{old('active',$restaurant->active)=="0"?"selected":""}} value="0">متوقف</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">وقت التسليم</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{old('delivery_time',$restaurant->delivery_time)}}" name="delivery_time" placeholder="" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">التقيم</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{old('review',$restaurant->review)}}" name="review" placeholder="" >


                                    </div>


                                </div>

                            </div>
                            <!--/span-->
                            <div class="col-md-6">

                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">الوصف</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="description" value="{{old('description',$restaurant->description)}}" placeholder="" >

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-3">الصورة البازرة</label>
                                    <div class="col-md-9">
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">#2</label>
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
                            </div>

                            <!--/span-->

                            <!--/span-->
                        </div>




                        <!--/row-->
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">حفظ</button>
                                        <button type="button" class="btn default">إلغاء</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>

@endsection