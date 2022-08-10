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
                                    <div class="form-group @error('code') has-error @enderror">
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
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group  @error('start_avilable_at') has-error @enderror">
                                        <label class="control-label col-md-3">يبدأ العمل في</label>
                                        <div class="col-md-9">
                                            <input type="datetime-local" class="form-control" placeholder=""
                                                value="{{ old('start_avilable_at') }}" name="start_avilable_at">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group  @error('end_avilable_at') has-error @enderror">
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
                                        <table
                                            class="table table-striped table-bordered table-hover table-checkable order-column"
                                            id="table_id">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="group-checkable"
                                                                data-set="#sample_1 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </th>
                                                    <th> Username </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <label
                                                                class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="checkboxes"
                                                                    value="{{ $user->id }}" name="selected[]"
                                                                    @if (old('selected') !== null) @foreach (old('selected') as $selected)
                                                                    @if ($selected == $user->id) checked @endif
                                                                    @endforeach
                                                @endif />
                                                <span></span>
                                                </label>
                                                </td>
                                                <td> {{ $user->first_name }} </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
    <script>
        $(function() {
            $('input[name=is_selected]').on('click init-post-format', function() {
                $('#users_list').toggle($('#show-is-selected').prop('checked'));
            }).trigger('init-post-format');
        });
    </script>
@endpush
