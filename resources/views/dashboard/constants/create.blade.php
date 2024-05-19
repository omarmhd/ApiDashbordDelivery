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
                        <span class="caption-subject bold uppercase">إضافة منطقة</span>
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
                    <form action="{{ route('constants.store',['key'=> request('key')]) }}" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="key" value="{{request('key')}}">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group @error('name') has-error @enderror">
                                        <label class="control-label col-md-3">اسم المنطقة</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder=""
                                                value="{{ old('value') }}" name="value">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->

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
                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
    </div>
@endsection
@push('js')

@endpush
