<!-- ================ -->
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-2  col-sm-6">

                <!-- header-top-first start -->
                <!-- ================ -->
                <div class="header-top-first clearfix">
                    <ul class="social-links clearfix hidden-xs">
                        <li class="twitter">
                            <a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="skype">
                            <a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a>
                        </li>
                        <li class="linkedin">
                            <a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a>
                        </li>
                        <li class="googleplus">
                            <a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li class="youtube">
                            <a target="_blank" href="http://www.youtube.com"><i class="fa fa-youtube-play"></i></a>
                        </li>
                        <li class="flickr">
                            <a target="_blank" href="http://www.flickr.com"><i class="fa fa-flickr"></i></a>
                        </li>
                        <li class="facebook">
                            <a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="pinterest">
                            <a target="_blank" href="http://www.pinterest.com"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                    <div class="social-links hidden-lg hidden-md hidden-sm">
                        <div class="btn-group dropdown">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-share-alt"></i></button>
                            <ul class="dropdown-menu dropdown-animation">
                                <li class="twitter">
                                    <a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="skype">
                                    <a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a>
                                </li>
                                <li class="linkedin">
                                    <a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li class="googleplus">
                                    <a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li class="youtube">
                                    <a target="_blank" href="http://www.youtube.com"><i class="fa fa-youtube-play"></i></a>
                                </li>
                                <li class="flickr">
                                    <a target="_blank" href="http://www.flickr.com"><i class="fa fa-flickr"></i></a>
                                </li>
                                <li class="facebook">
                                    <a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="pinterest">
                                    <a target="_blank" href="http://www.pinterest.com"><i class="fa fa-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- header-top-first end -->

            </div>
            <div class="col-xs-10 col-sm-6">

                <!-- header-top-second start -->
                <!-- ================ -->
                <div id="header-top-second"  class="clearfix">

                    <!-- header top dropdowns start -->
                    <!-- ================ -->
                    <div class="header-top-dropdown">
                        <div class="btn-group dropdown">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i> Search</button>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-animation">
                                <li>
                                    <form role="search" class="search-box">
                                        <div class="form-group has-feedback">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <i class="fa fa-search form-control-feedback"></i>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <a href="{{url('login')}}" class="btn btn-sm"><i class="fa fa-lock pr-5"></i>Đăng nhập</a>

                        <a href="{{url('register')}}" class="btn btn-sm"><i class="fa fa-sign-out pr-5"></i>Đăng ký</a>
                    </div>
                    <!--  header top dropdowns end -->

                </div>
                <!-- header-top-second end -->
            </div>
        </div>
    </div>
</div>
<!-- header-top end -->
<!-- header start classes:
fixed: fixed navigation mode (sticky menu) e.g. <header class="header fixed clearfix">
 dark: dark header version e.g. <header class="header dark clearfix">
 ================ -->
