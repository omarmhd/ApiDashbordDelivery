<div class="form-body">
    <h3 class="form-section">البيانات الأساسية</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">المطعم</label>
                <div class="col-md-9">
                    <select class="js-example-placeholder-single js-states form-control" name="restaurant_id">
                        @foreach ($restaurants as $restaurant)
                            <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                        @endforeach


                    </select>
                </div>
            </div>
        </div>
        <!--/span-->
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">اسم الوجبة </label>
                <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="" value="{{ old('name', $meal->name) }}"
                        name="name">

                </div>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">السعر</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" placeholder="" name="price" min="1"
                        value="{{ old('price', $restaurant->price) }}">

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
            <div class="form-group">
                <label class="control-label col-md-3">وقت التسليم</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="delivery_time"
                        value="{{ old('delivery_time', $restaurant->delivery_time) }}" placeholder="">
                </div>
            </div>
        </div>
        <!--/span-->
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">التقيم</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="review"
                        value="{{ old('review', $restaurant->review) }}" placeholder="">


                </div>


            </div>


        </div>

        <!--/span-->
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">الوصف</label>
                <div class="col-md-9">
                    <textarea name="description" class="form-control" id="" cols="30" rows="5">
                {{ old('description', $restaurant->description) }}
                    </textarea>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">إضافات الوجبة</label>
                <div class="col-md-9">
                    <select class="js-example-tags form-control" name="extras[]" multiple data-role="tagsinput">

                        @foreach ($extras as $extra)
                            <option value="{{ $extra }}" selected></option>
                        @endforeach

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
                            @if (array_key_exists(1, $images))
                                <img src="{{ asset('images') . '/' . $images[1] }}" alt="">
                            @endif

                        </div>
                        <div>
                            <span class="btn red btn-outline btn-file">
                                <span class="fileinput-new"> اختيار صورة </span>
                                <span class="fileinput-exists"> تغير </span>
                                <input type="file" name="image[1]"> </span>
                            <a href=""
                                class="btn red {{ array_key_exists('1', $images) ? '' : 'fileinput-exists' }}"
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
                            @if (array_key_exists('2', $images))
                                <img src="{{ asset('images') . '/' . $images[2] }}" alt="">
                            @endif

                        </div>
                        <div>
                            <span class="btn red btn-outline btn-file">
                                <span class="fileinput-new">اختيار صورة </span>
                                <span class="fileinput-exists"> تغير الصورة </span>
                                <input type="file" name="image[2]"> </span>
                            <a href="{{ array_key_exists('2', $images) ? route('attachment.destroy', ['image' => $images['2']]) : 'javascript:;' }}"
                                class="btn red {{ array_key_exists('2', $images) ? '' : 'fileinput-exists' }} "> حذف
                            </a>
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

                            @if (array_key_exists(3, $images))
                                <img src="{{ asset('images') . '/' . $images[3] }}" alt="">
                            @endif

                        </div>
                        <div>
                            <span class="btn red btn-outline btn-file">
                                <span class="fileinput-new"> اختيار الصورة </span>
                                <span class="{{ array_key_exists('3', $images) ? '' : 'fileinput-exists' }}"> تغير
                                </span>
                                <input type="file" name="image[3]"> </span>
                            <a href="javascript:;"
                                class="btn red {{ array_key_exists('3', $images) ? '' : 'fileinput-exists' }}"
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
                            @if (array_key_exists(4, $images))
                                <img src="{{ asset('images') . '/' . $images[4] }}" alt="">
                            @endif

                        </div>
                        <div>
                            <span class="btn red btn-outline btn-file">
                                <span class="fileinput-new"> اختيار صورة </span>
                                <span class="fileinput-exists"> تغير </span>
                                <input type="file" name="image[4]"> </span>
                            <a href="javascript:;"
                                class="btn red {{ array_key_exists('4', $images) ? '' : 'fileinput-exists' }}"
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
            <div class="form-group">
                <label class="control-label col-md-3">أصناف الخبز</label>
                <div class="col-md-6">


                </div>


            </div>
            @php $bread_name=old('bread_name'); @endphp
            <div class="box-bread display-hide">

                @if ($bread_name)

                    @foreach ($bread_name as $key => $value)
                        <div class="form-group  display-hide">
                            <label class="control-label col-md-3"></label>

                            <div class="col-md-3">
                                <input type="text" class="form-control" name="bread_name[]"
                                    value="{{ old('bread_name')[$key] }}"placeholder="نوع الخبز">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" multiple name="bread_price[]"
                                    value="{{ old('bread_price')[$key] }}" placeholder="السعر">

                            </div>
                            <div class="col-md-1 {{ $key == 0 ? '' : 'display-hide' }}">
                                <button type="button" class="btn btn-primary btn-add"><i
                                        class="fa fa-plus"></i></button>
                            </div>
                            <div class="col-md-1  {{ $key !== 0 ? '' : 'display-hide' }}">
                                <button type="button" onclick="" class="btn btn-danger btn-remove"><i
                                        class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="form-group px-10  bread-box">
                        <label class="control-label col-md-3"></label>

                        <div class="col-md-3">
                            <input type="text" class="form-control" name="bread_name[]" placeholder="نوع الخبز">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" multiple name="bread_price[]" value=""
                                placeholder="السعر">


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
                            value="{{ old('image') }}" placeholder="السعر">


                    </div>

                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-remove"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">أصناف الحلويات</label>
                <div class="col-md-6">
                    <div class="radio-list">
                        <label class="radio-inline">
                            <input type="checkbox" name="exSweet" value="yes"> يوجد </label>

                    </div>
                </div>


            </div>
            @php $arr=old('sweet_name'); @endphp
            <div class="box-bread  display-hide box-sweet ">
                @if ($arr)

                    @foreach ($arr as $key => $value)
                        <div class="form-group ">
                            <label class="control-label col-md-3"></label>

                            <div class="col-md-3">
                                <input type="text" class="form-control" name="sweet_name[]"
                                    value="{{ old('sweet_name')[$key] }}"placeholder="نوع الحلويات">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" multiple name="sweet_price[]"
                                    value="{{ old('sweet_price')[$key] }}" placeholder="السعر">


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
                    <div class="form-group px-10 ">
                        <label class="control-label col-md-3"></label>

                        <div class="col-md-3">
                            <input type="text" class="form-control" name="sweet_name[]"
                                placeholder="نوع الحلويات">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" multiple name="sweet_price[]"
                                placeholder="السعر">


                        </div>
                        <div class="col-md-1">
                            <button type="button" type="button" class="btn btn-primary btn-add"><i
                                    class="fa fa-plus"></i></button>
                        </div>

                    </div>
                @endif
                <div class="form-group group-duplicate " style="display: none">
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
                        <button type="button" class="btn btn-danger btn-remove"><i class="fa fa-trash"></i></button>
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
