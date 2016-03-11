@extends('frontend')

@section('content')

@include('frontend.banner')

<div class="page-top object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
    <div class="container">
        <div class="row">
            <div class="owl-carousel content-slider" id="slideProductNew">
                @foreach ($newProducts as $product)
                <div class="col-md-12">
                    <h1 class="text-center title">Sản phẩm mới</h1>
                    <div class="separator"></div>
                    <p class="text-center">{{html_entity_decode($product->title)}}</p>
                    <div class="row grid-space-20">
                        <div class="col-sm-12 col-md-4 col-md-push-4">
                            <img src="{{\App\Custom\Custom::imageUrl('img/cache/500x500/'. $product->image)}}"
                                 alt="{{html_entity_decode($product->title)}}" class="object-non-visible"
                                 data-animation-effect="fadeInUp"
                                 data-effect-delay="0">
                        </div>
                        <div class="col-sm-6 col-md-4 col-md-pull-4">
                            <div class="box-style-3 right object-non-visible"
                                 data-animation-effect="fadeInUpSmall"
                                 data-effect-delay="0">
                                <div class="icon-container default-bg">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="body">
                                    <h2>Nơi sản xuất</h2>
                                    <p>{{ implode(', ', $product->group_list) }}</p>
                                    <a href="{{url($product->slug.'.html')}}" class="link"><span> Chi tiết</span></a>
                                </div>
                            </div>
                            <div class="box-style-3 right object-non-visible"
                                 data-animation-effect="fadeInUpSmall"
                                 data-effect-delay="200">
                                <div class="icon-container default-bg">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="body">
                                    <h2>Đặc điểm:</h2>
                                    <p>{{str_limit($product->desc, env('TRIM_DESC'))}}</p>
                                    <a href="{{url($product->slug.'.html')}}" class="link"><span> Chi tiết</span></a>
                                </div>
                            </div>
                            <div class="box-style-3 right object-non-visible"
                                 data-animation-effect="fadeInUpSmall"
                                 data-effect-delay="400">
                                <div class="icon-container default-bg">
                                    <i class="fa fa-binoculars"></i>
                                </div>
                                <div class="body">
                                    <h2>Thông số kỹ thuật:</h2>
                                    <p>{{str_limit($product->content, 150)}}</p>
                                    <a href="{{url($product->slug.'.html')}}" class="link"><span> Chi tiết</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="box-style-3 object-non-visible"
                                 data-animation-effect="fadeInUpSmall"
                                 data-effect-delay="0">
                                <div class="icon-container default-bg">
                                    <i class="fa fa-leaf"></i>
                                </div>
                                <div class="body">
                                    <h2>Phụ kiện kèm theo:</h2>
                                    <p>Voluptatem ad provident non veritatis.</p>
                                    <a href="{{url($product->slug.'.html')}}" class="link"><span> Chi tiết</span></a>
                                </div>
                            </div>
                            <div class="box-style-3 object-non-visible"
                                 data-animation-effect="fadeInUpSmall"
                                 data-effect-delay="200">
                                <div class="icon-container default-bg">
                                    <i class="fa fa-laptop"></i>
                                </div>
                                <div class="body">
                                    <h2>Phần lựa chọn thêm</h2>
                                    <p>Máy in Dot Matrix (80252042)</p>
                                    <a href="{{url($product->slug.'.html')}}" class="link"><span> Chi tiết</span></a>
                                </div>
                            </div>
                            <div class="box-style-3 object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="400">
                                <div class="icon-container default-bg">
                                    <i class="fa fa-bus"></i>
                                </div>
                                <div class="body">
                                    <h2>Phương thức vận chuyển</h2>
                                    <p>Đến nơi an toàn</p>
                                    <a href="{{url($product->slug.'.html')}}" class="link"><span> Chi tiết</span></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
<!-- page-top end -->
<!-- main-container end -->
<!-- section start -->
<!-- ================ -->
<div class="section">
    <div class="container">
        <h2>Sản phẩm bán chạy</h2>
        <div class="separator-2"></div>
        <div class="row">
            @foreach ($hotProducts->chunk(4) as $products)
            <div class="col-md-4">
                <div class="block clearfix">
                    @foreach ($products as $product)
                    <div class="list-with-image">
                        <div class="overlay-container">
                            <img src="{{ \App\Custom\Custom::imageUrl('img/cache/268x228/'.$product->image)}}" alt="{{$product->title}}">
                            <a href="{{url($product->slug.'.html')}}" class="overlay small">
                                <i class="fa fa-link"></i>
                            </a>
                        </div>
                        <h2><a href="{{url($product->slug.'.html')}}">{{html_entity_decode($product->title)}}</a></h2>
                        <p class="small">{!! str_limit(html_entity_decode($product->desc), env('TRIM_DESC')) !!}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- section end -->
<!-- section start -->
<!-- ================ -->

<!-- section end -->
@endsection