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
                <div class="alert alert-danger">
                    <ul>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('settings.store') }}" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <h3 class="form-section">الحقول الأساسية</h3>
                            @foreach (config('settings') as $section => $fields)
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <i class="{{ array_get($fields, 'icon', 'glyphicon glyphicon-flash') }}"></i>
                                        {{ $fields['title'] }}
                                    </div>

                                    <div class="panel-body">
                                        <p class="text-muted">{{ $fields['desc'] }}</p>
                                    </div>

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-7  col-md-offset-2">
                                                @foreach ($fields['elements'] as $field)
                                                    @includeIf('setting.fields.' . $field['type'])
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- end panel for {{ $fields['title'] }} -->
                            @endforeach

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @error('option') has-error @enderror">
                                        <label class="control-label col-md-3">الخيار</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder=""
                                                value="{{ old('option') }}" name="option">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group @error('value') has-error @enderror">
                                        <label class="control-label col-md-3">القيمة</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder=""
                                                value="{{ old('value') }}" name="value">
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
