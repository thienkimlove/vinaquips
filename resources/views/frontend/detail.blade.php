@extends('frontend')

@section('content')

        <!-- page-intro start-->
<!-- ================ -->
<div class="page-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="{{url('/')}}">Trang nhất</a></li>
                    <li><a href="{{url($post->category->slug)}}">{{$post->category->name}}</a></li>
                    <li class="active">{{$post->title}}</li>
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
            <div class="main col-md-9">

                <!-- page-title start -->
                <!-- ================ -->
                <h1 class="page-title margin-top-clear">{{$post->title}}</h1>
                <!-- page-title end -->

                <div class="row">
                    <div class="col-md-4">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills white space-top" role="tablist">
                            <li class="active">
                                <a href="#product-images"
                                   role="tab"
                                   data-toggle="tab"
                                   title="images">
                                    <i class="fa fa-camera pr-5"></i> Photo
                                </a>
                            </li>
                            <li>
                                <a href="#product-video"
                                   role="tab"
                                   data-toggle="tab"
                                   title="video"><i class="fa fa-video-camera pr-5"></i> Video
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes start-->
                        <div class="tab-content clear-style">
                            <div class="tab-pane active" id="product-images">
                                <div class="owl-carousel content-slider-with-controls-bottom">
                                    <div class="overlay-container">
                                        <img src="{{url('img/cache/750x563/'.$post->image)}}" alt="{{$post->title}}">
                                        <a href="{{url('img/cache/750x563/'.$post->image)}}"
                                           class="popup-img overlay"
                                           title="{{$post->title}}">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="product-video">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="//player.vimeo.com/video/29198414?byline=0&amp;portrait=0"></iframe>
                                    <p><a href="http://vimeo.com/29198414">Introducing Vimeo Music Store</a> from <a href="http://vimeo.com/staff">Vimeo Staff</a> on <a href="https://vimeo.com">Vimeo</a>.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Tab panes end-->
                        <hr>
                        <div class="elements-list pull-right clearfix">
                            <span>
                                <i class="fa fa-star text-default"></i>
                                <i class="fa fa-star text-default"></i>
                                <i class="fa fa-star text-default"></i>
                                <i class="fa fa-star text-default"></i>
                                <i class="fa fa-star"></i>
                            </span>
                            <a href="#" class="wishlist">
                                <i class="fa fa-heart-o pr-5"></i>Yêu thích
                            </a>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                    </div>

                    <!-- product side start -->
                    <div class="col-md-8">
                        <div class="sidebar">
                            <div class="side product-item vertical-divider-left">
                                <div class="tabs-style-2">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="active">
                                            <a href="#h2tab1"
                                               role="tab"
                                               data-toggle="tab">
                                                <i class="fa fa-file-text-o pr-5"></i>Giới thiệu
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#h2tab2"
                                               role="tab"
                                               data-toggle="tab">
                                                <i class="fa fa-files-o pr-5"></i>Thông số KT
                                            </a>
                                        </li>
                                        <li><a href="#h2tab3"
                                               role="tab"
                                               data-toggle="tab">
                                                <i class="fa fa-star pr-5"></i>(3) Đánh giá</a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content padding-top-clear padding-bottom-clear">
                                        <div class="tab-pane fade in active" id="h2tab1">
                                            <h4 class="title">{{$post->title}}</h4>
                                            {!! $post->desc !!}
                                        </div>
                                        <div class="tab-pane fade" id="h2tab2">
                                            <h4 class="space-top">Specifications</h4>
                                            <hr>
                                            {!! $post->content !!}
                                            <hr>
                                        </div>
                                        <div class="tab-pane fade" id="h2tab3">
                                            <!-- comments start -->
                                            <div class="comments margin-clear space-top">
                                                <!-- comment start -->
                                                <div class="comment clearfix">
                                                    <div class="comment-avatar">
                                                        <img src="{{url('frontend/images/avatar.jpg')}}" alt="avatar">
                                                    </div>
                                                    <div class="comment-content">
                                                        <h3>Amazing!</h3>
                                                        <div class="comment-meta"> <i class="fa fa-star text-default"></i> <i class="fa fa-star text-default"></i> <i class="fa fa-star text-default"></i> <i class="fa fa-star text-default"></i> <i class="fa fa-star"></i> | Today, 12:31</div>
                                                        <div class="comment-body clearfix">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
                                                            <a href="#" class="btn btn-gray more pull-right"><i class="fa fa-reply"></i> Reply</a>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- comment end -->
                                            </div>
                                            <!-- comments end -->

                                            <!-- comments form start -->
                                            <div class="comments-form">
                                                <h2 class="title">Add your Review</h2>
                                                <form role="form" id="comment-form">
                                                    <div class="form-group has-feedback">
                                                        <label for="name4">Name</label>
                                                        <input type="text" class="form-control" id="name4" placeholder="" name="name4" required>
                                                        <i class="fa fa-user form-control-feedback"></i>
                                                    </div>
                                                    <div class="form-group has-feedback">
                                                        <label for="subject4">Subject</label>
                                                        <input type="text" class="form-control" id="subject4" placeholder="" name="subject4" required>
                                                        <i class="fa fa-pencil form-control-feedback"></i>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Rating</label>
                                                        <select class="form-control" id="review">
                                                            <option value="five">5</option>
                                                            <option value="four">4</option>
                                                            <option value="three">3</option>
                                                            <option value="two">2</option>
                                                            <option value="one">1</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group has-feedback">
                                                        <label for="message4">Message</label>
                                                        <textarea class="form-control" rows="8" id="message4" placeholder="" name="message4" required></textarea>
                                                        <i class="fa fa-envelope-o form-control-feedback"></i>
                                                    </div>
                                                    <input type="submit" value="Submit" class="btn btn-default">
                                                </form>
                                            </div>
                                            <!-- comments form end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vertical-divider-left">

                                <!-- tags -->
                                <div class="block clearfix">
                                    <h3 class="title">
                                        <i class="fa fa-tags"></i>
                                        Tags sản phẩm của Vinaquips
                                    </h3>
                                    <div class="tags-cloud">
                                        @foreach($product->tags as $tag)
                                        <div class="tag">
                                            <a href="{{url('tag/'.$tag->slug)}}">{{$tag->name}}</a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product side end -->
                </div>
            </div>
            <!-- sidebar -->
            <aside class="col-md-3">
                <div class="sidebar">
                    <div class="block clearfix">
                        <h2>Sản phẩm đã xem</h2>
                        <div class="separator"></div>
                        @foreach ($viewedProducts as $product)
                        <div class="list-with-image">
                            <div class="overlay-container">
                                <img src="{{url('img/cache/500x500/'.$product->image)}}" alt="{{$product->title}}">
                                <a href="{{url($product->slug)}}" class="overlay small">
                                    <i class="fa fa-link"></i>
                                </a>
                            </div>
                            <h2><a href="{{url($product->slug)}}">{{$product->title}}</a></h2>
                            <p class="small">{{str_limit($product->desc, env('TRIM_DESC'))}}</p>
                        </div>
                        @endforeach
                    </div>
                    <!-- download -->
                    <div class="block clearfix">
                        <h3 class="title">Catalog sản phẩm</h3>
                        <div class="separator"></div>
                        <div class="image-box">
                            <div class="overlay-container">
                                <img src="images/vinaquips/products/8.jpg" alt="">
                                <div class="overlay">
                                    <div class="overlay-links">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                        <a href="images/vinaquips/products/8.jpg" class="popup-img-single" title="image title"><i class="fa fa-search-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="image-box-body">
                                <h3 class="title"><a href="#">Máy ly tâm</a></h3>
                                <p>Hướng dẫn, catalog giới thiệu các sản phẩm của Vinaquips</p>
                                <a href="#" class="link"><span><i class="fa fa-download pr-10"></i>Download</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- main end -->
        </div>
    </div>

