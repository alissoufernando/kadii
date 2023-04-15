<div>
    @section('headerTop')
    <div class="top-header">
        <div class="container">
            @include('livewire.site.partials.link-auth')
        </div>
    </div>
    @endsection

    @section('headerNav')
    <div class="bottom_header dark_skin main_menu_uppercase">
    	<div class="container">
            <nav class="navbar navbar-expand-lg" id="nav_media">
                @include('livewire.site.partials.logo')

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    @include('livewire.site.partials.navbar-link')
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
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
    @section('sous-menu')
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container minimenu"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Geschäft</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Haus</a></li>
                        <li class="breadcrumb-item active"><a href="#">Geschäft</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->
    @endsection

<!-- START MAIN CONTENT -->
<div class="main_content">
    @if (Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
    	<div class="row">
			<div class="col-lg-9">
            	<div class="row align-items-center mb-4 pb-1">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="product_header_left">
                                <div class="custom_select">
                                    <select class="form-control form-control-sm" wire:model="sorting">
                                        <option value="default">Standard-Sortierung</option>
                                        <option value="date">Nach Datum sortieren</option>
                                        <option value="price">Nach Preis sortieren: niedrig bis hoch</option>
                                        <option value="price-desc">Nach Preis sortieren: hoch bis niedrig</option>
                                    </select>
                                </div>
                            </div>
                            <div class="product_header_right">
                            	<div class="products_view">
                                    <a href="javascript:Void(0);" class="shorting_icon grid"><i class="ti-view-grid"></i></a>
                                    <a href="javascript:Void(0);" class="shorting_icon list active"><i class="ti-layout-list-thumb"></i></a>
                                </div>
                                <div class="custom_select">
                                    <select class="form-control form-control-sm" wire:model="pagesize">
                                        <option value="">Anzeigen</option>
                                        <option value="9">9</option>
                                        <option value="12">12</option>
                                        <option value="18">18</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row shop_container list">
                    @if ($products->count() > 0)
                    @foreach ($products as $product)
                    <div class="col-md-4 col-6">
                     <div class="product">
                         <div class="product_img">
                            @if ($product->images->first()->thumbnail)
                            <a href="{{route('site.detail-produit', ['id' => $product->id])}}">
                             <img src="{{asset('storage/galerie')}}/{{$product->images->first()->thumbnail}}" alt="{{$product->name}}">
                             </a>
                            @else
                            <a href="{{route('site.detail-produit', ['id' => $product->id])}}">
                                <img src="{{asset('assets/images/product/default.png')}}" alt="{{$product->name}}">
                            </a>
                            @endif
                             <div class="product_action_box">
                                 <ul class="list_none pr_action_btn">
                                     <li class="add-to-cart"><a href="#" wire:click.prevent ="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                     {{-- <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                     <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li> --}}
                                     <li><a href="#"><i class="icon-heart"></i></a></li>
                                 </ul>
                             </div>
                         </div>
                         <div class="product_info">
                             <h6 class="product_title"><a href="{{route('site.detail-produit', ['id' => $product->id])}}">{{$product->name}}</a></h6>
                             <div class="product_price">
                                 <span class="price">{{$product->sale_price}} FCFA</span>
                                 <del>{{$product->normal_price }} FCFA</del>
                                 <div class="on_sale">
                                     <span>35% Off</span>
                                 </div>
                             </div>
                             <div class="rating_wrap">
                                 <div class="rating">
                                     <div class="product_rate" style="width:80%"></div>
                                 </div>
                                 <span class="rating_num">(21)</span>
                             </div>
                             <div class="pr_desc">
                                 <p>{{$product->description }}</p>
                             </div>
                             <div class="pr_switch_wrap">
                                 <div class="product_color_switch">
                                     <span class="active" data-color="#87554B"></span>
                                     <span data-color="#333333"></span>
                                     <span data-color="#DA323F"></span>
                                 </div>
                             </div>
                             <div class="list_product_action_box">
                                 <ul class="list_none pr_action_btn">
                                     <li class="add-to-cart"><a wire:click.prevent ="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})" ><i class="icon-basket-loaded"></i>Hinzufügen</a></li>
                                     {{-- <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                     <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li> --}}
                                     <li><a href="#"><i class="icon-heart"></i></a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                    @endforeach
                    @else
                    <p>Kein Produkt in der Datenbank</p>
                    @endif



                </div>
        		<div class="row">
                    <div class="col-12">
                        <ul class="pagination mt-3 justify-content-center pagination_style1">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="linearicons-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
        	</div>
            <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
            	<div class="sidebar">
                	<div class="widget">
                        <h5 class="widget_title">Kategorien</h5>
                        <ul x-data="{ open: false }" class="widget_categories" >
                            @foreach($category as $categorys)

                                <li>
                                    <a href="{{route('site.produit-categorie',['id' => $categorys->id])}}">{{$categorys->name}}</a>
                                    @if (count($categorys->subcategories) > 0)
                                    @if ($open)
                                    <span class="categories_num fs-6 fw-bold" x-on:click="open= false" wire:click="moins" style="cursor: pointer;">-</span>
                                    @else
                                    <span class="categories_num fs-6 fw-bold" x-on:click="open= true" wire:click="plus" style="cursor: pointer;">+</span>
                                    @endif
                                    <ul class="sub-cate" x-show="open" x-data="{ open1: false }">
                                    @foreach ($categorys->subcategories as $scategorys)
                                    <li  style="margin-left: 20px;margin-top: 10px" >
                                    <a href="{{route('site.produit-categorie',['id' => $categorys->id,'id_scategory' => $scategorys->id,])}}" class="cat-link"> <i class="fa fa-caret-right"></i> {{$scategorys->name}}</a>

                                        @if (count($categorys->subsubcategories) > 0)
                                        @if ($open1)
                                        <span class="categories_num fs-6 fw-bold" x-on:click="open1= false" wire:click="moins1" style="cursor: pointer;">-</span>
                                        @else
                                        <span class="categories_num fs-6 fw-bold" x-on:click="open1= true" wire:click="plus1" style="cursor: pointer;">+</span>
                                        @endif
                                        <ul class="sub-cate" x-show="open1">
                                        @foreach ($categorys->subsubcategories as $sscategorys)
                                        <li style="margin-left: 30px;margin-top: 10px" >
                                        <a href="{{route('site.produit-categorie',['id' => $categorys->id,'id_scategory' => $scategorys->id,'id_sscategory' => $sscategorys->id])}}" class="cat-link"> <i class="fa fa-caret-right"></i> {{$sscategorys->name}}</a>
                                        </li>
                                        @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                    </ul>
                                    @endif
                                </li>

                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                    	<h5 class="widget_title">Filter</h5>
                        <span>Price: <span class="text-info">{{$min_price}} {{ $devise_price }} - {{$max_price}} {{ $devise_price }}</span></span>
                        <div >
                            <div id="slider" wire:ignore ></div>
                        </div>

                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Förderung</h5>
                        <div class="shop_banner">
                            <div class="banner_img overlay_bg_20">
                                <img src="{{asset('assets/images/product/default.png')}}" alt="sidebar_banner_img">
                            </div>
                            <div class="shop_bn_content2 text_white">
                                <h5 class="text-uppercase shop_subtitle">Neue Kollektion</h5>
                                <h3 class="text-uppercase shop_title">Verkauf 30 % Rabatt</h3>
                                <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Jetzt einkaufen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<div class="section bg_default small_pt small_pb">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="heading_s1 mb-md-0 heading_light">
                    <h3>Abonnieren Sie unseren Newsletter</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form">
                    <form>
                        <input type="text" required="" class="form-control rounded-0" placeholder="E-Mail Adresse eingeben">
                        <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Abonnieren</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->
@section('script-super')
<script>

    var slider = document.getElementById('slider');
    noUiSlider.create(slider,{
        start : [1, 1000],
        connect : true,
        range : {
            'min' : 1,
            'max' : 1000,
        },

        pips : {
            mode : 'steps',
            stepped : true,
            density : 4,
        }
    });
    slider.noUiSlider.on('update', function (value) {
        @this.set('min_price', value[0]);
        @this.set('max_price', value[1]);
    });
</script>
@endsection
</div>

