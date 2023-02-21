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
            		<h1>Wishlist</h1>
                </div>
            </div>
            <div class="col-md-6 minimenu">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Wishlist</li>
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
            <div class="col-12">
                <div class="table-responsive wishlist_table">
                	<table class="table">
                    	<thead>
                        	<tr>
                            	<th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-stock-status">Stock Status</th>
                                <th class="product-add-to-cart"></th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Cart::instance('wishlist')->content()->count() > 0)
                            @foreach (Cart::instance('wishlist')->content() as $item)

                            <tr>
                                @empty($item->model->images->first()->full)
                                <td class="product-thumbnail"><a href="#"><img src="{{asset('assets/images/product/default.png')}}" alt="{{$item->name}}"></a></td>
                                @else
                                @php
                                    $images = explode(",",$item->model->images->first()->full);
                                @endphp
                                <td class="product-thumbnail"><a href="#"><img src="{{asset('storage/galerie')}}/{{$images[0]}}" alt="{{$item->name}}"></a></td>
                                @endempty
                                <td class="product-name" data-title="Product"><a href="#">{{$item->name}}</a></td>
                                <td class="product-price" data-title="Price">{{$item->price}} FCFA</td>
                                <td class="product-stock-status" data-title="Stock Status"><span class="badge badge-pill badge-success">In Stock</span></td>
                                <td class="product-add-to-cart"><a href="#" wire:click.prevent ="moveProductFromWishlistToCart('{{$item->rowId}}')" class="btn btn-fill-out btn-radius btn-sm "><i class="icon-basket-loaded"></i> Move to Cart</a></td>
                                <td class="product-remove" data-title="Remove"><a href="#" wire:click.prevent ="destroy('{{$item->rowId}}')"><i class="ti-close"></i></a></td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <p>
                                    Aucun produit n'a été ajouter
                                </p>
                            </tr>

                            @endif
                        </tbody>
                    </table>
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
                    <h3>Subscribe Our Newsletter</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form">
                    <form>
                        <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                        <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->
</div>
<!-- END MAIN CONTENT -->
</div>


