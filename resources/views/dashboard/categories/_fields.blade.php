<div class="form-body">
    <h3 class="form-section"> التصنيف </h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3"> اسم التصنيف</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="" value="{{ old('name', $category->name) }}"
                        name="name">

                </div>
            </div>
        </div>
        <!--/span-->

        <!--/span-->
    </div>
    <!--/row-->


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
