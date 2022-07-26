@extends('layouts.app')
@section('content')



    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">تعديل الإضافة</span>
                    </div>

                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{route('extra.update',$extra)}}" method="post" class="form-horizontal"  enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('dashboard.extras._fields')

                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>

@endsection