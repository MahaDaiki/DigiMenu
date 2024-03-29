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
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Poppins:300,300i,400,500,600,700,800,900,900i%7CPT+Serif:400,700">
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
            <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
                data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed"
                data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static"
                data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static"
                data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px"
                data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                <div class="rd-navbar-main-outer">
                    <div class="rd-navbar-main">
                        <!-- RD Navbar Panel-->
                        <div class="rd-navbar-panel">
                            <!-- RD Navbar Toggle-->
                            <button class="rd-navbar-toggle"
                                data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                            <!-- RD Navbar Brand-->
                            <div class="rd-navbar-brand"><a href="">DigiMenu</div>
                        </div>
                        <div class="rd-navbar-main-element">
                            <div class="rd-navbar-nav-wrap">
                                <!-- RD Navbar Nav-->
                                <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item active"><a class="rd-nav-link" href="">Home</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link"
                                            href="{{ route('subscriptions.show') }}">Plans</a>
                                    </li>
                                    @role('admin')
                                    <li class="rd-nav-item"><a class="rd-nav-link"
                                            href="{{ route('subscriptions.create') }}">Add Plan (For Admin)</a>
                                    </li>
                                    @endrole
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="">Restaurants</a>
                                    </li>
                                    @if (Route::has('login'))
                                        @auth
                                            <li class="rd-nav-item"><a class="rd-nav-link"
                                                    href="{{ url('/dashboard') }}">Dashboard</a>
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
                                            <li class="rd-nav-item"><a class="rd-nav-link"
                                                    href="{{ route('register') }}">Register</a>
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
        <div class="main-banner-img"
            style="background-image: url('{{ asset('images/bg-banner-2.jpg') }}'); background-size: cover;"></div>
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


    {{-- <section class="section section-lg section-inset-1 bg-gray-1 pt-lg-0">
        <div class="container">
            <div class="row row-50 justify-content-xl-between align-items-lg-center">
                <div class="col-lg-6 wow fadeInLeft">
                    <div class="box-image"><img class="box-image-static"
                            src="{{ asset('images/home-3-1-483x327.jpg') }}" alt="" width="483"
                            height="327" /><img class="box-image-position" src="images/home-3-2-341x391.png"
                            alt="" width="341" height="391" />
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5 wow fadeInRight">
                    <h2>About Us</h2>
                    <p>Pesto is a family owned and operated Italian Restaurant offering a combination of fresh
                        ingredients and authentic Italian cooking.</p>
                    <p>We will make sure you are served the most authentic and fresh Italian dishes, while offering the
                        best customer service. Our kitchen is committed to providing our guests with the best Italian
                        Cuisine.</p><img src="images/signature-1-140x50.png" alt="" width="140"
                        height="50" />
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Featured Offers-->
    <section class="pricing section section-lg bg-default">
        {{-- <div class="container">
          <div class="row justify-content-center text-center">
            <div class="col-md-9 col-lg-7 wow-outer">
              <div class="wow slideInDown">
                <h2>Featured Offers</h2>
                <p class="text-opacity-80">We take pride in providing a diverse array of menus from various restaurants, offering a wide range of culinary delights to satisfy every palate. Explore our selection, showcasing the best dishes from different establishments, ensuring a variety of tastes and the utmost quality for our visitors and guests.</p>
              </div>
            </div>
          </div>
          <div class="row row-20 row-lg-30">
            <div class="col-md-6 col-lg-4 wow-outer">
              <div class="wow fadeInUp">
                <div class="product-featured">
                  <div class="product-featured-figure"><img src="images/product-1-370x395.jpg" alt="" width="370" height="395"/>
                    <div class="product-featured-button"><a class="button button-primary" href="#">order now</a></div>
                  </div>
                  <div class="product-featured-caption">
                    <h4><a class="product-featured-title" href="#">Ravioli</a></h4>
                    <p class="big">$8</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 wow-outer">
              <div class="wow fadeInUp">
                <div class="product-featured">
                  <div class="product-featured-figure"><img src="{{ asset('images/product-2-370x395.jpg')}}" alt="" width="370" height="395"/>
                    <div class="product-featured-button"><a class="button button-primary" href="#">order now</a></div>
                  </div>
                  <div class="product-featured-caption">
                    <h4><a class="product-featured-title" href="#">Black Pasta</a></h4>
                    <p class="big">$13</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 wow-outer">
              <div class="wow fadeInUp">
                <div class="product-featured">
                  <div class="product-featured-figure"><img src="{{ asset('images/product-3-370x395.jpg')}}" alt="" width="370" height="395"/>
                    <div class="product-featured-button"><a class="button button-primary" href="#">order now</a></div>
                  </div>
                  <div class="product-featured-caption">
                    <h4><a class="product-featured-title" href="#">Gelato</a></h4>
                    <p class="big">$4</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        <div class="container">

            @if (count($subscriptions) != 0)
                <div class="heading">
                    <h2>PRICING</h2>
                    <span class="circle-with-lines"></span>
                    <p>Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit,
                        eget
                        tincidunt.</p>
                </div>
                <div class="plans">
                    @foreach ($subscriptions as $subscription)
                        <div class="plan">
                            <div class="head">
                                <h3>{{ $subscription->name }}</h3>
                                <span>{{ $subscription->price }}</span>
                            </div>
                            <ul>
                                <li>Article Number: {{ $subscription->article_number }}</li>
                                <li>Scan Limit: {{ $subscription->scan_limit }}</li>
                                @if ($subscription->media_type === 'no')
                                    <li>Media Type: No Media</li>
                                @elseif ($subscription->media_type === 'image')
                                    <li>Scan Limit: {{ $subscription->media_type }}</li>
                                @else
                                    <li>Media Type: Image, Video</li>
                                @endif
                            </ul>
                            <div class="foot">
                                <a href="#">Buy Now</a>
                            </div>
                            <div class="foot">
                              <a href="{{ route('subscriptions.edit', $subscription->id) }}">Edit(For Admin)</a>
                          </div>
                        </div>
                    @endforeach

                </div>
            @else
            @role('admin')
                <div class="heading">
                    <h2>No Plan Added</h2>
                    <div class="mt-5">
                        <a class="btn btn-primary" href="{{ route('subscriptions.create') }}">Add Plan</a>
                    </div>
                </div>
                @endrole
            @endif

        </div>
    </section>
    {{-- <section class="section section-lg bg-gray-1">
        <div class="container">
          <h2 class="text-center">Our Restaurant Menu</h2>
          <div class="row">
            <div class="col-12">
              <div class="tabs-custom tabs-horizontal tabs-classic" id="tabs-1">
                <ul class="nav nav-tabs nav-tabs-classic">
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">mains</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab">Desserts</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-toggle="tab">drinks</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="tabs-1-1">
                    <div class="box-event-modern">
                      <div class="event-item-modern">
                        <p class="event-time">$25.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Osso Buco</a></h4>
                        <div class="event-item-modern-text">
                          <p>Osso Buco is one of the Italian greats - slow cooked veal in a white wine tomato sauce. Meltingly tender, this is both hearty and luxurious.</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$16.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Pappardelle Mimmo</a></h4>
                        <div class="event-item-modern-text">
                          <p>This delicious dish tops long, wide pasta with scallops, lobster, asparagus, butter, sage and truffle oil to cater every palate.</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$17.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Trippa Satriano</a></h4>
                        <div class="event-item-modern-text">
                          <p>Thinly sliced herb encrusted ahi tuna topped with diced tomatoes, olives, capers, red onions and fennel. Perfect choice even for the first-time visitors!</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$18.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Filetto Di Manzo</a></h4>
                        <div class="event-item-modern-text">
                          <p>Wonderful combination of prime tenderloin, winter greens, Jerusalem artichoke puree, and oxtail reduction sauce.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tabs-1-2">
                    <div class="box-event-modern">
                      <div class="event-item-modern">
                        <p class="event-time">$20.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Tiramisu</a></h4>
                        <div class="event-item-modern-text">
                          <p>A Pesto’s favorite - classic Italian dessert made with lady fingers, Mascarpone cheese & espresso. Perfect for both kids and adults.</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$6.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Cannoli</a></h4>
                        <div class="event-item-modern-text">
                          <p>Trio tower of cannoli filled with smooth ricotta, sugar & cinnamon, with chocolate & raspberry sauces. Single cannoli is also available.</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$5.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Pistachio Passion</a></h4>
                        <div class="event-item-modern-text">
                          <p>Layered pistachio cream, cream cheese custard & whipped cream atop a rich walnut crust.</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$4.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Chocolate-and-Pistachio Biscotti</a></h4>
                        <div class="event-item-modern-text">
                          <p>At Pesto, we vary these wonderful nutty biscotti, while also dipping them in melted dark chocolate for an extra layer of flavor.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tabs-1-3">
                    <div class="box-event-modern">
                      <div class="event-item-modern">
                        <p class="event-time">$10.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Aperol Spritz</a></h4>
                        <div class="event-item-modern-text">
                          <p>The most popular drink in Venice: refreshing, easygoing &…happy! Perfect to be sipped as an “Aperitivo” just before dinner - delightful!</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$9.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Negroni</a></h4>
                        <div class="event-item-modern-text">
                          <p>Reward yourself with a moment of relaxation & pure pleasure while enjoying the full flavour & simplicity of a Negroni, an iconic Italian cocktail.</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$11.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Negroni Sbagliato</a></h4>
                        <div class="event-item-modern-text">
                          <p>A cocktail for those who prefer more delicate flavours but nonetheless want a drink full of taste & personality.</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$8.89</p>
                        <h4 class="event-item-modern-title"><a href="#">White Peach Bellini</a></h4>
                        <div class="event-item-modern-text">
                          <p>White Peach Bellini is a classic drink from Venice Italy of white peach purée and Prosecco. It is one of our most popular drinks at Pesto.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> --}}
    {{-- <section class="section">
        <div class="row isotope-wrap">
          <!-- Isotope Content-->
          <div class="col-lg-12">
            <div class="isotope" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group" data-lg-thumbnail="false">
              <div class="row no-gutters row-condensed">
                <div class="col-12 col-sm-6 col-md-4 isotope-item wow-outer" data-filter="*">
                  <div class="wow slideInDown">
                    <div class="gallery-item-classic"><img src="images/gallery-masonry-1-640x429.jpg" alt="" width="640" height="429"/>
                      <div class="gallery-item-classic-caption"><a href="images/gallery-masonry-1-original.jpg" data-lightgallery="item">zoom</a></div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 isotope-item wow-outer" data-filter="Category 3">
                  <div class="wow slideInDown">
                    <div class="gallery-item-classic"><img src="{{ asset('images/gallery-masonry-2-640x429.jpg')}}" alt="" width="640" height="429"/>
                      <div class="gallery-item-classic-caption"><a href="images/gallery-masonry-2-original.jpg" data-lightgallery="item">zoom</a></div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-4 isotope-item wow-outer" data-filter="Category 3">
                  <div class="wow slideInDown">
                    <div class="gallery-item-classic"><img src="{{ asset('images/gallery-masonry-3-640x429.jpg')}}" alt="" width="640" height="429"/>
                      <div class="gallery-item-classic-caption"><a href="{{ asset('images/gallery-masonry-3-original.jpg')}}" data-lightgallery="item">zoom</a></div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 isotope-item wow-outer" data-filter="Category 3">
                  <div class="wow fadeInUp">
                    <div class="gallery-item-classic"><img src="{{ asset('images/gallery-masonry-4-960x429.jpg')}}" alt="" width="960" height="429"/>
                      <div class="gallery-item-classic-caption"><a href="{{ asset('images/gallery-masonry-4-original.jpg')}}" data-lightgallery="item">zoom</a></div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 isotope-item wow-outer" data-filter="Category 2">
                  <div class="wow fadeInUp">
                    <div class="gallery-item-classic"><img src="{{ asset('images/gallery-masonry-5-960x429.jpg')}}" alt="" width="960" height="429"/>
                      <div class="gallery-item-classic-caption"><a href="images/gallery-masonry-5-original.jpg" data-lightgallery="item">zoom</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> --}}
    {{-- <section class="section-lg bg-default">
        <div class="container wow-outer">
          <h2 class="text-center wow slideInDown">Recent News</h2>
          <!-- Owl Carousel-->
          <div class="owl-carousel wow fadeInUp" data-items="1" data-md-items="2" data-lg-items="3" data-dots="true" data-nav="false" data-stage-padding="15" data-loop="false" data-margin="30" data-mouse-drag="false">
            <div class="post-corporate"><a class="badge" href="#">Jul 02, 2019</a>
              <h4 class="post-corporate-title"><a href="#">Genuine Italian Pizza: Authenticity and Choice</a></h4>
              <div class="post-corporate-text">
                <p>As an Italian restaurant, we are very proud of our delicious authentic pizzas. Our three most popular choices are the Rustica, the Toscana and...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
            </div>
            <div class="post-corporate"><a class="badge" href="#">Jul 12, 2019</a>
              <h4 class="post-corporate-title"><a href="#">Italian vs. American Spaghetti: Top 5 Differences</a></h4>
              <div class="post-corporate-text">
                <p>Commonly, when we hear there is spaghetti for dinner we will be expecting a red tomato sauce with meat and seasonings poured over long...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
            </div>
            <div class="post-corporate"><a class="badge" href="#">aug 02, 2019</a>
              <h4 class="post-corporate-title"><a href="#">The Delicious History of Lasagna and Its Origins</a></h4>
              <div class="post-corporate-text">
                <p>Lasagna, could there be a more perfect dish? It’s comfort food on steroids. Layers of cheese generously piled on top of decadent amounts...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
            </div>
            <div class="post-corporate"><a class="badge" href="#">Aug 15, 2019</a>
              <h4 class="post-corporate-title"><a href="#">Making Gelato Like a True Italian: Tips From Our Chef</a></h4>
              <div class="post-corporate-text">
                <p>Most would agree that gelato is the most delicious frozen dessert; the perfect ending to any meal. With origins in Sicily, gelato has been made famous...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
            </div>
            <div class="post-corporate"><a class="badge" href="#">Sep 15, 2019</a>
              <h4 class="post-corporate-title"><a href="#">Italian Ingredients You Can Easily Grow at Home</a></h4>
              <div class="post-corporate-text">
                <p>Imagine preparing an Italian dinner but having to stop cooking because you forget an ingredient and must run to the store. How nice would it be to go...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
            </div>
            <div class="post-corporate"><a class="badge" href="#">Sep 28, 2019</a>
              <h4 class="post-corporate-title"><a href="#">Our Brief Guide to Pairing Wine and Pasta the Right Way</a></h4>
              <div class="post-corporate-text">
                <p>To Italians, pasta is the food of the gods, and there is nothing better to go with a good pasta than a perfect wine. To the uninitiated, finding the right...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
            </div>
            <div class="post-corporate"><a class="badge" href="#">Oct 05, 2019</a>
              <h4 class="post-corporate-title"><a href="#">Top 10 Famous Spring Dishes in Italian Restaurants</a></h4>
              <div class="post-corporate-text">
                <p>Spring is the time for growth and rebirth. One can see this throughout the countrysides of Italy with blooming flowers and budding trees. Springtime is...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
            </div>
            <div class="post-corporate"><a class="badge" href="#">Oct 17, 2019</a>
              <h4 class="post-corporate-title"><a href="#">What Makes Some Seasonings Truly Italian?</a></h4>
              <div class="post-corporate-text">
                <p>When thinking of Italian cuisine, dishes like pasta enveloped in hearty sauces come to mind. Certain flavors seem to be found across the different...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
            </div>
            <div class="post-corporate"><a class="badge" href="#">Nov 10, 2019</a>
              <h4 class="post-corporate-title"><a href="#">Types of Italian Sausage and Why They Are Different</a></h4>
              <div class="post-corporate-text">
                <p>There are many types of Italian sausage. The main difference in Italian sausage when compared to other sausages is the seasoning. The particular...</p>
              </div><a class="post-corporate-link" href="#">Read more<span class="icon linearicons-arrow-right"></span></a>
            </div>
          </div>
        </div>
      </section> --}}
    <!-- Page Footer-->
    <footer class="section footer-minimal context-dark">
        <div class="container wow-outer">
            <div class="wow fadeIn">
                <div class="row row-60">
                    <div class="col-12"><a href="index.html">DigiMenus</a></div>
                    <div class="col-12">
                        <ul class="social-list">
                            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-facebook"
                                    href="#"></a></li>
                            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-instagram"
                                    href="#"></a></li>
                            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-twitter"
                                    href="#"></a></li>
                            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-youtube-play"
                                    href="#"></a></li>
                            <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-pinterest-p"
                                    href="#"></a></li>
                        </ul>
                    </div>
                </div>
                <p class="rights"><span>&copy;&nbsp; </span><span
                        class="copyright-year"></span><span>&nbsp;</span><span>DigiMenu</span><span>.&nbsp;</span><span>All
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
