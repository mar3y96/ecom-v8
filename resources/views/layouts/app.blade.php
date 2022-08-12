<!DOCTYPE html>
<html lang="en" 
    @if (app()->getLocale()=='ar' && !Request::is('/') && !Request::is('search') && !Request::is('all-products') && !Request::is('wishlist') && !Request::is('search-resault') && !Request::is('products/*') ) dir= 'rtl'@endif>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Home')</title>
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" >
    <link rel="stylesheet" href="{{ asset('site/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('site/css/sweetalert.css') }}">
    @if (app()->getLocale()=='ar')
    <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('site/css/main-rtl.css')}}"> 
    @endif
    @yield('style')
    <style type="text/css">
        @if(!Request::is('/'))
        #navbarSupportedContent{
            position: relative;
        }
        @endif
    </style>
</head>

<body>
    <!--start navbar-->
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('site/image/logo.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-r">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/') }}">{{ trans('site.home') }}<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ Menu::active('about') }} " href="{{ url('about') }}">{{ trans('site.about') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Menu::active('contact') }}" href="{{ url('contact') }}">{{ trans('site.contact') }}</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link {{ Menu::active('login') }}" href="{{ url('login') }}">{{ trans('site.login') }}<span class="sr-only">(current)</span></a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item">
                        <a class="nav-link {{ Menu::active('profile') }}" href="{{ url('profile') }}">{{ trans('site.account') }}</a>
                    </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link {{ Menu::active('search') }} " href="{{ url('search') }}">
                            <img src="{{ asset('site/image/search.svg') }}" alt="search">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Menu::active('wishlist') }}" href="{{ url('wishlist') }}">
                            <img src="{{ asset('site/image/wishlist-menu.svg') }}" alt="wishlist">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Menu::active('cart') }}" href="{{ url('cart') }}">
                            <img src="{{ asset('site/image/cart.svg')}}" alt="cart">
                        </a>
                    </li>
                    <li class="nav-item">
                        @if (app()->getLocale()=='en')
                            <a class="nav-link " href="{{ url('lang/ar') }}">ع</a>
                            @else
                            <a class="nav-link " href="{{ url('lang/en') }}">EN</a>
                        @endif
					</li>
                </ul>
            </div>
        </div>
    </nav>
    <!--end navbar-->
    @yield('content')

    <!--start subscribe-->
    <section class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{ asset('site/image/Mail%20Icon.png') }}">
                                </div>
                                <div class="col-8">
                                    <h5>{{ trans('site.subscribe') }}</h5>
                                    <p>{{ trans('site.subscribeMsg') }}</p>

                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-5">
                                <form action="{{ url('/') }}" method="get" id="subForm">
                                <div class="input-group mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="{{ trans('site.writeEmail') }}" required id="subEmail">
                                    <div class="input-group-append">
                                        <span " class="input-group-text" onclick="$('#subForm').submit();"><img src="{{ asset('site/image/mail-shape.png') }}" ></span>
                                    </div>
                                </div>
                                
                            </form>
                            </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="right-section">
                        <img src="{{ asset('site/image/black%20t-shirt.png') }}" class="img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--end subscribe-->
    <!--start footer-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-4 col-6">
                                <ul class="list-unstyled">
                                    <h4>{{ trans('site.categories') }}</h4>
                                    <li><a href="{{ url('/products/1') }}">{{ trans('site.men') }}</a></li>
                                    <li><a href="{{ url('/products/2') }}">{{ trans('site.women') }}</a></li>
                                    <li><a href="{{ url('/products/3') }}">{{ trans('site.kids') }}</a></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-6">
                                <ul class="list-unstyled">
                                    <h4>{{ trans('site.shotcutLinks') }}</h4>
                                    <li><a href="{{ url('/about') }}">{{ trans('site.about') }}</a></li>
                                    <li><a href="{{ url('/contact')}}">{{ trans('site.contact') }} </a></li>
                                    @auth
                                    <li><a href="{{ url('/home')}}">{{ trans('site.account') }}</a></li>
                                        @else
                                        <li><a href="{{ url('/login') }}">{{ trans('site.login') }}</a></li>
                                    @endauth
                                    <li><a href="{{ url('/cart') }}">{{ trans('site.cart') }}</a></li>
                                    <li><a href="{{ url('/wishlist') }}">{{ trans('site.myWishlist') }}</a></li>
                                    <li><a href="{{ url('/print') }}">{{ trans('site.print') }}</a></li>
                                </ul>

                            </div>
                            <div class="col-md-4">
                                <ul class="list-unstyled">
                                    <h4>{{ trans('site.contact') }}</h4>
                                    <li>{{ trans('site.address') }}:</li>
                                    <li>{{ settings()['address_'.app()->getLocale()] }}</li>
                                    <li>{{ trans('site.phone') }}:</li>
                                    <li>+2{{ settings()->phone }}</li>
                                    <li>{{ trans('site.email') }}:</li>
                                    <li>{{ settings()->site_email }}</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyRight">
                <div class="row">
                    <div class="col-sm-8">
                        <img src="{{ asset('site/image/Footer%20logo.png') }}" class="img-fluid">
                        <span>&copy; {{ trans('site.copyRight') }}</span>
                    </div>
                    <div class="col-sm-4">
                        <img src="{{ asset('site/image/visa-mastercard-logo.png') }}" class="img-fluid visa">
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--end footer-->
    <script src="{{ asset('site/js/jquery.min.js') }}"></script>
    <script src="{{ asset('site/js/propper.js') }}"></script>
    <script src="{{ asset('site/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('site/js/sweetalert.min.js') }}"></script>
    <script>
       $(document).ready(function(){
            let ur = '{{ url('/subscripe/store') }}'
            $('#subForm').on('submit',function(){
                $.ajax({
                    type : 'get',
                    url : `${ur}`,
                    data : $('#subForm').serialize(),
                    success: function(data) {
                        swal ( 
						{
						title: "",
						text: data.data,
						type: "success",
						timer: 3000
						});
                        
                    },
                    error: function(xhr, ajaxOptions, thrownError){
                        $.each(xhr.responseJSON.errors,function(index,v){
                            swal ( 
						{
						title: '',
						text: v,
						type: "error",
						timer: 3000
						});
                        
                        })
                    }
                   
                })
                
                return false;
            })
       }) 
    </script>
    @yield('script')
</body>

</html>
