<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="wide wow-animation">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="icon" href="{{ asset('assets/images/favicon.ico" type="image/x-icon')}}">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:300,300i,400,500,600,700,800,900,900i%7CPT+Serif:400,700">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/fonts.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
    </head>
    <body class="antialiased bg-dark">
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
                          @role('admin|owner')
                          <li class="rd-nav-item"><a class="rd-nav-link" href="{{ url('/subscriptions') }}">Plans</a>
                          </li>
                          @endrole
                         
                         
                          @if (Route::has('login'))
                          @auth
                         @role('admin')
                         <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('Admin')}}">Dashboard</a>
                         </li>
                         @endrole
                         @role('owner')
                         <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('Admin')}}">Dashboard</a>
                         </li>
                         @endrole
                          <li class="rd-nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input  type="submit" value="Log Out">
                            </form>
                            
                          </li>
                         
                        @else
                            <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('login') }}">Log in</a>
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
<section style="background: grey" class="">
          <div class="container">
            <div class="text-center">
            <h1>{{ $restaurant->name }}</h1>
            <h2>{{ $restaurant->location }}</h2>
            <h3>{{ $restaurant->open_at }}-{{ $restaurant->close_at }}</h3>
            </div>
        
            @foreach ($menus as $menu)
                <div class="card my-3">
                    <div class="card-header">
                        {{ $menu->title }}
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($articles[$menu->id] as $article)
                                <li class="list-group-item">
                                    {{ $article->Title }}  - {{ $article->Price }} DH
                                    <br>
                                    {{ $article->Content }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer mx-auto">
                      
                        {!! $menu->QRCode !!}
                    </div>
                </div>
            @endforeach
        </div>
        
    </section>
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
                <p class="rights"><span>&copy;&nbsp; </span><span class="copyright-year"></span><span>&nbsp;</span><span>DigiMenu</span><span>.&nbsp;</span><span>All Rights Reserved.</span><span>&nbsp;</span><a href="#">Privacy Policy</a>. Design&nbsp;by&nbsp;</p>
              </div>
            </div>
          </footer>
        </div>
        {{-- <div class="snackbars" id="form-output-global"></div> --}}
        <script src="{{ asset('assets/js/core.min.js')}}"></script>
        <script src="{{ asset('assets/js/script.js')}}"></script>
      
      </body>
        
    </html>