<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>KNBS homepage</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::to('assets/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::to('assets/css/main.css') }}" rel="stylesheet">

    <link href="{{ URL::to('assets/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{ asset('assets/js/modernizr.custom.js')  }}"></script>

</head>

<body>

<!-- Menu -->
<nav class="menu" id="theMenu">
    <div class="menu-wrap">
        <h1 class="logo"><a href="index.blade.php#home">KNBS</a></h1>
        <i class="fa fa-arrow-right menu-close"></i>
        <a href="index.blade.php">Home</a>
        <a href="services.html">Services</a>
        <a href="{{url('/about')}}">About</a>
        <a href="#contact">Contact</a>
        <a href="{{route('signin')}}">Staff Login</a>
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-dribbble"></i></a>
        <a href="#"><i class="fa fa-envelope"></i></a>
    </div>

    <!-- Menu button -->
    <div id="menuToggle"><i class="fa fa-bars"></i></div>
</nav>

<!-- MAIN IMAGE SECTION -->
<div id="headerwrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h1>KNBS</h1>
                <h2>Nipo Natambulika!</h2>
                <h3>Keeping you informed</h3>
                <div class="spacer"></div>
                <i class="fa fa-angle-down"></i>
            </div>
        </div><!-- row -->
    </div><!-- /container -->
</div><!-- /headerwrap -->

<!-- WELCOME SECTION -->
<div class="container">
    <div class="row mt">
        <div class="col-lg-8">
            <h1>Collecting information for the implementation of vision 2030</h1>
            <p>Through the Statistics Act 2006 the constitution mandates the Kenya National Bureau of Statistics to:</p>
            <ul class="list-group">
                <li class="list-group-item list-group-item-success">Act as the principal agency of the government for collecting, analysing and disseminating statistical data in Kenya</li>
                <li class="list-group-item">Act as custodian of official statistics.</li>
                <li class="list-group-item">Conduct the Population and Housing Census every ten years, and such other censuses and surveys as the Board may determine </li>
                <li class="list-group-item">Maintain a comprehensive and reliable national socio-economic database</li>
                <li class="list-group-item">Establish standards and promote the use of best practices and methods in the production and dissemination of statistical information across the NSS</li>
                <li class="list-group-item">Plan, authorise, coordinate and supervise all official statistical programmes undertaken within the national statistical system</li>

            </ul>
        </div>
        <div class="col-lg-4">
            <p class="pull-right"><br><button type="button" class="btn btn-green">View recent report graphs</button></p>
        </div>
    </div><!-- /row -->
</div><!-- /.container -->


<!-- SERVICES SECTION -->
<div id="services">
    <div class="container">
        <div class="row mt">
            <div class="col-lg-1 centered">
                <i class="fa fa-certificate"></i>
            </div>
            <div class="col-lg-3">
                <h3>Quality Data</h3>
                <p>The bureau strives to provide high quality data that is up to date and relevant</p>
            </div>

            <div class="col-lg-1 centered">
                <i class="fa fa-question-circle"></i>
            </div>
            <div class="col-lg-3">
                <h3>Professionalism</h3>
                <p>Strictly abides by professional considerations on the methods, standards and procedures for statistical production.</p>
            </div>


            <div class="col-lg-1 centered">
                <i class="fa fa-globe"></i>
            </div>
            <div class="col-lg-3">
                <h3>Collaboration</h3>
                <p>Collaborate with stakeholders so as to enhance the quality of statistical information.</p>
            </div>

        </div><!-- row -->
    </div><!-- container -->
</div><!-- services section -->


<!-- BLOG POSTS -->
<div class="container">
    <div class="row mt">
        <div class="col-lg-12">
            <h1>Vision Statement</h1>
        </div><!-- col-lg-12 -->
        <div class="col-lg-8">
            <h3>Our vision statement is</h3>
            <p>To be a centre of excellence in production and management of quality statistics</p>

            <h3>Mission Statement</h3>
            <p>To develop, provide and promote quality statistical information for evidence-based decision making</p>
            <ul>

            </ul>

        </div><!-- col-lg-8-->
        <div class="col-lg-4 goright">
            <p><a href="#"><i class="fa fa-angle-right"></i> See All core values</a></p>
        </div>
    </div><!-- row -->

</div><!-- container -->


<!-- CLIENTS LOGOS -->
<div id="lg">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-2 col-lg-offset-1">
                <img src="assets/img/clients/kenya-od.jpg" alt="">
            </div>
            <div class="col-lg-2">
                <img src="assets/img/clients/nada.jpg" alt="">
            </div>
            <div class="col-lg-2">
                <img src="assets/img/clients/keninfo.jpg" alt="">
            </div>
            <div class="col-lg-2">
                <img src="assets/img/clients/hivaids.jpg" alt="">
            </div>
        </div><!-- row -->
    </div><!-- container -->
</div><!-- dg -->



<div class="container">
    <div class="row mt">
    </div><!-- row -->
</div><!-- container -->


<!-- CONTACT FOOTER --->
<div id="cf">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h4>ADDRESS<br/>Herufi House - Head Office</h4>
                <br>
                <p>
                    Street: Lt Tumbo Lane,<br/>
                </p>
                <p>
                    Kenya National Bureau of Statistics<br/>

                    P.O. Box 30266–00100 <br/>

                    GPO NAIROBI. <br/>
                    P: +254-20-3317583 <br/>
                    Fax: +254-20-315977<br/>
                    E: <a href="mailto:">directorgeneral@knbs.or.ke</a>
                </p>
            </div><!--col-lg-4-->
        </div><!-- row -->
    </div><!-- container -->
</div><!-- Contact Footer -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/masonry.pkgd.min.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/classie.js"></script>
<script src="assets/js/AnimOnScroll.js"></script>
<script>
    new AnimOnScroll( document.getElementById( 'grid' ), {
        minDuration : 0.4,
        maxDuration : 0.7,
        viewportFactor : 0.2
    } );
</script>
</body>
</html>