<header class="header fixed clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <!-- header-left start -->
                <!-- ================ -->
                <div class="header-left clearfix">

                    <!-- logo -->
                    <div class="logo">
                        <a href="{{url('/')}}"><img id="logo" src="{{url('frontend/images/vinaquips/logo.png')}}" alt="Vinaquips"></a>
                    </div>
                </div>
                <!-- header-left end -->
            </div>
            <div class="col-md-9">
                <!-- header-right start -->
                <!-- ================ -->
                <div class="header-right clearfix">

                    <!-- main-navigation start -->
                    <!-- ================ -->
                    <div class="main-navigation animated">

                        <!-- navbar start -->
                        <!-- ================ -->
                        <nav class="navbar navbar-default" role="navigation">
                            <div class="container-fluid">
                                <!-- Toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="active">
                                            <a href="{{url('/')}}">Trang nhất</a>
                                        </li>
                                        <li class="dropdown mega-menu">
                                            <a href="{{url('san-pham')}}" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <div class="row">
                                                        <div class="col-sm-4 col-md-6 hidden-sm">
                                                            @if ($header_products['products'])
                                                                <h4>{{$header_products['products']->title}}</h4>
                                                                <p>{!! str_limit($header_products['products']->desc, env('TRIM_DESC')) !!}</p>
                                                                <img src="{{url('img/cache/500x500/'.$header_products['products']->image)}}" alt="Vinaquips">
                                                            @endif
                                                        </div>
                                                        <div class="col-sm-8 col-md-6">
                                                            <h4>Danh mục các sản phẩm</h4>
                                                            <div class="row">
                                                                @foreach ($header_products_categories->chunk(5) as $categories)
                                                                <div class="col-sm-6">
                                                                    <div class="divider"></div>
                                                                    <ul class="menu">
                                                                        @foreach ($categories as $cat)
                                                                        <li>
                                                                            <a href="{{url($cat->slug)}}">
                                                                                <i class="icon-right-open"></i>{{$cat->name}}
                                                                            </a>
                                                                        </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- mega-menu start -->
                                        <li class="dropdown mega-menu">
                                            <a href="{{url('mua-hang')}}" class="dropdown-toggle" data-toggle="dropdown">Mua hàng</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <div class="row">
                                                        <div class="col-sm-4 col-md-6 hidden-sm">
                                                            @if ($header_products['shopping'])
                                                                <h4>{{$header_products['shopping']->title}}</h4>
                                                                <p>{!! str_limit($header_products['shopping']->desc, env('TRIM_DESC')) !!}</p>
                                                                <img src="{{url('img/cache/500x500/'.$header_products['shopping']->image)}}" alt="Vinaquips">
                                                            @endif
                                                        </div>
                                                        <div class="col-sm-8 col-md-6">
                                                            <h4>Danh mục các sản phẩm</h4>
                                                            <div class="row">
                                                                @foreach ($header_shopping_categories->chunk(5) as $categories)
                                                                    <div class="col-sm-6">
                                                                        <div class="divider"></div>
                                                                        <ul class="menu">
                                                                            @foreach ($categories as $cat)
                                                                                <li>
                                                                                    <a href="{{url($cat->slug)}}">
                                                                                        <i class="icon-right-open"></i>{{$cat->name}}
                                                                                    </a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- mega-menu end -->
                                        <!-- mega-menu start -->
                                        <li class="dropdown mega-menu">
                                            <a href="{{url('phu-kien')}}" class="dropdown-toggle" data-toggle="dropdown">Phụ kiện</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <div class="row">
                                                        <div class="col-sm-4 col-md-6 hidden-sm">
                                                            @if ($header_products['accessories'])
                                                                <h4>{{$header_products['accessories']->title}}</h4>
                                                                <p>{!! str_limit($header_products['accessories']->desc, env('TRIM_DESC')) !!}</p>
                                                                <img src="{{url('img/cache/500x500/'.$header_products['accessories']->image)}}" alt="Vinaquips">
                                                            @endif
                                                        </div>
                                                        <div class="col-sm-8 col-md-6">
                                                            <h4>Danh mục các sản phẩm</h4>
                                                            <div class="row">
                                                                @foreach ($header_accessories_categories->chunk(5) as $categories)
                                                                    <div class="col-sm-6">
                                                                        <div class="divider"></div>
                                                                        <ul class="menu">
                                                                            @foreach ($categories as $cat)
                                                                                <li>
                                                                                    <a href="{{url($cat->slug)}}">
                                                                                        <i class="icon-right-open"></i>{{$cat->name}}
                                                                                    </a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- mega-menu end -->
                                        <li>
                                            <a href="{{url('gioi-thieu')}}">Giới thiệu</a>
                                        </li>
                                        <li>
                                            <a href="{{url('lien-he')}}">Liên hệ</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <!-- navbar end -->
                    </div>
                    <!-- main-navigation end -->
                </div>
                <!-- header-right end -->
            </div>
        </div>
    </div>
</header>
<!-- header end -->

