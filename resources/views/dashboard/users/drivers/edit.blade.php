@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase"> تعديل بيانات السائق </span>
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
                    <form action="{{ route('driver.update', ['driver' => $driver->user_id]) }}" method="post"
                        class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-body">
                            <h3 class="form-section"> السائق {{ $driver->user->first_name }}</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3"> notes</label>
                                        <div class="col-md-9">
                                            <textarea name="notes" class="form-control" id="" cols="30" rows="10">{{ $driver->notes }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">متاح</label>
                                        <div class="col-md-6">
                                            <div class="radio-list">
                                                <label class="radio-inline">
                                                    <input type="checkbox" name="available" value="1"> </label>

                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->

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
