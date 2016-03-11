@extends('frontend')

@section('content')
        <!-- page-intro start-->
<!-- ================ -->
<div class="page-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="{{url('/')}}">Trang chủ</a></li>
                    <li class="active">Giới thiệu</li>
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
            <div class="main col-md-8">

                <!-- page-title start -->
                <!-- ================ -->
                <h1 class="page-title">Giới thiệu</h1>
                <!-- page-title end -->
                <article class="clearfix blogpost full">
                    <div class="blogpost-body">
                        <div class="owl-carousel content-slider-with-controls">
                            <div class="overlay-container">
                                <img src="{{url('frontend/images/blog-1.jpg')}}" alt="">
                                <a href="{{url('frontend/images/blog-1.jpg')}}" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
                            </div>
                            <div class="overlay-container">
                                <img src="{{url('frontend/images/blog-2.jpg')}}" alt="">
                                <a href="{{url('frontend/images/blog-2.jpg')}}" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
                            </div>
                            <div class="overlay-container">
                                <img src="{{url('frontend/images/blog-3.jpg')}}" alt="">
                                <a href="{{url('frontend/images/blog-3.jpg')}}" class="popup-img overlay" title="image title"><i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                        <p>
                            Amet culpa, accusamus. Temporibus animi, consequatur cumque natus, esse consequuntur voluptatibus deleniti necessitatibus autem architecto quaerat tenetur nobis, ea maxime saepe rem doloribus placeat aliquid quod, id fuga ratione error harum ex! Facere vero veniam ducimus nulla sed possimus nobis nisi maiores quibusdam, nam odit quos dolores laborum pariatur distinctio in ex culpa impedit. Corrupti sequi perferendis atque nam debitis ea sunt, vel mollitia voluptas tempora eaque
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </p>
                        <p>
                            Inventore, distinctio esse impedit deleniti, magnam minus culpa quia repellendus eligendi nam, omnis qui odio dolorem autem molestias eveniet tempora rem odit possimus! At ea quidem, ipsa ducimus harum quod neque expedita perferendis, quis odio officiis dicta facere qui architecto! Neque, odio quidem a cum perferendis doloribus iure aut ducimus, eveniet commodi unde consequatur iusto error excepturi perspiciatis cupiditate voluptates ad, minus, magnam voluptatem tempora quae at temporibus incidunt. est reprehenderit, voluptates culpa, numquam minima.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, eligendi cum officiis sint eveniet omnis eius quo. Et iusto eos dolor ratione nesciunt praesentium eveniet distinctio repellat. Quas, soluta, ipsam.
                        </p>
                        <blockquote>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                            </p>
                        </blockquote>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse illum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <ul class="list-icons">
                            <li><i class="icon-check"></i> Eveniet distinctio repellat</li>
                            <li><i class="icon-check"></i> Sdipisicing elit</li>
                            <li><i class="icon-check"></i> Sint eveniet omnis eius quo</li>
                            <li><i class="icon-check"></i> Dolor ratione nesciunt</li>
                        </ul>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.
                        </p>
                    </div>
                </article>
            </div>

            <!-- main end -->

            <!-- sidebar start -->
            <aside class="col-md-4">
                <div class="sidebar">
                    <div class="side vertical-divider-left">
                        <h3 class="title">Tư vấn trực tuyến</h3>
                        <ul class="list">
                            <li><strong></strong></li>
                            <li><i class="fa fa-home pr-10"></i>123, q.Hai Bà Trưng<br><span class="pl-20">Hà Nội</span></li>
                            <li><i class="fa fa-phone pr-10"></i><abbr title="Phone">P:</abbr> (123) 456-7890</li>
                            <li><i class="fa fa-mobile pr-10 pl-5"></i><abbr title="Phone">M:</abbr> (123) 456-7890</li>
                            <li><i class="fa fa-envelope pr-10"></i><a href="mailto:info@VNEYE.com">info@vinaquips.com</a></li>
                        </ul>
                        <ul class="social-links colored circle large">
                            <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                            <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </aside>
            <!-- sidebar end -->

        </div>
    </div>
</section>

@endsection