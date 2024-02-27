<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="wide wow-animation">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('assets/images/favicon.ico" type="image/x-icon') }}">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:300,300i,400,500,600,700,800,900,900i%7CPT+Serif:400,700">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .ie-panel {
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel,
        html.lt-ie-10 .ie-panel {
            display: block;
        }


        .heading {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .heading h2 {
            font-size: 36px;
            font-weight: normal;
        }

        .heading p {
            min-width: 50%;
            text-align: center;
            line-height: 2;
            color: #777;
        }




        .pricing {
            padding-top: 150px;
            padding-bottom: 150px;
        }

        .pricing .container .plans {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 100px;
        }

        .pricing .container .plans .plan {
            text-align: center;
        }

        .pricing .container .plans .plan .head {
            border-top: 1px solid #19c8fa;
            border-bottom: 1px solid #19c8fa;
            padding: 35px;
        }

        .pricing .container .plans .plan .head h3 {
            font-weight: normal;
            font-size: 20px;
        }

        .pricing .container .plans .plan .head span {
            font-weight: bold;
            font-size: 64px;
            position: relative;
        }

        .pricing .container .plans .plan .head span::before {
            content: "$";
            font-weight: normal;
            position: absolute;
            font-size: 25px;
            left: -25px;
        }

        .pricing .container .plans .plan .head span::after {
            content: "/Mo";
            font-weight: normal;
            position: absolute;
            font-size: 20px;
            font-weight: bold;
            right: -55px;
            bottom: 16px;
        }

        .pricing .container .plans .plan ul {
            list-style: none;
            padding: 0;
            border-bottom: 1px solid #19c8fa;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

        }

        .pricing .container .plans .plan ul li {
            padding: 20px;
            font-size: 17px;
            width: fit-content;
        }

        .pricing .container .plans .plan ul li:not(:last-child) {
            border-bottom: 1px solid #19c8fa;
        }

        .pricing .container .plans .plan .foot {
            margin-top: 50px;
        }

        .pricing .container .plans .plan .foot a {
            text-decoration: none;
            color: black;
            padding: 12px;
            border: #19c8fa 1px solid;
            transition: 0.2s;
        }

        .pricing .container .plans .plan .foot a:hover {
            background-color: #19c8fa;
            color: white;
        }

        .pricing .pricing-contact {
            margin-top: 40px;
            padding: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .pricing .pricing-contact p {
            font-size: 24px;
            text-align: center;
            /* For small screen */
        }

        .pricing .pricing-contact div {
            margin-top: 20px;
        }

        .pricing .pricing-contact div a {
            text-decoration: none;
            color: white;
            background-color: #19c8fa;
            padding: 12px 20px;
        }

    </style>
</head>

<body class="antialiased">
    {{-- <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
          --}}

    {{-- <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
        <p>Loading...</p>
      </div>
    </div> --}}

    <!-- Page Header-->
    <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                <div class="rd-navbar-main-outer">
                    <div class="rd-navbar-main">
                        <!-- RD Navbar Panel-->
                        <div class="rd-navbar-panel">
                            <!-- RD Navbar Toggle-->
                            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                            <!-- RD Navbar Brand-->
                            <div class="rd-navbar-brand"><a href="">DigiMenu</div>
                        </div>
                        <div class="rd-navbar-main-element">
                            <div class="rd-navbar-nav-wrap">
                                <!-- RD Navbar Nav-->
                                <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item active"><a class="rd-nav-link" href="">Home</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('subscriptions.show') }}">Plans</a>
                                    </li>
                                    @role('admin')
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('subscriptions.create') }}">Add Plan (For Admin)</a>
                                    </li>
                                    @endrole
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="">Restaurants</a>
                                    </li>
                                    @if (Route::has('login'))
                                    @auth
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="rd-nav-item">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <input type="submit" value="Log Out">
                                        </form>
                                    </li>
                                    @else
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('login') }}">Log
                                            in</a>
                                        @if (Route::has('register'))
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('register') }}">Register</a>
                                        @endif
                                        @endauth

                                        @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>



    <!-- Swiper-->
    <section class="section section-lg section-main-bunner section-main-bunner-filter text-center">
        <div class="main-banner-img" style="background-image: url('{{ asset('images/bg-banner-2.jpg') }}'); background-size: cover;"></div>
        <div class="main-bunner-inner">
            <div class="container">
                <div class="box-default">
                    <h1 class="box-default-title">Welcome</h1>
                    <div class="box-default-decor"></div>
                    <p class="big box-default-text">Our website features diverse menus from various restaurants,
                        offering a range of culinary delights to suit every taste.</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Featured Offers-->
    @role('admin')
    <section class="section section-lg bg-default">

        <div class="heading">
            <h2>ADD PLAN</h2>
        </div>

        <div class="container mt-5">

            <form method="post" action="{{ route('subscriptions.store') }}">
                @csrf
                <input class="form-control" type="text" name="name" placeholder="Name*">
                <input class="form-control mt-3" type="text" name="price" placeholder="Price*">
                <input class="form-control mt-3" type="number" name="article_number" placeholder="Article Number*">
                <input class="form-control mt-3" type="number" name="scan_limit" placeholder="Scan Limit*">
                <div class="mt-3">
                    <label for="media">Media Type: </label>
                    <select class="form-select" id="media" name="media_type">
                        <option value="no">No Media</option>
                        <option value="image">Image</option>
                        <option value="video">Video</option>
                    </select>
                </div>
                <div class="d-flex justify-content-center">
                    <input class="btn btn-primary mt-3" type="submit" value="Add Plan">
                </div>
            </form>

        </div>
    </section>
    @endrole('admin')

    <!-- Page Footer-->
    <footer class="section footer-minimal context-dark">
        <div class="container wow-outer">
            <div class="wow fadeIn">
                <div class="row row-60">
                    <div class="col-12"><a href="index.html">DigiMenus</a></div>
                    <div class="col-12">
                        <ul class="social-list">
                            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-facebook" href="#"></a></li>
                            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-instagram" href="#"></a></li>
                            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-twitter" href="#"></a></li>
                            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-youtube-play" href="#"></a></li>
                            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-pinterest-p" href="#"></a></li>
                        </ul>
                    </div>
                </div>
                <p class="rights"><span>&copy;&nbsp; </span><span class="copyright-year"></span><span>&nbsp;</span><span>DigiMenu</span><span>.&nbsp;</span><span>All
                        Rights Reserved.</span><span>&nbsp;</span><a href="#">Privacy Policy</a>.
                    Design&nbsp;by&nbsp;</p>
            </div>
        </div>
    </footer>
    </div>
    {{-- <div class="snackbars" id="form-output-global"></div> --}}
    <script src="{{ asset('assets/js/core.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
