<?php use App\Pages; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Treasury Project @yield('title')</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <!-- Fonts END -->

  <!-- Global styles START -->          
  {!! Html::style("assets/global/plugins/font-awesome/css/font-awesome.min.css") !!}
  {!! Html::style("assets/global/plugins/bootstrap/css/bootstrap.min.css") !!}
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  {!! Html::style("assets/global/plugins/fancybox/source/jquery.fancybox.css") !!}
  {!! Html::style("assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css") !!}
  {!! Html::style("assets/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css") !!}
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  {!! Html::style("assets/global/css/components.css") !!}
  {!! Html::style("assets/frontend/layout/css/style.css") !!}
  {!! Html::style("assets/frontend/pages/css/style-revolution-slider.css") !!}<!-- metronic revo slider styles -->
  {!! Html::style("assets/frontend/layout/css/style-responsive.css") !!}
  {!! Html::style("assets/frontend/layout/css/themes/red.css") !!}
  {!! Html::style("assets/frontend/layout/css/custom.css") !!}
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">
<div id="preloader" class="preloader hidden" style="position:fixed">
<div id="status" class="hidden"><h1 style="color:red">Loading...</h1><br>&nbsp;</div>
</div>
    <!-- BEGIN STYLE CUSTOMIZER -->
    
    <!-- END BEGIN STYLE CUSTOMIZER --> 

    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>+1 456 6717</span></li>
                        <li><i class="fa fa-envelope-o"></i><span>info@keenthemes.com</span></li>
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                      @if(Auth::client()->check())
                        <li>
                          <a href="{!! Url('/') !!}/dashboard">{!! Auth::client()->get()->firstname !!}</a> (<a href="{!! Url('/') !!}/logout">Logout</a>)
                        </li>
                      @else
                        <li><a href="{!! Url('/') !!}/login">Log In</a></li>
                        <li><a href="{!! Url('/') !!}/auth/register">Open an Account</a></li>
                      @endif
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->
    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="index.html">{!! Html::image("assets/frontend/layout/img/logos/logo-corp-red.png") !!}</a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
        <?php $pages = Pages::where('ct_id',0)->orderby('sort')->get(); ?>
        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">
          <ul>
            <li class="{{ Request::is('/*') ? 'active' : '' }}">
              <a href="{!! Url('/') !!}/">Home</a>
            </li>

            <li class="{{ Request::is('securities*') ? 'active' : '' }}">
              <a href="{!! Url('/') !!}/securities">Securities</a>
            </li>
            @foreach($pages as $page)
            <?php $sub = Pages::where('ct_id',$page->id)->orderby('sort')->get(); ?>

            @if(count($sub) == 0)
            <li class="{!! Request::is('page/'.$page->id) ? 'active' : '' !!}">
              <a href="{!! Url('/') !!}/page/{!! $page->id !!}">{!! $page->name !!}</a>
            </li>
            @else
            <li class="dropdown {!! Request::is('page/'.$page->id) ? 'active' : '' !!} {!! Request::is('page/'.$page->id.'/*') ? 'active' : '' !!}">
              <a  href="{!! Url('/') !!}/page/{!! $page->id !!}">
                {!! $page->name !!} 
              </a>
                
              <ul class="dropdown-menu">
                @foreach($sub as $sp)
                  <li class="{!! Request::is('page/'.$page->id.'/'.$sp->id) ? 'active' : '' !!}"><a href="{!! Url('/') !!}/page/{!! $page->id !!}/{!! $sp->id !!}">{!! $sp->name !!}</a></li>
                @endforeach
              </ul>
            </li>
            @endif

            @endforeach
            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="#">
                  <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->
   
    @yield('content')
    
    <!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN BOTTOM ABOUT BLOCK -->
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2>About us</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat.</p>

            <div class="photo-stream">
              <h2>Photos Stream</h2>
              <ul class="list-unstyled">
                <li><a href="javascript:;">{!! Html::image("assets/frontend/pages/img/people/img5-small.jpg") !!}</a></li>
                <li><a href="javascript:;">{!! Html::image("assets/frontend/pages/img/works/img1.jpg") !!}</a></li>
                <li><a href="javascript:;">{!! Html::image("assets/frontend/pages/img/people/img4-large.jpg") !!}</a></li>
                <li><a href="javascript:;">{!! Html::image("assets/frontend/pages/img/works/img6.jpg") !!}</a></li>
                <li><a href="javascript:;">{!! Html::image("assets/frontend/pages/img/works/img3.jpg") !!}</a></li>
                <li><a href="javascript:;">{!! Html::image("assets/frontend/pages/img/people/img2-large.jpg") !!}</a></li>
                <li><a href="javascript:;">{!! Html::image("assets/frontend/pages/img/works/img2.jpg") !!}</a></li>
                <li><a href="javascript:;">{!! Html::image("assets/frontend/pages/img/works/img5.jpg") !!}</a></li>
                <li><a href="javascript:;">{!! Html::image("assets/frontend/pages/img/people/img5-small.jpg") !!}</a></li>
                <li><a href="javascript:;">{!! Html::image("assets/frontend/pages/img/works/img1.jpg") !!}</a></li>
                <li><a href="javascript:;">{!! Html::image("assets/frontend/pages/img/people/img4-large.jpg") !!}</a></li>
                <li><a href="javascript:;">{!! Html::image("assets/frontend/pages/img/works/img6.jpg") !!}</a></li>
                <li><a href="javascript:;">{!! Html::image("assets/frontend/pages/img/works/img3.jpg") !!}</a></li>
                <li><a href="javascript:;">{!! Html::image("assets/frontend/pages/img/people/img2-large.jpg") !!}</a></li>
                <li><a href="javascript:;">{!! Html::image("assets/frontend/pages/img/works/img2.jpg") !!}</a></li>
              </ul>                    
            </div>
          </div>
          <!-- END BOTTOM ABOUT BLOCK -->

          <!-- BEGIN BOTTOM CONTACTS -->
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2>Our Contacts</h2>
            <address class="margin-bottom-40">
              35, Lorem Lis Street, Park Ave<br>
              California, US<br>
              Phone: 300 323 3456<br>
              Fax: 300 323 1456<br>
              Email: <a href="mailto:info@metronic.com">info@metronic.com</a><br>
              Skype: <a href="skype:metronic">metronic</a>
            </address>

            <div class="pre-footer-subscribe-box pre-footer-subscribe-box-vertical">
              <h2>Newsletter</h2>
              <p>Subscribe to our newsletter and stay up to date with the latest news and deals!</p>
              <form action="#">
                <div class="input-group">
                  <input type="text" placeholder="youremail@mail.com" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <!-- END BOTTOM CONTACTS -->

          <!-- BEGIN TWITTER BLOCK --> 
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2 class="margin-bottom-0">Latest Tweets</h2>
            <a class="twitter-timeline" href="https://twitter.com/twitterapi" data-tweet-limit="2" data-theme="dark" data-link-color="#57C8EB" data-widget-id="455411516829736961" data-chrome="noheader nofooter noscrollbar noborders transparent">Loading tweets by @keenthemes...</a>
          </div>
          <!-- END TWITTER BLOCK -->
        </div>
      </div>
    </div>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-6 col-sm-6 padding-top-10">
            2014 © Metronic Shop UI. ALL Rights Reserved. <a href="javascript:;">Privacy Policy</a> | <a href="javascript:;">Terms of Service</a>
          </div>
          <!-- END COPYRIGHT -->
          <!-- BEGIN PAYMENTS -->
          <div class="col-md-6 col-sm-6">
            <ul class="social-footer list-unstyled list-inline pull-right">
              <li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-dribbble"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-skype"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-github"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-youtube"></i></a></li>
              <li><a href="javascript:;"><i class="fa fa-dropbox"></i></a></li>
            </ul>  
          </div>
          <!-- END PAYMENTS -->
        </div>
      </div>
    </div>
    <!-- END FOOTER -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="../../assets/global/plugins/respond.min.js"></script>
    <![endif]-->
    {!! Html::script("assets/global/plugins/jquery.min.js") !!}
    {!! Html::script("assets/global/plugins/jquery-migrate.min.js") !!}
    {!! Html::script("assets/global/plugins/bootstrap/js/bootstrap.min.js") !!}      
    {!! Html::script("assets/frontend/layout/scripts/back-to-top.js") !!}
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    {!! Html::script("assets/global/plugins/fancybox/source/jquery.fancybox.pack.js") !!}<!-- pop up -->
    {!! Html::script("assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js") !!}<!-- slider for products -->

    <!-- BEGIN RevolutionSlider -->
  
    {!! Html::script("assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.plugins.min.js") !!}
    {!! Html::script("assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js") !!} 
    {!! Html::script("assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js") !!} 
    {!! Html::script("assets/frontend/pages/scripts/revo-slider-init.js") !!}
    <!-- END RevolutionSlider -->

    {!! Html::script("assets/frontend/layout/scripts/layout.js") !!}
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            RevosliderInit.initRevoSlider();
            Layout.initTwitter();
            Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
            Layout.initNavScrolling();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>