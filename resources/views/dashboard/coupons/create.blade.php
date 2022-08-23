@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/global/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}">
    @error('selected_users')
        <style>
            .select2-container--bootstrap.select2-container--focus .select2-selection,
            .select2-container--bootstrap.select2-container--open .select2-selection {
                border-color: #e73d4a !important;
            }

            .select2-container--bootstrap .select2-selection--multiple {
                border-color: #e73d4a;
            }
        </style>
    @enderror
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer"></i>
                        <span class="caption-subject bold uppercase">إضافة {{ $public_content['singular_name'] }}
                            جديد</span>
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
                                    <div class="form-group @error('code') has-error @enderror">
                                        <label class="control-label col-md-3">القسيمة الشرائية</label>
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
                            </div>
                            <!--/row-->
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group @error('is_selected') has-error @enderror">
                                        <label class="control-label col-md-3">نوع القسيمة</label>
                                        <div class="col-md-9">
                                            <div class="mt-radio-inline">
                                                <label class="mt-radio">
                                                    <input type="radio" name="is_selected" value="0"
                                                        {{ old('is_selected') == 0 ? 'checked' : '' }}> عام
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="is_selected" value="1"
                                                        id="show-is-selected"
                                                        {{ old('is_selected') == 1 ? 'checked' : '' }}> مخصص
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group @error('status') has-error @enderror">
                                        <label class="control-label col-md-3">هل الكوبون فعال؟</label>
                                        <div class="col-md-9">
                                            <div class="mt-radio-inline">
                                                <label class="mt-radio">
                                                    <input type="radio" name="status" value="0" checked> نعم
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="status" value="1"
                                                        {{ old('status') == 1 ? 'checked' : '' }}> لا
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('start_avilable_at') has-error @enderror">
                                    <label class="control-label col-md-3">يبدأ العمل في</label>
                                    <div class="col-md-9">
                                        <input type="datetime-local" class="form-control" placeholder=""
                                            value="{{ old('start_avilable_at') }}" name="start_avilable_at">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group @error('end_avilable_at') has-error @enderror">
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
                        <div id="users_list" style="display: none">
                            <h3 class="form-section">المستخدمين</h3>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-2 has-error" for="multiple">
                                            المستخدمين</label>
                                        <div class="col-md-10">
                                            <select id="multiple" class="form-control select2-multiple"
                                                name="selected_users[]" multiple>
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}"
                                                        @if (old('selected_users') != null) @foreach (old('selected_users') as $selected)
                                                        @if ($selected == $client->id) selected @endif
                                                        @endforeach
                                                @endif>
                                                {{ $client->first_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/apps/scripts/custom-components-select2.js') }}" type="text/javascript"></script>
    <script>
        $(function() {
            $('input[name=is_selected]').on('click init-post-format', function() {
                $('#users_list').toggle($('#show-is-selected').prop('checked'));
            }).trigger('init-post-format');
        });


        $(".select2, .select2-multiple").select2({
            placeholder: 'اختر الزبائن',
            width: null
        });
    </script>
@endpush
