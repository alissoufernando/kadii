<div>
    @section('headerTop')
    <div class="light_skin top-header">
        <div class="container">
            @include('livewire.site.partials.link-auth')
        </div>
    </div>

    @endsection
    @section('headerNav')
    <div class="light_skin main_menu_uppercase">
        <div class="container">
            <nav class="navbar navbar-expand-lg" id="nav_media">
                <a class="navbar-brand" id="link_logo" href="{{route('welcome')}}">
                    <img class="logo_light" id="logo" src="{{asset('assets/site/assets/images/logo_sb_1.png')}}" alt="logo"/>
                    {{-- <img class="logo_dark" id="logo" src="{{asset('assets/site/assets/images/logo_sb_1.png')}}" alt="logo" width="90" height="90" /> --}}
                    {{-- <img class="logo_dark" src="{{asset('assets/site/images/logo_sb_1.png')}}" alt="logo" /> --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center"  id="navbarSupportedContent">
                    @include('livewire.site.partials.navbar-link')
                </div>
                <ul class="navbar-nav attr-nav align-items-center" id="nav_icon">
                    <li><a href="javascript:void(0);" class="nav-link search_trigger"><i
                                class="linearicons-magnifier"></i></a>
                                @include('livewire.site.products.header-search-component')

                    </li>
                    <li class="dropdown cart_dropdown">
                        @livewire('site.products.shopping-cart-count-component')
                    </li>
                    <li class="dropdown cart_dropdown">
                        @livewire('site.products.wish-count-component')
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    @endsection
    <!-- START SECTION BANNER -->
@if($carousel->count() == 0)
    <div class="banner_section full_screen staggered-animation-wrap">
        <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow carousel_style2"
                data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active background_bg overlay_bg_50" data-img-src="{{asset('assets/site/assets/images/bbq2.jpg')}}">
                        <div class="banner_slide_content banner_content_inner">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7 col-md-10">
                                        <div class="banner_content text_white text-center">
                                            <h4 class="mb-3 bg_strip staggered-animation text-uppercase"
                                                data-animation="fadeInDown" data-animation-delay="0.2s">Ihr Holz- und Grillbedarf</h4>
                                            <h1 class="staggered-animation" data-animation="fadeInDown"
                                                data-animation-delay="0.3s">Willkommen !!</h1>
                                            <h3 class="staggered-animation" data-animation="fadeInUp"
                                                data-animation-delay="0.4s"> bei KADII </h3>
                                            <a class="btn btn-white staggered-animation" href="{{ route('site.shop')}}"
                                                data-animation="fadeInUp" data-animation-delay="0.5s">Geschäft</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item background_bg overlay_bg_50" data-img-src="{{asset('assets/site/assets/images/bbq3.jpg')}}">
                        <div class="banner_slide_content banner_content_inner">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7 col-md-10">
                                        <div class="banner_content text_white text-center">
                                            <h4 class="mb-3 bg_strip staggered-animation text-uppercase"
                                                data-animation="fadeInDown" data-animation-delay="0.2s">Ihr Holz- und Grillbedarf</h4>
                                            <h1 class="staggered-animation" data-animation="fadeInDown"
                                                data-animation-delay="0.3s">KADII !!</h1>
                                            <h3 class="staggered-animation" data-animation="fadeInUp"
                                                data-animation-delay="0.4s"> steht Ihnen zur Verfügung, um Ihren Bedarf an Heizwerkzeugen zu decken</h3>
                                            <a class="btn btn-white staggered-animation" href="{{ route('site.shop')}}"
                                                data-animation="fadeInUp" data-animation-delay="0.5s">Geschäft</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item background_bg overlay_bg_50" data-img-src="{{asset('assets/site/assets/images/bois1.jpg')}}">
                        <div class="banner_slide_content banner_content_inner">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7 col-md-10">
                                        <div class="banner_content text_white text-center">
                                            <h4 class="mb-3 bg_strip staggered-animation text-uppercase"
                                                data-animation="fadeInDown" data-animation-delay="0.2s">Ihr Holz- und Grillbedarf</h4>
                                            <h1 class="staggered-animation" data-animation="fadeInDown"
                                                data-animation-delay="0.3s">Unsere Holzkohlepellets !!</h1>
                                            <h3 class="staggered-animation" data-animation="fadeInUp"
                                                data-animation-delay="0.4s">Finden Sie bei uns die besten Kohlepellets</h3>
                                            <a class="btn btn-white staggered-animation" href="{{ route('site.shop')}}"
                                                data-animation="fadeInUp" data-animation-delay="0.5s">Geschäft</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item background_bg overlay_bg_50" data-img-src="{{asset('assets/site/assets/images/bois.jpg')}}">
                        <div class="banner_slide_content banner_content_inner">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7 col-md-10">
                                        <div class="banner_content text_white text-center">
                                            <h4 class="mb-3 bg_strip staggered-animation text-uppercase"
                                                data-animation="fadeInDown" data-animation-delay="0.2s">Ihr Holz- und Grillbedarf</h4>
                                            <h1 class="staggered-animation" data-animation="fadeInDown"
                                                data-animation-delay="0.3s">Willkommen !!</h1>
                                            <h3 class="staggered-animation" data-animation="fadeInUp"
                                                data-animation-delay="0.4s">Wenn es um Zuverlässigkeit geht, sind wir für Sie da.Vertraue uns !!!
                                            </h3>
                                            <a class="btn btn-white staggered-animation" href="{{ route('site.shop')}}"
                                                data-animation="fadeInUp" data-animation-delay="0.5s">Geschäft</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item background_bg overlay_bg_50" data-img-src="{{asset('assets/site/assets/images/bbq6.jpeg')}}">
                        <div class="banner_slide_content banner_content_inner">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7 col-md-10">
                                        <div class="banner_content text_white text-center">
                                            <h4 class="mb-3 bg_strip staggered-animation text-uppercase"
                                                data-animation="fadeInDown" data-animation-delay="0.2s">Ihr Holz- und Grillbedarf</h4>
                                            <h1 class="staggered-animation" data-animation="fadeInDown"
                                                data-animation-delay="0.3s"> </h1>
                                            <h3 class="staggered-animation" data-animation="fadeInUp"
                                                data-animation-delay="0.4s"> Das Beste, wir
                                            </h3>
                                            <a class="btn btn-white staggered-animation" href="{{ route('site.shop')}}"
                                                data-animation="fadeInUp" data-animation-delay="0.5s">Geschäft</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item background_bg overlay_bg_50" data-img-src="{{asset('assets/site/assets/images/barbecue.jpg')}}">
                        <div class="banner_slide_content banner_content_inner">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7 col-md-10">
                                        <div class="banner_content text_white text-center">
                                            <h4 class="mb-3 bg_strip staggered-animation text-uppercase"
                                                data-animation="fadeInDown" data-animation-delay="0.2s">Ihr Holz- und Grillbedarf</h4>
                                            <h1 class="staggered-animation" data-animation="fadeInDown"
                                                data-animation-delay="0.3s">Es wissen !!</h1>
                                            <h3 class="staggered-animation" data-animation="fadeInUp"
                                                data-animation-delay="0.4s">
                                                Wir sind bereit, all Ihre Grill-, Brennholz- und Generatorbedürfnisse zu erfüllen.
                                            </h3>
                                            <a class="btn btn-white staggered-animation" href="{{ route('site.shop')}}"
                                                data-animation="fadeInUp" data-animation-delay="0.5s">Geschäft</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev"><i
                        class="ion-chevron-left"></i></a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next"><i
                        class="ion-chevron-right"></i></a>
            </div>
    </div>

@else
<div class="banner_section full_screen staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow carousel_style2" data-bs-ride="carousel">
        <div class="carousel-inner">
                <div class="carousel-item active background_bg overlay_bg_50" data-img-src="{{ asset('storage') }}/{{ $carousels->image[0] }}">
                    <div class="banner_slide_content banner_content_inner">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 col-md-10">
                                    <div class="banner_content text_white text-center">
                                        <h4 class="mb-3 staggered-animation font-weight-light"
                                            data-animation="fadeInDown" data-animation-delay="0.2s">{{ $carousels->subtitle[0]}}</h4>
                                        <h1 class="staggered-animation" data-animation="fadeInDown"
                                            data-animation-delay="0.3s">{{ $carousels->title[0]}}</h1>
                                        <h3 class="staggered-animation" data-animation="fadeInUp"
                                            data-animation-delay="0.4s">{{ $carousels->text[0]}}</h3>
                                        <a class="btn btn-white staggered-animation" href="{{ route('site.shop')}}"
                                            data-animation="fadeInUp" data-animation-delay="0.4s">Geschäft</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @foreach ($carousel as $carousels)
                    <div class="carousel-item background_bg overlay_bg_50" data-img-src="{{ asset('storage') }}/{{ $carousels->image }}">
                        <div class="banner_slide_content banner_content_inner">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7 col-md-10">
                                        <div class="banner_content text_white text-center">
                                            <h4 class="mb-3 staggered-animation font-weight-light"
                                                data-animation="fadeInDown" data-animation-delay="0.2s">{{ $carousels->subtitle}}</h4>
                                            <h1 class="staggered-animation" data-animation="fadeInDown"
                                                data-animation-delay="0.3s">{{ $carousels->title}}</h1>
                                            <h3 class="staggered-animation" data-animation="fadeInUp"
                                                data-animation-delay="0.4s">{{ $carousels->text}}</h3>
                                            <a class="btn btn-white staggered-animation" href="{{ route('site.shop')}}"
                                                data-animation="fadeInUp" data-animation-delay="0.4s">Geschäft</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev"><i
                        class="ion-chevron-left"></i></a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next"><i
                        class="ion-chevron-right"></i></a>
            </div>
    </div>
@endif
    <!-- END SECTION BANNER -->

    <!-- END MAIN CONTENT -->
    <div wire:ignore class="main_content">

        <!-- START SECTION CATEGORIES -->
        <div class="section pt-0 small_pb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cat_overlap radius_all_5">
                            <div class="row align-items-center">
                                <div class="col-lg-3 col-md-4">
                                    <div class="text-center text-md-start">
                                        <h4>Unsere Kategorien</h4>
                                        <p class="mb-2">Durchsuchen Sie den Katalog unserer Artikel und finden Sie die, die Sie brauchen.</p>
                                        <a href="{{ route('site.shop')}}" class="btn btn-line-fill btn-sm">Alles sehen</a>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-8">
                                    <div class="cat_slider mt-4 mt-md-0 carousel_slider owl-carousel owl-theme nav_style5"
                                        data-loop="true" data-dots="false" data-nav="true" data-margin="30"
                                        data-responsive='{"0":{"items": "1"}, "380":{"items": "2"}, "991":{"items": "3"}, "1199":{"items": "4"}}'>
                                        @foreach ($category as $categorys)
                                        <div class="item">
                                            <div class="categories_box">
                                                <a href="{{route('site.produit-categorie',['id' => $categorys->id])}}">
                                                    <i class="flaticon-bed"></i>
                                                    <span>{{$categorys->name}}</span>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION CATEGORIES -->

        <!-- START SECTION SHOP -->
        <div  class="section small_pt pb_70">
            <div class="container">
                @if (Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="heading_s4 text-center">
                            <h2>Unsere beliebten Produkte</h2>
                        </div>
                        <p class="text-center leads"> </p>
                    </div>
                </div>
                <div class="row shop_container">
                    @php
                        $witems = Cart::instance('wishlist')->content()->pluck('id');
                    @endphp
                   @if ($products)
                   @foreach ($products as $product)

                   <div class="col-lg-3 col-md-4 col-6">
                       <div class="product_box text-center">
                           <div class="div_image product_img">
                               @empty ($product->images->first()->thumbnail)

                                <a href="{{route('site.detail-produit', ['id' => $product->id])}}">
                                    <img src="{{asset('assets/images/product/default.png')}}" alt="{{$product->name}}">
                                </a>
                               @else
                               @php
                                $images = explode(",",$product->images->first()->thumbnail);
                                @endphp
                               <a href="{{route('site.detail-produit', ['id' => $product->id])}}">
                                    <img src="{{asset('storage/galerie')}}/{{$images[0]}}" alt="{{$product->name}}">
                                </a>
                               @endempty
                               <div class="product_action_box">
                                   <ul class="list_none pr_action_btn">
                                       {{-- <li><a href="" class="popup-ajax"><i
                                                   class="icon-shuffle"></i></a></li>
                                       <li><a href="" class="popup-ajax"><i
                                                   class="icon-magnifier-add"></i></a></li> --}}
                                       @if ($witems->contains($product->id))
                                       <li><a href="#" wire:click.prevent ="removeFromWishList({{$product->id}})" ><i class="icon-heart" style="background-color: red;"></i></a></li>
                                       @else
                                       <li><a href="#" wire:click.prevent ="addToWishlist({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"><i class="icon-heart"></i></a></li>
                                       @endif
                                   </ul>
                               </div>
                           </div>
                           <div class="product_info">
                               <h6 class="product_title"><a href="{{route('site.detail-produit', ['id' => $product->id])}}">{{$product->name}}</a></h6>
                               <div class="product_price">
                                   <span class="price">{{$product->sale_price}} {{ $devise_price }}</span>
                                   <del>{{$product->normal_price}} {{ $devise_price }}</del>
                               </div>
                               <!--<div class="rating_wrap">
                                   <div class="rating">
                                       <div class="product_rate" style="width:80%"></div>
                                   </div>
                                   <span class="rating_num">(21)</span>
                               </div>--->
                               <div class="pr_desc">
                                   <p>{{$product->description}}</p>
                               </div>
                               <div class="add-to-cart">
                                   <a href="#" wire:click.prevent ="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})" class="btn btn-fill-out btn-radius btn-sm"><i class="icon-basket-loaded"></i>
                                       Hinzufügen</a>
                               </div>
                           </div>
                       </div>
                   </div>
                   @endforeach
                   @else
                   <p>Kein Produkt in der Datenbank</p>

                   @endif

                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->

        <!-- START SECTION BANNER -->
        @if ($sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
        {{-- @foreach ($carousel as $carousels) --}}

        <div class="section background_bg" data-img-src="{{asset('assets/site/assets/images/bsale.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-9">
                        <div class="furniture_banner">
                            <h3 class="single_bn_title">Big Sale Deal</h3>
                            <h4 class="single_bn_title1 text_default">Sale 40% Off</h4>
                            <div class="countdown_time countdown_style3 mb-4" data-time="{{Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:m:s')  }}"></div>
                            <a href="{{ route('site.shop') }}" class="btn btn-fill-out">Geschäft</a>
                            <div class="newsletter_form2 mt-5">
                                <form method="post">
                                    <div class="form-group mb-3">
                                        <input name="email" required="" type="email" class="form-control"
                                            placeholder="Geben sie ihre E-Mail Adresse ein">
                                        <button class="btn btn-fill-out text-uppercase" title="Subscribe"
                                            type="submit">Abonnieren</button>
                                    </div>
                                    <div class="form-group">
                                        <small> Um die neuesten Angebote und Rabatte aus dem Shop zu erhalten. </small>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- @endforeach --}}
        @endif
        <!-- END SECTION BANNER -->

        <!-- START SECTION SHOP -->
        <div class="section pb_20">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="heading_s4 text-center">
                            <h2>Unsere neusten Produkte</h2>
                        </div>
                        <p class="text-center leads"> </p>
                    </div>
                </div>
                <div class="row shop_container">
                    @php
                        $witems = Cart::instance('wishlist')->content()->pluck('id');
                    @endphp
                   @if ($products_latest)
                   @foreach ($products_latest as $products_latests)

                   <div class="col-lg-3 col-md-4 col-6">
                       <div class="product_box text-center">
                           <div class="div_image product_img">
                               @empty ($products_latests->images->first()->thumbnail)

                                <a href="{{route('site.detail-produit', ['id' => $products_latests->id])}}">
                                    <img src="{{asset('assets/images/product/default.png')}}" alt="{{$products_latests->name}}">
                                </a>
                               @else
                               @php
                                $images = explode(",",$products_latests->images->first()->thumbnail);
                                @endphp
                               <a href="{{route('site.detail-produit', ['id' => $products_latests->id])}}">
                                    <img src="{{asset('storage/galerie')}}/{{$images[0]}}" alt="{{$products_latests->name}}">
                                </a>
                               @endempty
                               <div class="product_action_box">
                                   <ul class="list_none pr_action_btn">
                                       {{-- <li><a href="" class="popup-ajax"><i
                                                   class="icon-shuffle"></i></a></li>
                                       <li><a href="" class="popup-ajax"><i
                                                   class="icon-magnifier-add"></i></a></li> --}}
                                       @if ($witems->contains($products_latests->id))
                                       <li><a href="#" wire:click.prevent ="removeFromWishList({{$products_latests->id}})" ><i class="icon-heart" style="background-color: red;"></i></a></li>
                                       @else
                                       <li><a href="#" wire:click.prevent ="addToWishlist({{$products_latests->id}},'{{$products_latests->name}}',{{$products_latests->sale_price}})"><i class="icon-heart"></i></a></li>
                                       @endif
                                   </ul>
                               </div>
                           </div>
                           <div class="product_info">
                               <h6 class="product_title"><a href="{{route('site.detail-produit', ['id' => $products_latests->id])}}">{{$products_latests->name}}</a></h6>
                               <div class="product_price">
                                   <span class="price">{{number_format($products_latests->sale_price,2,"."," ")}} {{ $devise_price }}</span>
                                   <del>{{$products_latests->normal_price}} {{ $devise_price }}</del>
                               </div>
                               <!--<div class="rating_wrap">
                                   <div class="rating">
                                       <div class="product_rate" style="width:80%"></div>
                                   </div>
                                   <span class="rating_num">(21)</span>
                               </div>--->
                               <div class="pr_desc">
                                   <p>{{$products_latests->description}}</p>
                               </div>
                               <div class="add-to-cart">
                                   <a href="#" wire:click.prevent ="store({{$products_latests->id}},'{{$products_latests->name}}',{{$products_latests->sale_price}})" class="btn btn-fill-out btn-radius btn-sm"><i class="icon-basket-loaded"></i>
                                       Hinzufügen</a>
                               </div>
                           </div>
                       </div>
                   </div>
                   @endforeach
                   @else
                   <p>Keine Daten in der Datenbank</p>

                   @endif

                </div>
                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="product_slider carousel_slider owl-carousel owl-theme nav_style5" data-loop="true"
                            data-dots="false" data-nav="true" data-margin="30"
                            data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                            @php
                            $witems = Cart::instance('wishlist')->content()->pluck('id');

                            @endphp
                           @if ($products_latest)
                           @foreach ($products_latest as $products_latests)

                           <div class="col-lg-3  col-6 item">
                               <div class="product_box text-center">
                                   <div class="div_image product_img">
                                       @empty ($products_latests->images->first()->thumbnail)
                                       <a href="{{route('site.detail-produit', ['id' => $products_latests->id])}}">
                                            <img src="{{asset('assets/images/product/default.png')}}" alt="{{$products_latests->name}}">
                                        </a>
                                       @else
                                       @php
                                       $images = explode(",",$products_latests->images->first()->thumbnail);
                                       @endphp
                                       <a href="{{route('site.detail-produit', ['id' => $products_latests->id])}}">
                                        <img src="{{asset('storage/galerie')}}/{{$images[0]}}" alt="{{$products_latests->name}}">
                                        </a>
                                       @endempty
                                       <div class="product_action_box">
                                           <ul class="list_none pr_action_btn">
                                               <li><a href="shop-compare.html" class="popup-ajax"><i
                                                           class="icon-shuffle"></i></a></li>
                                               <li><a href="shop-quick-view.html" class="popup-ajax"><i
                                                           class="icon-magnifier-add"></i></a></li>
                                                           @if ($witems->contains($products_latests->id))
                                                           <li><a href="#" wire:click.prevent ="removeFromWishList({{$products_latests->id}})"><i class="icon-heart" style="background-color: red;"></i></a></li>
                                                           @else
                                                           <li><a href="#" wire:click.prevent ="addToWishlist({{$products_latests->id}},'{{$products_latests->name}}',{{$products_latests->sale_price}})"><i class="icon-heart"></i></a></li>
                                                           @endif
                                           </ul>
                                       </div>
                                   </div>
                                   <div class="product_info">
                                       <h6 class="product_title"><a href="{{route('site.detail-produit', ['id' => $products_latests->id])}}">{{$products_latests->name}}</a></h6>
                                       <div class="product_price">
                                           <span class="price">${{$products_latests->sale_price}}</span>
                                           <del>${{$products_latests->normal_price}}</del>
                                       </div>
                                       <div class="rating_wrap">
                                           <div class="rating">
                                               <div class="product_rate" style="width:80%"></div>
                                           </div>
                                           <span class="rating_num">(21)</span>
                                       </div>
                                       <div class="pr_desc">
                                           <p>{{$products_latests->description}}</p>
                                       </div>
                                       <div class="add-to-cart">
                                           <a href="#" wire:click.prevent ="store({{$products_latests->id}},'{{$products_latests->name}}',{{$products_latests->sale_price}})" class="btn btn-fill-out btn-radius btn-sm"><i class="icon-basket-loaded"></i>
                                               Add To Cart</a>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           @endforeach
                           @else
                            <p>Aucun produit n'est dans la base de données</p>
                           @endif
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- END SECTION SHOP -->

        <!-- START SECTION BLOG -->
        {{-- <div class="section small_pt pb_70">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="heading_s1 text-center">
                            <h2>Latest News</h2>
                        </div>
                        <p class="leads text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore.</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="blog_post blog_style1 box_shadow1">
                            <div class="blog_img">
                                <a href="blog-single.html">
                                    <img src="assets/images/furniture_blog_img1.jpg" alt="furniture_blog_img1">
                                </a>
                            </div>
                            <div class="blog_content bg-white">
                                <div class="blog_text">
                                    <h5 class="blog_title"><a href="blog-single.html">But I must explain to you how all
                                            this mistaken idea</a></h5>
                                    <ul class="list_none blog_meta">
                                        <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                                        <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                                    </ul>
                                    <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                        anything hidden in the text</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog_post blog_style1 box_shadow1">
                            <div class="blog_img">
                                <a href="blog-single.html">
                                    <img src="assets/images/furniture_blog_img2.jpg" alt="furniture_blog_img2">
                                </a>
                            </div>
                            <div class="blog_content bg-white">
                                <div class="blog_text">
                                    <h5 class="blog_title"><a href="blog-single.html">On the other hand we provide
                                            denounce with righteous</a></h5>
                                    <ul class="list_none blog_meta">
                                        <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                                        <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                                    </ul>
                                    <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                        anything hidden in the text</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog_post blog_style1 box_shadow1">
                            <div class="blog_img">
                                <a href="blog-single.html">
                                    <img src="assets/images/furniture_blog_img3.jpg" alt="furniture_blog_img3">
                                </a>
                            </div>
                            <div class="blog_content bg-white">
                                <div class="blog_text">
                                    <h5 class="blog_title"><a href="blog-single.html">Why is a ticket to Lagos so
                                            expensive?</a></h5>
                                    <ul class="list_none blog_meta">
                                        <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                                        <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                                    </ul>
                                    <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                        anything hidden in the text</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- END SECTION BLOG -->

    </div>
    <!-- END MAIN CONTENT -->
</div>
