<div class="form-body">
    <h3 class="form-section"> معلومات الإضاف</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3"> الاسم</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="" value="{{ old('first_name', $extra->name) }}"
                        name="name">

                </div>
            </div>
        </div>
        <!--/span-->
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">السعر</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" placeholder="" value="{{ old('price', $extra->price) }}"
                        name="price">

                </div>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">الصورة </label>
                <div class="col-md-9">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                            style="width: 200px; height: 150px;">
                        </div>
                        <div>
                            <span class="btn red btn-outline btn-file">
                                <span class="fileinput-new"> اختر الصورة </span>
                                <span class="fileinput-exists"> Change </span>
                                <input type="file" name="image"> </span>
                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--/span-->
        <div class="col-md-6">

        </div>
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
