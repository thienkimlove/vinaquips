<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="vi">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Vinaquips | Trang chủ</title>
    <meta name="description" content="Cung cấp, lắp đặt, sửa chữa và bảo trì thiết bị khoa học kỹ thuật">
    <meta name="keywords" content="cân, máy ph, khuấy từ, bếp đun, cất quay, chân không, sắc ký, nghiền mẫu, sắc ký lỏng, hóa, thí nghiệm, y tế, máy khuấy từ, lắc, tủ ấm memmert, sấy, ấm lạnh, âm sâu, lưu mẫu, chân không, co2, so màu, sắc ký, khí, lỏng, khuấy, gia nhiệt, sinh học,  sinh hoá, hấp thụ, quang phổ, ftir, kính hiển vi, cô quay, đồng hoá, xử lý mẫu">
    <meta name="author" content="vinaquips.com">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

    <!-- Web Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext,vietnamese' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>

    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/custom/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Fontello CSS -->
    <link href="{{url('frontend/fonts/fontello/css/fontello.css')}}" rel="stylesheet">

    <!-- Plugins -->
    <link href="http://previous.themepunch.com/revolution4-jquery/liveguide/rs-plugin/css/settings.css" media="screen" rel="stylesheet">
    <link href="{{url('frontend/css/plugins/extralayers.css')}}" media="screen" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js" rel="stylesheet">
    <link href="{{url('frontend/css/plugins/animations.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet">

    <!-- Vinaquips core CSS file -->
    <link href="{{url('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/skins/blue.css')}}" rel="stylesheet">
    <!-- Custom css -->
    <link href="{{url('frontend/css/custom.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- body classes:
  "boxed": boxed layout mode e.g. <body class="boxed">
  "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1">
-->
<body class="{{($page == 'index') ? 'front no-trans' : 'no-trans'}}">
<!-- scrollToTop -->
<!-- ================ -->
<div class="scrollToTop"><i class="icon-up-open-big"></i></div>
<!-- page wrapper start -->
<!-- ================ -->
<div class="page-wrapper">
    <!-- header-top start (Add "dark" class to .header-top in order to enable dark header-top e.g <div class="header-top dark">) -->
    @include('frontend.header')

    <!-- main-container start -->
    <!-- ================ -->
    @yield('content')

    <!-- footer start (Add "light" class to #footer in order to enable light footer) -->
    <!-- ================ -->
    @include('frontend.footer')
    <!-- footer end -->
</div>
<!-- page-wrapper end -->

<!-- JavaScript files placed at the end of the document so the pages load faster
================================================== -->
<!-- Jquery and Bootstap core js files -->
<!--<script type="text/javascript" src="js/plugins/jquery.min.js">-->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
        integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ=="
        crossorigin="anonymous">

</script>
<!--<script type="text/javascript" src="js/plugins/bootstrap.min.js"></script>-->

<!-- Modernizr javascript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

<!-- jQuery REVOLUTION Slider  -->
<script type="text/javascript" src="{{url('frontend/js/plugins/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{url('frontend/js/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- Isotope javascript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js"></script>

<!-- Owl carousel javascript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

<!-- Magnific Popup javascript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>

<!-- Appear javascript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.appear/0.3.3/jquery.appear.min.js"></script>

<!-- Count To javascript -->
<script type="text/javascript" src="{{url('frontend/js/plugins/jquery.countTo.js')}}"></script>

<!-- Parallax javascript -->
<script src="http://ianlunn.co.uk/plugins/jquery-parallax/scripts/jquery.parallax-1.1.3.js"></script>

<!-- Contact form -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>

<!-- Initialization of Plugins -->
<script type="text/javascript" src="{{url('frontend/js/template.js')}}"></script>

<!-- Custom Scripts -->
<script type="text/javascript" src="{{url('frontend/js/custom.js')}}"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html>
