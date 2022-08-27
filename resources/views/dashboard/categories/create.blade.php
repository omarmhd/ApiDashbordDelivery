@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">إضافة مستخدم جديد</span>
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
                    <form action="{{ route('category.store') }}" method="post" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        @include('dashboard.categories._fields')
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>

@endsection