</section>
<!-- main-container end -->

<!-- section start -->
<!-- ================ -->
<div class="section clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Sản phẩm cùng loại</h2>
                <div class="separator-2"></div>
                <p>Các sản phẩm trong công nghệ sinh học</p>
                <div class="row grid-space-20">
                    <div class="col-md-3 col-sm-6">
                        <div class="listing-item">
                            <div class="overlay-container">
                                <img src="images/s1_750x563.jpg" alt="">
                                <a href="#" class="overlay small">
                                    <i class="fa fa-plus"></i>
                                    <span>Chi tiết</span>
                                </a>
                            </div>
                            <div class="listing-item-body clearfix">
                                <h3 class="title"><a href="#">Sản phẩm 01</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae tempora debitis, sed illo officiis.</p>
                                <span class="price">Yêu thích</span>
                                <div class="elements-list pull-right">
                                    <a href="#" class="wishlist" title="wishlist"><i class="fa fa-heart-o"></i></a>
                                    <a href="#"><i class="fa fa-hand-o-right pr-10"></i>Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="listing-item">
                            <div class="overlay-container">
                                <img src="images/s2_750x563.jpg" alt="">
                                <a href="#" class="overlay small">
                                    <i class="fa fa-plus"></i>
                                    <span>Chi tiết</span>
                                </a>
                            </div>
                            <div class="listing-item-body clearfix">
                                <h3 class="title"><a href="#">Sản phẩm 02</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae tempora debitis, sed illo officiis.</p>
                                <span class="price">Yêu thích</span>
                                <div class="elements-list pull-right">
                                    <a href="#" class="wishlist" title="wishlist"><i class="fa fa-heart-o"></i></a>
                                    <a href="#"><i class="fa fa-hand-o-right pr-10"></i>Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="listing-item">
                            <div class="overlay-container">
                                <img src="images/s3_750x563.jpg" alt="">
                                <a href="#" class="overlay small">
                                    <i class="fa fa-plus"></i>
                                    <span>Chi tiết</span>
                                </a>
                            </div>
                            <div class="listing-item-body clearfix">
                                <h3 class="title"><a href="#">Sản phẩm 03</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae tempora debitis, sed illo officiis.</p>
                                <span class="price">Yêu thích</span>
                                <div class="elements-list pull-right">
                                    <a href="#" class="wishlist" title="wishlist"><i class="fa fa-heart-o"></i></a>
                                    <a href="#"><i class="fa fa-hand-o-right pr-10"></i>Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="listing-item">
                            <div class="overlay-container">
                                <img src="images/s4_750x563.jpg" alt="">
                                <a href="#" class="overlay small">
                                    <i class="fa fa-plus"></i>
                                    <span>Chi tiết</span>
                                </a>
                            </div>
                            <div class="listing-item-body clearfix">
                                <h3 class="title"><a href="#">Sản phẩm 04</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae tempora debitis, sed illo officiis.</p>
                                <span class="price">Yêu thích</span>
                                <div class="elements-list pull-right">
                                    <a href="#" class="wishlist" title="wishlist"><i class="fa fa-heart-o"></i></a>
                                    <a href="#"><i class="fa fa-hand-o-right pr-10"></i>Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- section end -->
<!-- section start -->
<!-- ================ -->
<div class="section white-bg text-muted footer-top clearfix">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="owl-carousel clients" id="slidePartner">
                    <div class="client">
                        <a href="#"><img src="images/vinaquips/partners/buchi_logo.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/vinaquips/partners/memmert_atmologo_kombi.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/vinaquips/partners/client10.jpg" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/vinaquips/partners/hysc_logo_eng2_2.jpg" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/vinaquips/partners/jascologo.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/vinaquips/partners/labconco-logo.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/vinaquips/partners/logo_top_daihan.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/vinaquips/partners/samheung.jpg" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/vinaquips/partners/testimoniallogo_horiba.gif" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- section end -->
@endsection