<div class="main col-md-12">

    <!-- page-title start -->
    <!-- ================ -->
    <h1 class="page-title"><a href="{{url($category->slug)}}">{{$category->name}}</a></h1>
    <div class="separator-2"></div>
    <p class="lead">{{$category->desc}}</p>
    <!-- page-title end -->



    @if ($category->posts->count() > 0)
            <!-- shop items start -->
    <div class="masonry-grid-fitrows row grid-space-20">
        @foreach ($posts = $category->posts()->latest()->limit(3)->get() as $post)
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
                                @foreach ($post->tags as $tag)
                                    <div class="tag">
                                        <a href="{{url('tag/'.$tag->slug)}}">{{$tag->name}}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="elements-list">
                            <i class="fa fa-usd pr-10"></i>
                            <span class="price">
                              Liên hệ
                            </span>
                            <a href="{{url($post->slug.'.html')}}" class=" pull-right"><i class="fa  fa-shopping-cart pr-10"></i>Mua hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <!-- shop items end -->

    <div class="clearfix"></div>

    @endif
</div>