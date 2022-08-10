@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer"></i>
                        <span class="caption-subject bold uppercase">إعدادات النظام</span>
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
                    <form action="{{ route('settings.update') }}" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <h3 class="form-section">الحقول الأساسية</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group @error('conditions') has-error @enderror">
                                        <label class="control-label col-md-1">الشروط</label>
                                        <div class="col-md-11">
                                            <textarea name="conditions" cols="100" rows="10">{{ old('conditions', $settings->conditions) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group @error('terms') has-error @enderror">
                                        <label class="control-label col-md-1">الأحكام</label>
                                        <div class="col-md-11">
                                            <textarea name="terms" cols="100" rows="10">{{ old('terms', $settings->terms) }}</textarea>
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
