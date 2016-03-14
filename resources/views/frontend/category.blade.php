@extends('frontend')

@section('content')

        <!-- banner start -->
<!-- ================ -->
<div class="banner">
    <div class="fixed-image section dark-translucent-bg parallax-bg-3">
        <div class="container">
            <div class="space-top"></div>
            <h1>{{$category->name}}</h1>
            <div class="separator-2"></div>
            <p class="lead">{{$category->desc}}</p>
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
                    <li class="active">{{$category->name}}</li>
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

            @if ($category->subCategories->count() > 0)
                @foreach ($category->subCategories as $cate)
                  @include('frontend.small', ['category' => $cate])
                @endforeach
            @endif

            <!-- main start -->
            <!-- ================ -->
            @include('frontend.list', ['category' => $category])
            <!-- main end -->

        </div>
    </div>
</section>
<!-- main-container end -->

<!-- section start -->
<!-- ================ -->

<!-- section end -->
@endsection