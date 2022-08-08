@extends('layouts.app')
@push('css')
    <script type="text/javascript" src="{{asset('assets')}}/global/plugins/bootstrap-fileinput.css"></script>
@endpush
@section('content')



    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">إضافة مطعم جديد</span>
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

                    <form action="{{route('meal.update',$meal)}}" method="post"class="form-horizontal"   enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        @include('dashboard.meals._fields')

                    </form>



                    <!-- END FORM-->

                </div>
            </div>
        </div>

@endsection


