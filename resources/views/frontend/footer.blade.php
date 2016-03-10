<footer id="footer">

    <!-- .footer start -->
    <!-- ================ -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-content">
                        <div class="logo-footer"><img id="logo-footer" src="{{url('frontend/images/vinaquips/logo.png')}}" alt=""></div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>Copyright &copy; 2016 Vinaquips</p>
                                <ul class="social-links circle">
                                    <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                    <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                    <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
                                    <li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-icons">
                                    <li><i class="fa fa-map-marker pr-10"></i> One infinity loop, 54100</li>
                                    <li><i class="fa fa-phone pr-10"></i> +00 1234567890</li>
                                    <li><i class="fa fa-fax pr-10"></i> +00 1234567891 </li>
                                    <li><i class="fa fa-envelope-o pr-10"></i> info@Vinaquips.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-bottom hidden-lg hidden-xs"></div>
                <div class="col-sm-6 col-md-2">
                    <div class="footer-content">
                        <h2>Quick Links</h2>
                        <nav>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{url('/')}}">Trang chủ</a></li>
                                @foreach ($footer_list_categories as $key =>  $value)
                                    <li class="{{($page == $key) ? 'active' : '' }}">
                                        <a href="{{url($key)}}">{{$value}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-md-offset-1">
                    <div class="footer-content">
                        <div class="fanPage">
                            <div class="fb-page"
                                 data-href="https://www.facebook.com/vinaquip/"
                                 data-tabs="timeline"
                                 data-height="210"
                                 data-small-header="false"
                                 data-adapt-container-width="true"
                                 data-hide-cover="false"
                                 data-show-facepile="true">
                                <div class="fb-xfbml-parse-ignore">
                                    <blockquote cite="https://www.facebook.com/vinaquip/">
                                        <a href="https://www.facebook.com/vinaquip/">Thiết bị phòng thí nghiệm - Vinaquips JSC</a>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <h3><i class="fa fa-line-chart pr-10"></i>Lượt truy cập</h3>
                        <ul class="list-icons">
                            <li><i class="fa fa-bolt pr-10"></i>Hôm nay <span class="pr-10">450</span></li>
                            <li><i class="fa fa-calendar pr-10"></i>Tháng hiện tại <span class="pr-10">122</span></li>
                            <li><i class="fa fa-bar-chart pr-10"></i>Tổng lượt truy cập <span class="pr-10">12345</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="space-bottom hidden-lg hidden-xs"></div>
        </div>
    </div>
    <!-- .footer end -->

    <!-- .subfooter start -->
    <!-- ================ -->
    <div class="subfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>Copyright &copy; 2016 Vinaquips by <a target="_blank" href="http://htmlcoder.me">HtmlCoder</a>. All Rights Reserved</p>
                </div>
                <div class="col-md-6">
                    <nav class="navbar navbar-default" role="navigation">
                        <!-- Toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-collapse-2">
                            <ul class="nav navbar-nav">
                                <li><a href="{{url('/')}}">Trang chủ</a></li>
                                @foreach ($footer_list_categories as $key =>  $value)
                                <li><a href="{{url($key)}}">{{$value}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- .subfooter end -->

</footer>