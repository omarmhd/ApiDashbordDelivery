@extends('layouts.app')
@section('content')

    <h3 class="page-title"> اللوحة الرئيسية
        <small>الإحصائيات</small>
    </h3>
    <!-- END PAGE TITLE-->
    <!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">الرئيسية</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <span>اللوحة الرئيسية</span>
            </li>
        </ul>

    </div>
    <!-- END PAGE BAR -->
    <!-- END PAGE HEADER-->
    <div class="row widget-row">
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading">عدد الطلبات</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green fa  fa-cutlery"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle"></span>
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">{{$orders}}</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>

        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading">عدد الزبائن</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-purple icon-user"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle"></span>
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="815">{{$clients}}</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading"> عدد السائقين </h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-blue fa fa-taxi"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle"></span>
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="5,071">{{$drivers}}</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
    </div>
    <div class="row widget-row">
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading">عدد المطاعم</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green icon-bulb"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle"></span>
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">{{$resturants}}</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-3">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading">إجمالي المبيعات </h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-red icon-layers"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle">USD</span>
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="1,293">0</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>

    </div>


    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="portlet light bordered">
                <div class="portlet-title tabbable-line">
                    <div class="caption">
                        <i class="icon-bubbles font-dark hide"></i>
                        <span class="caption-subject font-dark bold uppercase">الرسائل</span>
                    </div>
                    <ul class="nav nav-tabs">

                    </ul>
                </div>
                <div class="portlet-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="portlet_comments_1">
                            <!-- BEGIN: Comments -->

                            @foreach($messages as $message)
                            <div class="mt-comments">
                                <div class="mt-comment">
                                    <div class="mt-comment-img">
                                        <img src="{{asset('images')}}/{{$message->user->attachment->name}}"  style="width: 50px " /> </div>
                                    <div class="mt-comment-body">
                                        <div class="mt-comment-info">
                                            <span class="mt-comment-author">{{$message->user->name}}</span>
                                            <span class="mt-comment-date">{{$message->user->created_at}}</span>
                                        </div>
                                        <div class="mt-comment-text"> {{$message->content}} </div>
                                        <div class="mt-comment-details">
                                            <ul class="mt-comment-actions">


                                                <li>

                                                    <a class="dropdown-item" href=""
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        حذف
                                                    </a>

                                                    <form id="logout-form" action="{{ route('message.destroy',$message) }}" method="POST" class="d-none">
                                                        @method('delete')
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>



                            </div>
                             @endforeach
                            <a href="{{route('message.index')}}">المزيد </a>
                            <!-- END: Comments -->
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection