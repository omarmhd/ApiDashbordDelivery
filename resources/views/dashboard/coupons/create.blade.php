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
                    <form action="{{ route('coupon.store') }}" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">الكود</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder=""
                                                value="{{ old('code') }}" name="code">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group @error('ammount') has-error @enderror">
                                        <label class="control-label col-md-3">الكمية</label>
                                        <div class="col-md-9">
                                            <input type="number" min="1" class="form-control" placeholder=""
                                                value="{{ old('ammount') }}" name="ammount">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">يبدأ العمل في</label>
                                        <div class="col-md-9">
                                            <input type="datetime-local" class="form-control" placeholder=""
                                                value="{{ old('start_avilable_at') }}" name="start_avilable_at">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">ينتهي عمله في</label>
                                        <div class="col-md-9">
                                            <input type="datetime-local" class="form-control" placeholder=""
                                                value="{{ old('end_avilable_at') }}" name="end_avilable_at">
                                        </div>
                                    </div>
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
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>

@endsection
