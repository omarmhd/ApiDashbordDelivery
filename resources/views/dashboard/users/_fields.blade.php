<div class="form-body">
    <h3 class="form-section">الحقول الأساسية</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">الاسم</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="" value="{{old('name',$user->name)}}" name="name">

                </div>
            </div>
        </div>
        <!--/span-->
        <div class="col-md-6">
            <div class="form-group has-error">
                <label class="control-label col-md-3">اسم العائلة </label>
                <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="" value="{{old('last_name',$user->last_name)}}" name="last_name">

                </div>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">الجنس</label>
                <div class="col-md-9">
                    <select class="form-control" name="gender">
                        <option {{old('gender',$user->gender)=="ذكر"?"selected":""}} value="ذكر"> ذكر</option>
                        <option {{old('gender',$user->gender)=="انثى"?"selected":""}}  value="انثى">انثى</option>
                    </select>

                </div>
            </div>
        </div>
        <!--/span-->
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">البريد الإلكتروني</label>
                <div class="col-md-9">
                    <input type="email" class="form-control" value="{{old('email',$user->email)}}" name="email" placeholder="">
                </div>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">كلمة المرور</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" value="{{old('password',$user->password)}}" name="password" placeholder="" >
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">الصلاحية</label>
                <div class="col-md-9">

                    <select name="role" id="" class="form-control">
                        <option value="" disabled  selected></option>

                        @foreach($roles as $role)

                            <option {{old('role')==$role->name?"selected":""}} value="{{$role->name}}">
                                {{$role->name}}

                            </option>
                        @endforeach


                    </select>

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
                <label class="control-label col-md-3">الصورة الشخصية</label>
                <div class="col-md-9">
                    <input type="file" class="form-control" name="avatar" value="{{old('avatar')}}" placeholder="" >

                </div>
            </div>
        </div>

        <!--/span-->
        <div class="col-md-6">

        </div>
        <!--/span-->
    </div>


    <h3 class="form-section">الحقول المخصصة</h3>
    <!--/row-->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">العنوان</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" value="{{old('address',$user->address)}}"  name="address">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label col-md-3">رقم الجوال</label>
                <div class="col-md-9">
                    <input type="number" class="form-control"  value="{{old('phone',$user->phone)}}" name="phone">
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
        <div class="col-md-6">
        </div>
    </div>
</div>