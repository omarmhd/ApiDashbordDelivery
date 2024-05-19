@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer"></i>
                        <span class="caption-subject bold uppercase">إضافة {{ $public_content['singular_name'] }} جديد</span>
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
                    <form action="{{ route('slider.update', $slider->id) }}" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @error('name') has-error @enderror">
                                        <label class="control-label col-md-3">الكود</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder=""
                                                value="{{ old('name', $slider->name) }}" name="name">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group @error('order_index') has-error @enderror">
                                        <label class="control-label col-md-3">الترتيب</label>
                                        <div class="col-md-9">
                                            <input type="number" min="1" class="form-control" placeholder=""
                                                value="{{ old('order_index', $slider->order_index) }}" name="order_index">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @error('status') has-error @enderror">
                                        <label class="control-label col-md-3">هل السلايدر فعال؟</label>
                                        <div class="col-md-9">
                                            <div class="mt-radio-inline">
                                                <label class="mt-radio">
                                                    <input type="radio" name="status" value="1" checked> نعم
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="status" value="0"
                                                        {{ old('status', $slider->status) == 0 ? 'checked' : '' }}> لا
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">الصورة </label>
                                        <div class="col-md-9">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                                    style="width: 200px; height: 150px;">
                                                    <img src="{{ $image }}" alt="">
                                                </div>
                                                <div>
                                                    <span class="btn red btn-outline btn-file">
                                                        <span class="fileinput-new"> اختر الصورة </span>
                                                        <span class="fileinput-exists"> Change </span>
                                                        <input type="file" name="image"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists"
                                                        data-dismiss="fileinput"> Remove
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
@push('js')
    <script>
        $(function() {
            $('input[name=is_selected]').on('click init-post-format', function() {
                $('#users_list').toggle($('#show-is-selected').prop('checked'));
            }).trigger('init-post-format');
        });
    </script>
@endpush
