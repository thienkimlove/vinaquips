@extends('frontend')

@section('content')
        <!-- ================ -->
<div class="banner">
    <!-- google maps start -->
    <div class="hidden-sm">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14900.485422079968!2d105.839249!3d20.987772!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x65b2f512cfc2185f!2sVinaquips+JSC!5e0!3m2!1svi!2sus!4v1457329564051" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <!-- google maps end -->
</div>
<!-- banner end -->

<!-- page-intro start-->
<!-- ================ -->
<div class="page-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="{{url('/')}}">Trang chủ</a></li>
                    <li class="active">Liên hệ</li>
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
                <h1 class="page-title">Liên hệ</h1>
                <!-- page-title end -->
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                <div class="alert alert-success hidden" id="contactSuccess">
                    <strong>Success!</strong> Your message has been sent to us.
                </div>
                <div class="alert alert-error hidden" id="contactError">
                    <strong>Error!</strong> There was an error sending your message.
                </div>
                <div class="contact-form">
                    <form id="contact-form" role="form">
                        <div class="form-group has-feedback">
                            <label for="name">Name*</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="">
                            <i class="fa fa-user form-control-feedback"></i>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="email">Email*</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="">
                            <i class="fa fa-envelope form-control-feedback"></i>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="subject">Subject*</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="">
                            <i class="fa fa-navicon form-control-feedback"></i>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="message">Message*</label>
                            <textarea class="form-control" rows="6" id="message" name="message" placeholder=""></textarea>
                            <i class="fa fa-pencil form-control-feedback"></i>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-default">
                    </form>
                </div>
            </div>
            <!-- main end -->

            <!-- sidebar start -->
            <aside class="col-md-4">
                <div class="sidebar">
                    <div class="side vertical-divider-left">
                        <h3 class="title">Vinaquips JSC</h3>
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