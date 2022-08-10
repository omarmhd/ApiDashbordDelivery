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
                    <form action="{{ route('order.update', $order->id) }}" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <h3 class="form-section">الحقول الأساسية</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">وقت الوصول</label>
                                        <div class="col-md-9">
                                            <input type="datetime-local" class="form-control" placeholder=""
                                                value="{{ old('time_of_receipt', $order->time_of_receipt) }}"
                                                name="time_of_receipt">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">السعر الكلي</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder=""
                                                value="{{ old('total_price', $order->total_price) }}" name="total_price">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">السائقين</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="driver_id">
                                                <option value="" disabled>اختر سائق</option>
                                                @foreach ($users as $driver)
                                                    <option
                                                        {{ old('driver_id', $driver->id) == $order->driver_id ? 'selected' : '' }}
                                                        value="{{ $driver->id }}">{{ $driver->first_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">حالة الطلب</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="status">
                                                <option
                                                    {{ old('status', $order->status) == 'NOT_GET_YET' ? 'selected' : '' }}
                                                    value="NOT_GET_YET">لم يتم الحصول عليه بعد</option>
                                                <option {{ old('status', $order->status) == 'GET_ORDER' ? 'selected' : '' }}
                                                    value="GET_ORDER">تم الحصول على الطلب</option>
                                                <option {{ old('status', $order->status) == 'IN_WAY' ? 'selected' : '' }}
                                                    value="IN_WAY">الطلب في الطريق</option>
                                                <option
                                                    {{ old('status', $order->status) == 'IN_LOCATION' ? 'selected' : '' }}
                                                    value="IN_LOCATION">الطلب وصل المكان</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">الوقت المطلوب للوصول</label>
                                        <div class="col-md-9">
                                            <input type="datetime-local" class="form-control" placeholder=""
                                                value="{{ old('time_of_receipt', $order->time_of_receipt) }}"
                                                name="time_of_receipt">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">وقت الوصول</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder=""
                                                value="{{ old('delivery_time', $order->delivery_time) }}"
                                                name="delivery_time">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">وقت الوصول الكلي</label>
                                        <div class="col-md-9">
                                            <input type="datetime-local" class="form-control" placeholder=""
                                                value="{{ old('total_arrive_time', $order->total_arrive_time) }}"
                                                name="total_arrive_time">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">طريقة الدفع</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="payment_way">
                                                <option
                                                    {{ old('payment_way', $order->payment_way) == 'VISA' ? 'selected' : '' }}
                                                    value="VISA">فيزا</option>
                                                <option
                                                    {{ old('payment_way', $order->payment_way) == 'MASTER' ? 'selected' : '' }}
                                                    value="MASTER">ماستر كارد</option>
                                                <option
                                                    {{ old('payment_way', $order->payment_way) == 'BY_HAND' ? 'selected' : '' }}
                                                    value="BY_HAND">باليد</option>
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
                                        <label class="control-label col-md-3">الملاحظات</label>
                                        <div class="col-md-9">
                                            <textarea name="notes" class="form-control" id="" cols="30" rows="10">{{ old('notes', $order->notes) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">التقييم</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder=""
                                                value="{{ old('rate', $order->rate) }}" name="rate">
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
