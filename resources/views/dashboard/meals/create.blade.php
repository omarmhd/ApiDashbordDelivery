@extends('layouts.app')
@push('css')
    <script type="text/javascript" src="{{ asset('assets') }}/global/plugins/bootstrap-fileinput.css"></script>
@endpush
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <form action="{{ route('meal.store') }}" method="post"class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <h3 class="form-section">البيانات الأساسية</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @error('restaurant_id') has-error @enderror">
                                        <label class="control-label col-md-3">المطعم</label>
                                        <div class="col-md-9">
                                            <select class="js-example-placeholder-single js-states form-control"
                                                name="restaurant_id">
                                                <option value="">اختر مطعم</option>
                                                @foreach ($restaurants as $restaurant)
                                                    <option value="{{ $restaurant->id }}"
                                                        {{ old('restaurant_id') == $restaurant->id ? 'selected' : '' }}>
                                                        {{ $restaurant->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group @error('name') has-error @enderror">
                                        <label class="control-label col-md-3">اسم الوجبة </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder=""
                                                value="{{ old('name') }}" name="name">

                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @error('price') has-error @enderror">
                                        <label class="control-label col-md-3">السعر</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" placeholder="" name="price"
                                                value="{{ old('price') }}">


                                        </div>
                                    </div>
                                </div>
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
                                    <div class="form-group @error('delivery_time') has-error @enderror">
                                        <label class="control-label col-md-3">وقت التسليم</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="delivery_time"
                                                value="{{ old('delivery_time') }}" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group @error('review') has-error @enderror">
                                        <label class="control-label col-md-3">التقييم</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="review"
                                                value="{{ old('review') }}" placeholder="">

                                        </div>

                                    </div>

                                </div>

                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @error('name') has-error @enderror">
                                        <label class="control-label col-md-3">الوصف</label>
                                        <div class="col-md-9">
                                            <textarea name="description" class="form-control" id="" cols="30" rows="5">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @error('extras') has-error @enderror">
                                        <label class="control-label col-md-3">إضافات الوجبة</label>
                                        <div class="col-md-9">
                                            <select class="js-example-tags form-control" name="extras[]" multiple
                                                data-role="tagsinput">
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <!--/span-->

                                <!--/span-->
                            </div>
                            <h3 class="form-section">صور الوجبة</h3>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">#1</label>
                                        <div class="col-md-9">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                                    style="width: 200px; height: 150px;">


                                                </div>
                                                <div>
                                                    <span class="btn red btn-outline btn-file">
                                                        <span class="fileinput-new"> اختيار صورة </span>
                                                        <span class="fileinput-exists"> تغير </span>
                                                        <input type="file" name="image[1]"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists"
                                                        data-dismiss="fileinput"> حذف </a>
                                                </div>
                                            </div>

                                        </div>



                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">#2</label>
                                        <div class="col-md-9">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                                    style="width: 200px; height: 150px;">


                                                </div>
                                                <div>
                                                    <span class="btn red btn-outline btn-file">
                                                        <span class="fileinput-new">اختيار صورة </span>
                                                        <span class="fileinput-exists"> تغير الصورة </span>
                                                        <input type="file" name="image[2]"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists"
                                                        data-dismiss="fileinput"> حذف </a>
                                                </div>
                                            </div>

                                        </div>



                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">#3</label>
                                        <div class="col-md-9">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                                    style="width: 200px; height: 150px;">

                                                </div>
                                                <div>
                                                    <span class="btn red btn-outline btn-file">
                                                        <span class="fileinput-new"> اختيار الصورة </span>
                                                        <span class="fileinput-exists"> تغير </span>
                                                        <input type="file" name="image[3]"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists"
                                                        data-dismiss="fileinput"> حذف </a>
                                                </div>
                                            </div>

                                        </div>



                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">#4</label>
                                        <div class="col-md-9">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                                    style="width: 200px; height: 150px;">


                                                </div>
                                                <div>
                                                    <span class="btn red btn-outline btn-file">
                                                        <span class="fileinput-new"> اختيار صورة </span>
                                                        <span class="fileinput-exists"> تغير </span>
                                                        <input type="file" name="image[4]"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists"
                                                        data-dismiss="fileinput"> حذف </a>
                                                </div>
                                            </div>

                                        </div>



                                    </div>
                                </div>


                            </div>
                            <h3 class="form-section">الموارد الاخرى</h3>
                            <!--/row-->
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group @error('exBread') has-error @enderror">
                                        <label class="control-label col-md-3">أصناف الخبز</label>
                                        <div class="col-md-6">

                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="checkbox" {{ old('exBread') == 'yes' ? 'checked' : '' }}
                                                        name="exBread" value="yes"> يوجد </label>
                                            </div>
                                        </div>


                                    </div>
                                    @php $breads=old('bread_name'); @endphp
                                    <div class="box-bread  {{ $breads ? '' : 'display-hide' }}">

                                        @if ($breads)
                                            @foreach ($breads as $key => $value)
                                                <div class="form-group box-bread-child">
                                                    <label class="control-label col-md-3"></label>

                                                    <div class="col-md-3 @error('bread_name.' . $key) has-error @enderror">
                                                        <input type="text" class="form-control" name="bread_name[]"
                                                            value="{{ old('bread_name')[$key] }}"placeholder="نوع الخبز">
                                                    </div>
                                                    <div
                                                        class="col-md-3 @error('bread_price.' . $key) has-error @enderror">
                                                        <input type="text" class="form-control" multiple
                                                            name="bread_price[]" value="{{ old('bread_price')[$key] }}"
                                                            placeholder="السعر">

                                                    </div>
                                                    <div class="col-md-1 {{ $key == 0 ? '' : 'display-hide' }}">
                                                        <button type="button" class="btn btn-primary btn-add"><i
                                                                class="fa fa-plus"></i></button>
                                                    </div>
                                                    <div class="col-md-1  {{ $key !== 0 ? '' : 'display-hide' }}">
                                                        <button type="button" onclick=""
                                                            class="btn btn-danger btn-remove"><i
                                                                class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="form-group px-10 box-bread-child">
                                                <label class="control-label col-md-3"></label>

                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" disabled
                                                        name="bread_name[]" placeholder="نوع الخبز">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" disabled multiple
                                                        name="bread_price[]" value="" placeholder="السعر">


                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button" class="btn btn-primary btn-add"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>

                                            </div>
                                        @endif

                                        <div class="form-group group-duplicate   display-hide">
                                            <label class="control-label col-md-3"></label>
                                            <div class="col-md-3">

                                                <input type="text" class="form-control" disabled name="bread_name[]"
                                                    placeholder="نوع الخبز">

                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" disabled name="bread_price[]"
                                                    placeholder="السعر">


                                            </div>

                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-danger btn-remove"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @error('exSweet') has-error @enderror">
                                        <label class="control-label col-md-3">أصناف الحلويات</label>
                                        <div class="col-md-6">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="checkbox" {{ old('exSweet') == 'yes' ? 'checked' : '' }}
                                                        name="exSweet" value="yes"> يوجد </label>

                                            </div>
                                        </div>

                                    </div>
                                    @php $sweets=old('sweet_name'); @endphp
                                    <div class="{{ $sweets ? '' : 'display-hide' }} box-sweet">
                                        @if ($sweets)
                                            @foreach ($sweets as $key => $value)
                                                <div class="form-group box-sweet-child">
                                                    <label class="control-label col-md-3"></label>
                                                    <div
                                                        class="col-md-3 @error('sweet_name.' . $key) has-error @enderror ">
                                                        <input type="text" class="form-control" name="sweet_name[]"
                                                            value="{{ old('sweet_name')[$key] }}"
                                                            placeholder="نوع الحلويات">
                                                    </div>
                                                    <div
                                                        class="col-md-3 @error('sweet_price.' . $key) has-error @enderror">
                                                        <input type="text" class="form-control" multiple
                                                            name="sweet_price[]" value="{{ old('sweet_price')[$key] }}"
                                                            placeholder="السعر">

                                                    </div>
                                                    <div class="col-md-1  {{ $key == 0 ? '' : 'display-hide' }}">
                                                        <button type="button" class="btn btn-primary btn-add"><i
                                                                class="fa fa-plus"></i></button>
                                                    </div>
                                                    <div class="col-md-1  {{ $key !== 0 ? '' : 'display-hide' }}">
                                                        <button type="button" class="btn btn-danger btn-remove"><i
                                                                class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="form-group px-10 box-sweet-child">
                                                <label class="control-label col-md-3"></label>

                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" disabled
                                                        name="sweet_name[]" placeholder="نوع الحلويات">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" disabled
                                                        name="sweet_price[]" placeholder="السعر">

                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button" type="button"
                                                        class="btn btn-primary btn-add"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>

                                            </div>
                                        @endif

                                        <div class="form-group group-duplicate display-hide">
                                            <label class="control-label col-md-3"></label>
                                            <div class="col-md-3">

                                                <input type="text" class="form-control" disabled name="sweet_name[]"
                                                    placeholder="نوع الحلويات">

                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" disabled name="sweet_price[]"
                                                    placeholder="السعر">

                                            </div>

                                            <div class="col-md-1">
                                                <button type="check" class="btn btn-danger btn-remove"><i
                                                        class="fa fa-trash"></i></button>
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
                                                <button type="submit" class="btn green">حفظ</button>
                                                <button type="button" class="btn default">إلغاء</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>

                        </div>
                    </form>

                    <!-- END FORM-->

                </div>
            </div>

            <!-- END FORM-->

        </div>

    @endsection
