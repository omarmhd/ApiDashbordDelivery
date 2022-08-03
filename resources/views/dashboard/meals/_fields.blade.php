<div class="form-body">
    <h3 class="form-section">البيانات الأساسية</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">المطعم</label>
                <div class="col-md-9">
                    <select class="js-example-placeholder-single js-states form-control" name="restaurant_id">
                        <option>1</option>
                        <option>0</option>

                    </select>
                </div>
            </div>
        </div>
        <!--/span-->
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">اسم الوجبة </label>
                <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="" value="" name="name">

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
                    <input type="number" class="form-control" placeholder="" value="" name="price">


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
                    <input type="text" class="form-control" value="{{old('delivery_time')}}" name="delivery_time" placeholder="" >
                </div>
            </div>
        </div>
        <!--/span-->
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">التقيم</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" value="{{old('review')}}" name="review" placeholder="" >


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
                    <textarea name="description" class="form-control"  id="" cols="30" rows="5"></textarea>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">إضافات الوجبة</label>
                <div class="col-md-9">
                    <select class="js-example-tags form-control" name="extras[]"   multiple data-role="tagsinput">

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
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                        <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="image[1]"> </span>
                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
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
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                        <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="image[2]"> </span>
                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
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
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                        <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="image[3]"> </span>
                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
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
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                        <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="image[4]"> </span>
                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
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
                    <div class="radio-list">
                        <label class="radio-inline">
                            <input type="checkbox" name="optionsRadios2" value="option1"> نعم </label>

                    </div>
                </div>


            </div>
            <div class="form-group group-duplicate">
                <div class="col-md-3">

                    <input type="text" class="form-control" name="bread_name[]" placeholder="نوع الخبز"   >

                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control"  multiple name="bread_price[]" value="{{old('image')}}" placeholder="السعر" >


                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary btn-add"><i class="fa fa-plus"></i></button>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-danger btn-remove"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">أصناف الحلويات</label>
                <div class="col-md-6">
                    <div class="radio-list">
                        <label class="radio-inline">
                            <input type="checkbox" name="optionsRadios2" value="option1"> نعم </label>

                    </div>
                </div>


            </div>
            <div class="form-group group-duplicate">
                <div class="col-md-3">
                    <input type="text" class="form-control" name="sweet_name[]" placeholder="نوع الحلويات"   >
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control"  multiple name="sweet_price[]" value="{{old('image')}}" placeholder="السعر" >


                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary btn-add"><i class="fa fa-plus"></i></button>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-danger btn-remove"><i class="fa fa-trash"></i></button>
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