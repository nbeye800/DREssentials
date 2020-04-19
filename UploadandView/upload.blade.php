<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>Dr. Essentials</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
<link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('css/aos.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="site-wrap">
<div class="site-mobile-menu">
<div class="site-mobile-menu-header">
<div class="site-mobile-menu-close mt-3">
<span class="icon-close2 js-menu-toggle"></span>
</div>
</div>
<div class="site-mobile-menu-body"></div>
</div>
<header class="site-navbar py-3" role="banner">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-11 col-xl-2">
<h1 class="mb-0"><a href="#" class="text-white h2 mb-0">Dr.<span class="text-primary">Essentials</span> </a></h1>


<div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
</div>
</div>
</div>
</header>
<div class="site-section site-hero">
<div class="container">
<div class="row align-center">
<div class="col-md-12">
<span class="d-block mb-3 caption" data-aos="fade-up" data-aos-delay="100">DR ESSENTIALS UPLOADED FILES</span>
<span class="d-block mb-5 caption" data-aos="fade-up" data-aos-delay="300">Welcome to the site that makes life Easier for Desk Receptionist</span>
<a href="{{ url('/') }}" class="btn-custom" data-aos="fade-up" data-aos-delay="400"><span>Back To Home Page</span></a>

<br>
<div class="card">
    <div class="card-header text-black">Upload Your Files</div>
    <div class="card-body">
        <form action="{{ route('view_uploaded_schedules.blade.php') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="text-black">Upload Your File Here</label>
                <input type="file" name="pdffile">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Store Your File</button>
            </div>
        </form>
    </div>
</div>

</div>
</div>
</div>
</div>


 
<footer class="site-footer">
<div class="container">

<div class="row">
<div class="col-md-12 text-center">
<div class="border-top pt-5">
<p>

Copyright &copy; <script type="7850fe8256f2acd54601625f-text/javascript">document.write(new Date().getFullYear());</script> All rights reserved | Developed By <i class="icon-heart text-primary" aria-hidden="true"></i> by <a href="#" target="_blank">Dr. Essentials</a>

</p>
</div>
</div>
</div>
</div>
</footer>
</div>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}" type="7850fe8256f2acd54601625f-text/javascript"></script>
<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}" type="7850fe8256f2acd54601625f-text/javascript"></script>
<script src="{{ asset('js/jquery-ui.js') }}" type="7850fe8256f2acd54601625f-text/javascript"></script>
<script src="{{ asset('js/popper.min.js') }}" type="7850fe8256f2acd54601625f-text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="7850fe8256f2acd54601625f-text/javascript"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}" type="7850fe8256f2acd54601625f-text/javascript"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}" type="7850fe8256f2acd54601625f-text/javascript"></script>
<script src="{{ asset('js/jquery.countdown.min.js') }}" type="7850fe8256f2acd54601625f-text/javascript"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}" type="7850fe8256f2acd54601625f-text/javascript"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}" type="7850fe8256f2acd54601625f-text/javascript"></script>
<script src="{{ asset('js/aos.js') }}" type="7850fe8256f2acd54601625f-text/javascript"></script>
<script src="{{ asset('js/main.js') }}" type="7850fe8256f2acd54601625f-text/javascript"></script>

{{--  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="7850fe8256f2acd54601625f-text/javascript"></script>
<script type="7850fe8256f2acd54601625f-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');  --}}
</script>
<script src="{{ asset('js/rocket-loader.min.js') }}" data-cf-settings="7850fe8256f2acd54601625f-|49" defer=""></script></body>

</html>