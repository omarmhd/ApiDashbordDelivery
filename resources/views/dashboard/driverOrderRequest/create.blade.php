@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer"></i>
                        <span class="caption-subject bold uppercase">إضافة مستخدم جديد</span>
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
                    <form action="{{ route('order.select_driver.store', $order_id) }}" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="order_id" style="display: none" value="{{ $order_id }}">
                        <div class="form-body">
                            <h3 class="form-section">الحقول الأساسية</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">السائقين</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="driver_id">
                                                <option value="" selected>اختر سائق</option>
                                                @foreach ($drivers as $driver)
                                                    <option {{ old('driver_id') == $driver->id ? 'selected' : '' }}
                                                        value="{{ $driver->id }}">{{ $driver->first_name }}
                                                    </option>
                                                @endforeach
                                            </select>
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
