<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->

<head>
    <title>Pressroom - world's news</title>
    <!--meta-->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.2"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="keywords" content="Medic, Medical Center"/>
    <meta name="description" content="Responsive Medical Health Template"/>
    <!--style-->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/style/reset.css">
    <link rel="stylesheet" type="text/css" href="/style/superfish.css">
    <link rel="stylesheet" type="text/css" href="/style/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="/style/jquery.qtip.css">
    <link rel="stylesheet" type="text/css" href="/style/style.css">
    <link rel="stylesheet" type="text/css" href="/style/menu_styles.css">
    <link rel="stylesheet" type="text/css" href="/style/animations.css">
    <link rel="stylesheet" type="text/css" href="/style/responsive.css">
    <link rel="stylesheet" type="text/css" href="/style/odometer-theme-default.css">
    <!--<link rel="stylesheet" type="text/css" href="style/dark_skin.css">-->
    <!--<link rel="stylesheet" type="text/css" href="style/high_contrast_skin.css">-->
    <link rel="shortcut icon" href="/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{ url('/style/custom.css') }}">

    <!-- font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>

<body class="">
<div class="site_container">


    <div class="header_container">
        <div class="header clearfix">
            <div class="logo">
                <h1><a href="{{ route('main') }}" title="Pressroom">Pressroom</a></h1>
                <h4>{{ __('News web site') }}</h4>
            </div>
        </div>
    </div>

    <div class="menu_container clearfix">
        <nav>
            <ul class="sf-menu">
                <li class="submenu">
                    <a href="{{route('main')}}" title="Home">
                        {{ __('Home') }}
                    </a>
                </li>
                <li class="submenu">
                    <a href="{{route('about')}}" title="Pages">
                        {{ __('About us') }}
                    </a>
                </li>
                <li class="submenu">
                    <a href="{{route('blog')}}" title="Blog">
                        {{ __('Blog') }}
                    </a>
                </li>
                <li class="submenu">
                    <a href="{{route('authors')}}" title="Authors">
                        {{ __('Authors') }}
                    </a>
                </li>
                <li class="submenu">
                    <a href="{{route('contact')}}" title="Contact">
                        {{__('Contact')}}
                    </a>
                </li>
                <li class="submenu">
                    <a href="#" title="Pages">
                        {{ $current_locale }}
                    </a>
                    <ul>
                        @foreach($all_locales as $locale)
                            <li>
                                <a href="{{ route('change_lang', ['locale' => $locale]) }}">
                                    {{ $locale }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>


                <li class="submenu">
                    <a href="#">
                        @if(auth()->user())
                            {{ auth()->user()->name }}
                        @endif
                        <i class="far fa-user"></i>
                    </a>
                    <ul>
                        @if(! auth()->user())
                            <li>
                                <a href="{{ route('login') }}" title="Home Style 1">
                                    {{__('Log In')}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" title="Home Style 2">
                                    {{__('Sign Up')}}
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('post.create') }}" title="Home Style 1">
                                    {{__('Create Post')}}
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="mobile_menu_container">
            <a href="#" class="mobile-menu-switch">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </a>
            <div class="mobile-menu-divider"></div>
            <nav>
                <ul class="mobile-menu">
                    <li class="submenu">
                        <a href="{{route('main')}}" title="Home">
                            Home
                        </a>
                    </li>
                    <li class="submenu">
                        <a href="{{'about'}}" title="Pages">
                            About us
                        </a>
                    </li>

                    <li class="submenu">
                        <a href="{{route('blog')}}" title="Blog">
                            Blog
                        </a>
                    </li>
                    <li class="submenu">
                        <a href="{{route('authors')}}" title="Authors">
                            Authors
                        </a>
                    </li>

                    <li class="submenu">
                        <a href="{{route('contact')}}" title="Contact">
                            Contact
                        </a>
                    </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="far fa-user"></i>
                        </a>
                        <ul>
                            @if(! auth()->user())
                                <li>
                                    <a href="{{ route('login') }}" title="Home Style 1">
                                        Log In
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}" title="Home Style 2">
                                        Sign Up
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}" title="Home Style 1">
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </li>

                </ul>

            </nav>

        </div>
    </div>


    {{ $slot }}


    <div class="footer_container">
        <div class="footer clearfix">
            <div class="row">
                <div class="column column_1_3">
                    <h4 class="box_header">About PressRoom</h4>
                    <p class="padding_top_bottom_25">Maecenas mauris elementum, est morbi interdum cursus at elite
                        imperdiet
                        libero. Proin odios dapibus integer an nulla augue pharetra cursus.</p>
                    <div class="row">
                        <div class="column column_1_2">
                            <h5>PressRoom Ltd.</h5>
                            <p>
                                33 Farlane Street<br>
                                25-100 Keilor East,<br>
                                Australia
                            </p>
                        </div>
                        <div class="column column_1_2">
                            <h5>Phone &amp; Fax</h5>
                            <p>
                                Phone: 1-800-64-38<br>
                                Fax: 1-800-64-39
                            </p>
                        </div>
                    </div>
                    <h4 class="box_header page_margin_top">Get In Touch With Us</h4>
                    <ul class="social_icons dark page_margin_top clearfix">
                        <li>
                            <a target="_blank" title="" href="https://facebook.com/QuanticaLabs"
                               class="social_icon facebook">
                                &nbsp;
                            </a>
                        </li>
                        <li>
                            <a target="_blank" title="" href="https://twitter.com/QuanticaLabs"
                               class="social_icon twitter">
                                &nbsp;
                            </a>
                        </li>
                        <li>
                            <a title=""
                               href="https://quanticalabs.com/cdn-cgi/l/email-protection#f3909c9d87929087b38381968080819c9c9edd909c9e"
                               class="social_icon mail">
                                &nbsp;
                            </a>
                        </li>
                        <li>
                            <a title="" href="#" class="social_icon skype">
                                &nbsp;
                            </a>
                        </li>
                        <li>
                            <a title="" href="https://1.envato.market/quanticalabs" class="social_icon envato">
                                &nbsp;
                            </a>
                        </li>
                        <li>
                            <a title="" href="#" class="social_icon instagram">
                                &nbsp;
                            </a>
                        </li>
                        <li>
                            <a title="" href="#" class="social_icon pinterest">
                                &nbsp;
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="column column_1_3">
                    <h4 class="box_header">Latest Posts</h4>
                    <div class="vertical_carousel_container clearfix">
                        <ul
                            class="blog small vertical_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
                            <li class="post">
                                <a href="indexba02.html?page=post_gallery"
                                   title="Study Linking Illnes and Salt Leaves Researchers Doubtful">
                                    <span class="icon small gallery"></span>
                                    <img src='/images/samples/100x100/image_06.jpg' alt='img'>
                                </a>
                                <div class="post_content">
                                    <h5>
                                        <a href="indexba02.html?page=post_gallery"
                                           title="Study Linking Illnes and Salt Leaves Researchers Doubtful">Study
                                            Linking Illnes and Salt
                                            Leaves Researchers Doubtful</a>
                                    </h5>
                                    <ul class="post_details simple">
                                        <li class="category"><a href="indexdced.html?page=category&amp;cat=health"
                                                                title="HEALTH">HEALTH</a></li>
                                        <li class="date">
                                            10:11 PM, Feb 02
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="post">
                                <a href="indexb878.html?page=post"
                                   title="Syrian Civilians Trapped For Months Continue To Be Evacuated">
                                    <img src='/images/samples/100x100/image_12.jpg' alt='img'>
                                </a>
                                <div class="post_content">
                                    <h5>
                                        <a href="indexb878.html?page=post"
                                           title="Syrian Civilians Trapped For Months Continue To Be Evacuated">Syrian
                                            Civilians Trapped
                                            For Months Continue To Be Evacuated</a>
                                    </h5>
                                    <ul class="post_details simple">
                                        <li class="category"><a href="index7855.html?page=category&amp;cat=world"
                                                                title="WORLD">WORLD</a>
                                        </li>
                                        <li class="date">
                                            10:11 PM, Feb 02
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="post">
                                <a href="indexb878.html?page=post" title="Built on Brotherhood, Club Lives Up to Name">
                                    <img src='/images/samples/100x100/image_02.jpg' alt='img'>
                                </a>
                                <div class="post_content">
                                    <h5>
                                        <a href="indexb878.html?page=post"
                                           title="Built on Brotherhood, Club Lives Up to Name">Built on
                                            Brotherhood, Club Lives Up to Name</a>
                                    </h5>
                                    <ul class="post_details simple">
                                        <li class="category"><a href="index5d3d.html?page=category&amp;cat=sports"
                                                                title="SPORTS">SPORTS</a></li>
                                        <li class="date">
                                            10:11 PM, Feb 02
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="post">
                                <a href="indexb878.html?page=post" title="Nuclear Fusion Closer to Becoming a Reality">
                                    <img src='/images/samples/100x100/image_13.jpg' alt='img'>
                                </a>
                                <div class="post_content">
                                    <h5>
                                        <a href="indexb878.html?page=post"
                                           title="Nuclear Fusion Closer to Becoming a Reality">Nuclear
                                            Fusion Closer to Becoming a Reality</a>
                                    </h5>
                                    <ul class="post_details simple">
                                        <li class="category"><a href="indexdd47.html?page=category&amp;cat=science"
                                                                title="SCIENCE">SCIENCE</a></li>
                                        <li class="date">
                                            10:11 PM, Feb 02
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="column column_1_3">
                    <h4 class="box_header">Latest Galleries</h4>
                    <div class="horizontal_carousel_container big page_margin_top">
                        <ul
                            class="blog horizontal_carousel visible-1 autoplay-0 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
                            <li class="post">
                                <a href="indexba02.html?page=post_gallery"
                                   title="Struggling Nuremberg Sack Coach Verbeek">
                                    <span class="icon gallery"></span>
                                    <img src='/images/samples/330x242/image_03.jpg' alt='img'>
                                </a>
                                <h5 class="with_number">
                                    <a href="indexba02.html?page=post_gallery"
                                       title="Struggling Nuremberg Sack Coach Verbeek">Struggling Nuremberg Sack Coach
                                        Verbeek</a>
                                    <a class="comments_number" href="indexba02.html?page=post_gallery#comments_list"
                                       title="2 comments">2<span class="arrow_comments"></span></a>
                                </h5>
                                <ul class="post_details simple">
                                    <li class="category"><a href="index5d3d.html?page=category&amp;cat=sports"
                                                            title="SPORTS">SPORTS</a>
                                    </li>
                                    <li class="date">
                                        10:11 PM, Feb 02
                                    </li>
                                </ul>
                            </li>
                            <li class="post">
                                <a href="indexba02.html?page=post_gallery"
                                   title="Built on Brotherhood, Club Lives Up to Name">
                                    <span class="icon gallery"></span>
                                    <img src='/images/samples/330x242/image_14.jpg' alt='img'>
                                </a>
                                <h5 class="with_number">
                                    <a href="indexba02.html?page=post_gallery"
                                       title="Built on Brotherhood, Club Lives Up to Name">Built
                                        on Brotherhood, Club Lives Up to Name</a>
                                    <a class="comments_number" href="indexba02.html?page=post_gallery#comments_list"
                                       title="2 comments">2<span class="arrow_comments"></span></a>
                                </h5>
                                <ul class="post_details simple">
                                    <li class="category"><a href="index5d3d.html?page=category&amp;cat=sports"
                                                            title="SPORTS">SPORTS</a>
                                    </li>
                                    <li class="date">
                                        10:11 PM, Feb 02
                                    </li>
                                </ul>
                            </li>
                            <li class="post">
                                <a href="indexba02.html?page=post_gallery"
                                   title="New Painkiller Rekindles Addiction Concerns">
                                    <span class="icon gallery"></span>
                                    <img src='/images/samples/330x242/image_04.jpg' alt='img'>
                                </a>
                                <h5 class="with_number">
                                    <a href="indexba02.html?page=post_gallery"
                                       title="New Painkiller Rekindles Addiction Concerns">New
                                        Painkiller Rekindles Addiction Concerns</a>
                                    <a class="comments_number" href="indexba02.html?page=post_gallery#comments_list"
                                       title="2 comments">2<span class="arrow_comments"></span></a>
                                </h5>
                                <ul class="post_details simple">
                                    <li class="category"><a href="index5d3d.html?page=category&amp;cat=sports"
                                                            title="SPORTS">SPORTS</a>
                                    </li>
                                    <li class="date">
                                        10:11 PM, Feb 02
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row page_margin_top_section">
                <div class="column column_3_4">
                    <ul class="footer_menu">
                        <li>
                            <h4><a href="index7855.html?page=category&amp;cat=world" title="World">World</a></h4>
                        </li>
                        <li>
                            <h4><a href="indexdced.html?page=category&amp;cat=health" title="Health">Health</a></h4>
                        </li>
                        <li>
                            <h4><a href="index5d3d.html?page=category&amp;cat=sports" title="Sports">Sports</a></h4>
                        </li>
                        <li>
                            <h4><a href="indexdd47.html?page=category&amp;cat=science" title="Science">Science</a></h4>
                        </li>
                        <li>
                            <h4><a href="indexd5f0.html?page=category&amp;cat=lifestyle" title="Lifestyle">Lifestyle</a>
                            </h4>
                        </li>
                    </ul>
                </div>
                <div class="column column_1_4">
                    <a class="scroll_top" href="#top" title="Scroll to top">Top</a>
                </div>
            </div>
            <div class="row copyright_row">
                <div class="column column_2_3">
                    © Copyright <a href="https://quanticalabs.com/" title="QuanticaLabs"
                                   target="_blank">QuanticaLabs</a> -
                    PressRoom Template. <a
                        href="https://1.envato.market/c/296919/275988/4415?u=https://themeforest.net/cart/add_items?item_ids=9066845&amp;ref=QuanticaLabs"
                        title="PressRoom Template" target="_blank">Click here to buy it</a>
                </div>
                <div class="column column_1_3">
                    <ul class="footer_menu">
                        <li>
                            <h6><a href="index171c.html?page=about" title="About">About</a></h6>
                        </li>
                        <li>
                            <h6><a href="indexde65.html?page=authors" title="Authors">Authors</a></h6>
                        </li>
                        <li>
                            <h6><a href="index53a6.html?page=contact" title="Contact Us">Contact Us</a></h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="background_overlay"></div>
<!--js-->
<script data-cfasync="false" src="/../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="/js/jquery.ba-bbq.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.12.1.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.easing.1.4.1.min.js"></script>
<script type="text/javascript" src="/js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script type="text/javascript" src="/js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="/js/jquery.transit.min.js"></script>
<script type="text/javascript" src="/js/jquery.sliderControl.js"></script>
<script type="text/javascript" src="/js/jquery.timeago.js"></script>
<script type="text/javascript" src="/js/jquery.hint.js"></script>
<script type="text/javascript" src="/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="/js/jquery.qtip.min.js"></script>
<script type="text/javascript" src="/js/jquery.blockUI.js"></script>
<script type="text/javascript" src="/js/jquery.imagesloaded-packed.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/odometer.min.js"></script>
<link rel="stylesheet" type="text/css" href="/style_selector/style_selector.css">
<script type="text/javascript" src="/style_selector/style_selector.js"></script>


</body>


</html>
