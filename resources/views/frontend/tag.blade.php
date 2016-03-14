@extends('frontend')

@section('content')

        <!-- banner start -->
<!-- ================ -->
<div class="banner">
    <div class="fixed-image section dark-translucent-bg parallax-bg-3">
        <div class="container">
            <div class="space-top"></div>
            <h1>{{$tag->name}}</h1>
            <div class="separator-2"></div>
            <p class="lead">{{$tag->desc}}</p>
        </div>
    </div>
</div>
<!-- banner end -->

<!-- page-intro start-->
<!-- ================ -->
<div class="page-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="{{url('/')}}">Trang nhất</a></li>
                    <li class="active">{{$tag->name}}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- page-intro end -->

<!-- main-container start -->
<!-- ================ -->
<section class="main-container">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-12">

                <!-- page-title start -->
                <!-- ================ -->
                <h1 class="page-title">{{$tag->name}}</h1>
                <div class="separator-2"></div>
                <p class="lead">{{$tag->desc}}</p>
                <!-- page-title end -->



                @if ($posts->count() > 0)
                 <!-- shop items start -->
                    <div class="masonry-grid-fitrows row grid-space-20">
                        @foreach ($posts as $post)
                            <div class="col-md-4 col-sm-6 masonry-grid-item">
                                <div class="listing-item">
                                    <div class="overlay-container">
                                        <img src="{{\App\Custom\Custom::imageUrl('img/cache/750x563/'.$post->image)}}" alt="">
                                        <a href="{{url($post->slug.'.html')}}" class="overlay small">
                                            <i class="fa fa-plus"></i>
                                            <span>Xem chi tiết</span>
                                        </a>
                                    </div>
                                    <div class="listing-item-body clearfix">
                                        <h3 class="title"><a href="{{url($post->slug.'.html')}}">{{$post->title}}</a></h3>
                                        <p>{!! str_limit($post->desc, env('TRIM_DESC')) !!}</p>
                                        <div class="block clearfix">
                                            <h3 class="title"><i class="fa fa-tags pr-10"></i>Tags</h3>
                                            <div class="tags-cloud">
                                                @foreach ($post->tags as $tagPost)
                                                    <div class="tag">
                                                        <a href="{{url('tag/'.$tagPost->slug)}}">{{$tagPost->name}}</a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="elements-list">
                                            <i class="fa fa-usd pr-10"></i>
                                <span class="price">
                                  Liên hệ
                                </span>
                                            <a href="{{url($post->slug.'.html')}}" class=" pull-right"><i class="fa fa-angle-double-right pr-10"></i>Chi tiết</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- shop items end -->

                    <div class="clearfix"></div>

                    <!-- pagination start -->
                {!! $posts->links() !!}
                        <!-- pagination end -->
                @endif
            </div>
            <!-- main end -->

        </div>
    </div>
</section>
<!-- main-container end -->

<!-- section start -->
<!-- ================ -->

<!-- section end -->
@endsection