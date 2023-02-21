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
            		<h1>Détails produits</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Produit</a></li>
                    <li class="breadcrumb-item active">Détails produits</li>
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
        @php
        $witems = Cart::instance('wishlist')->content()->pluck('id');
        @endphp
        @if ($product)
        @foreach ($product as $products)
		<div class="row">
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
              <div  class="product-image">
                    <div class="product_img_box">
                        @empty ($products->images->first()->thumbnail)
                        <img id="product_img" src="{{asset('assets/images/product/default.png')}}" data-zoom-image="{{asset('assets/images/product/default.png')}}" alt="{{$products->name}}" />
                        <a href="#" class="product_img_zoom" title="Zoom">
                            <span class="linearicons-zoom-in"></span>
                        </a>
                        @else
                        @php
                        $images = explode(",",$products->images->first()->full);
                        @endphp
                        <img id="product_img" src="{{asset('storage/galerie')}}/{{$images[0]}}" data-zoom-image="{{asset('storage/galerie')}}/{{$images[0]}}" alt="{{$products->name}}" />
                        <a href="#" class="product_img_zoom" title="Zoom">
                            <span class="linearicons-zoom-in"></span>
                        </a>
                        @endempty

                    </div>

                    <div wire:ignore id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">

                       @empty ($images)
                       <div class="item">
                           <a href="#" class="product_gallery_item active" data-image="{{asset('assets/images/product/default.png')}}" data-zoom-image="{{asset('assets/images/product/default.png')}}">
                            <img src="{{asset('assets/images/product/default.png')}}" alt="{{$products->name}}" />
                        </a>
                        </div>
                        @else
                        @foreach ($images as $image)
                        <div class="item">
                           <a href="#" class="product_gallery_item active" data-image="{{asset('storage/galerie')}}/{{$image}}" data-zoom-image="{{asset('storage/galerie')}}/{{$image}}">
                               <img src="{{asset('storage/galerie')}}/{{$image}}" alt="{{$products->name}}" />
                           </a>
                       </div>
                       @endforeach
                       @endempty
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="pr_detail">
                    <div class="product_description">
                        <h4 class="product_title"><a href="#">{{$products->name}}</a></h4>
                        <div class="product_price">

                            @if ($products->categorie->name == "Bureau")
                            <span class="price">{{  $t_calcul_attr }} FCFA</span>
                            @else
                            <span class="price">{{$products->sale_price}} FCFA</span>

                            {{-- <span class="price">{{  $this->attr_price_click != "" ? $this->attr_price_click :  $products->sale_price}} FCFA</span> --}}
                            @endif
                            <del>{{$products->normal_price}} FCFA</del>
                            <div class="on_sale">
                                <span>35% Off</span>
                            </div>
                        </div>
                        <div class="rating_wrap">
                            @php
                                $savgrating = 0;
                            @endphp
                                <div class="rating">
                                    @foreach ($products->orderItems->where('rstatus', 1) as $orderItem)
                                    @php
                                        $savgrating = $savgrating + $orderItem->review->rating;
                                    @endphp
                                    @endforeach
                                    @for ($i = 1; $i <= 5; $i++)
                                    @if ($i<= $savgrating)
                                    <div class="product_rate" style="width:80%"></div>
                                    @endif
                                    @endfor
                                </div>
                                <span class="rating_num">({{$products->orderItems->where('rstatus', 1)->count()}})</span>
                     </div>
                        <div class="pr_desc">
                            <div class="row">
                              <div class="col-md-12">
                                @if ($products->priceCaisson)
                                <p>{{$descrip }}</p>
                                @else
                                <p>{{$products->description}}</p>
                                @endif
                              </div>
                            </div>
                        </div>

                        <div class="pr_switch_wrap">
                        <div wire:ignore class="row">
                            <div class="col-md-12">
                                    @foreach ($products->attributeValues->unique('product_id') as $av)
                                    <span class="switch_lable">{{$av->attribute->name}}</span>
                                        @foreach ($av->attribute->attributeValues->where('product_id', $products->id) as $pav)
                                        <button class="btn btn-pill btn-outline-primary btn-sm"  value="{{$pav->price}}" wire:click.prevent="atttPrice({{$pav->price}},'{{$pav->value}}')">{{$pav->value}}</button>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            @if ($products->priceCaisson)
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="caisson" wire:click.prevent="caisson({{$products->priceCaisson}})" onclick="this.ckecked = true;">
                                    <label class="form-check-label" for="exampleCheck1">Avec caisson</label>
                                </div>
                            </div>
                            @endif
                            @if ($products->priceRetour)
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="retour"  wire:click.prevent="retour({{$products->priceRetour}})" onclick="this.ckecked = true;">
                                    <label class="form-check-label" for="exampleCheck1">Retour de Bureau</label>
                                </div>
                            </div>
                            @endif


                        </div>


                    </div>
                    <hr />
                    <div class="cart_extra">
                        <div class="cart-product-quantity">
                            <div class="quantity">
                                <input type="button" value="-" class="minus" wire:click.prevent ="decreaseQuantity">
                                <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4" wire:model="qty">
                                <input type="button" value="+" class="plus" wire:click.prevent ="increaseQuantity">
                            </div>
                        </div>
                        <div class="cart_btn">
                            <button class="btn btn-fill-out btn-addtocart" type="button" wire:click.prevent ="store({{$products->id}},'{{$products->name}}',{{$products->sale_price}})"><i class="icon-basket-loaded"></i> Add to cart</button>
                            <a class="add_compare" href="#"><i class="icon-shuffle"></i></a>
                            @if ($witems->contains($products->id))
                            <a class="add_wishlist" href="#" wire:click.prevent ="removeFromWishList({{$products->id}})" ><i class="icon-heart" style="color: red;"></i></a>
                            @else
                            <a class="add_wishlist" href="#" wire:click.prevent ="addToWishlist({{$products->id}},'{{$products->name}}',{{$products->sale_price}})"><i class="icon-heart"></i></a>
                            @endif

                        </div>
                    </div>
                    <hr />
                    <ul class="product-meta">
                        <li>SKU: <a href="#">{{$products->sku}}</a></li>
                        <li>Category: <a href="#">{{$products->categorie->name}}</a></li>
                        <li>Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">printed</a> </li>
                    </ul>

                    <div class="product_share">
                        <span>Share:</span>
                        <ul class="social_icons">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="large_divider clearfix"></div>
            </div>
        </div>
        <div wire:ignore class="row">
        	<div class="col-12">
            	<div class="tab-style3">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                      	</li>
                      	<li class="nav-item">
                        	<a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Additional info</a>
                      	</li>
                      	<li class="nav-item">
                        	<a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews ({{$products->orderItems->where('rstatus', 1)->count()}})</a>
                      	</li>
                    </ul>
                	<div class="tab-content shop_info_tab">
                      	<div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                        	<p>{{$products->description}}</p>
                      	</div>
                      	<div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                        	<table class="table table-bordered">
                            	{{-- <tr>
                                	<td>Capacity</td>
                                	<td>5 Kg</td>
                            	</tr>
                                <tr>
                                    <td>Color</td>
                                    <td>Black, Brown, Red,</td>
                                </tr>
                                <tr>
                                    <td>Water Resistant</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Material</td>
                                    <td>Artificial Leather</td>
                                </tr> --}}
                                <h2>Aucune informations ici</h2>
                        	</table>
                      	</div>
                      	<div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                            @if (Session::has('message_r'))
                            <div class="alert alert-success">{{Session::get('message_r')}}</div>
                            @endif
                        	<div class="comments">
                            	<h5 class="product_tab_title">{{$products->orderItems->where('rstatus', 1)->count()}} Review For <span>{{$products->name}}</span></h5>
                                <ul class="list_none comment_list mt-4">
                                    @foreach ($products->orderItems->where('rstatus', 1) as $orderItem)
                                    <li>
                                        <div class="comment_img">
                                            <img src="{{asset('assets/site/assets/images/user1.jpg')}}" alt="user1"/>
                                        </div>
                                        <div class="comment_block">
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:80%"></div>
                                                </div>
                                            </div>
                                            <p class="customer_meta">
                                                <span class="review_author">{{$orderItem->order->name}}</span>
                                                <span class="comment-date">{{Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y g:i A')}}</span>
                                            </p>
                                            <div class="description">
                                                <p>{{$orderItem->review->comment}}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                        	</div>
                            <div class="review_form field_form">
                                <h5>Add a review</h5>
                                <form class="row mt-3" wire:submit.prevent='addReview'>
                                    <div class="form-group col-12 mb-3">
                                        <div class="star_rating">
                                            <span data-value="1" onclick="getRatingValue(1)"><i class="far fa-star" ></i></span>
                                            <span data-value="2" onclick="getRatingValue(2)"><i class="far fa-star"></i></span>
                                            <span data-value="3" onclick="getRatingValue(3)"><i class="far fa-star"></i></span>
                                            <span data-value="4" onclick="getRatingValue(4)"><i class="far fa-star"></i></span>
                                            <span data-value="5" onclick="getRatingValue(5)"><i class="far fa-star"></i></span>

                                        </div>
                                        @error('rating')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 mb-3">
                                        <textarea placeholder="Your review *" class="form-control" name="message" rows="4" wire:model="comment"></textarea>
                                            @error('comment')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>

                                    <div class="form-group col-12 mb-3">
                                        <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Submit Review</button>
                                    </div>
                                </form>
                            </div>
                      	</div>
                	</div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <p>Aucun produit n'est dans la base de données</p>

        @endif
        <div class="row">
        	<div class="col-12">
            	<div class="small_divider"></div>
            	<div class="divider"></div>
                <div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="heading_s1">
                	<h3>Releted Products</h3>
                </div>
                <div class="row shop_container">
            	{{-- <div wire:ignore class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'> --}}
                	@if ($products_related)
                    @foreach ($products_related as $products_relateds)
                    <div class="col-lg-3 col-md-4 col-6">

                        <div class="product_box text-center">
                            <div class="div_image product_img">
                                @empty ($products_relateds->images->first()->thumbnail)
                                <a href="{{route('site.detail-produit', ['id' => $products_relateds->id])}}">
                                    <img src="{{asset('assets/images/product/default.png')}}" alt="{{$products_relateds->name}}">
                                </a>
                                @else
                                @php
                                    $images = explode(",",$products_relateds->images->first()->thumbnail);
                                @endphp
                                <a href="{{route('site.detail-produit', ['id' => $products_relateds->id])}}">
                                 <img src="{{asset('storage/galerie')}}/{{$images[0]}}" alt="{{$products_relateds->name}}">
                                </a>
                                @endempty
                                <div class="product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        {{-- <li><a href="shop-compare.html" class="popup-ajax"><i
                                                    class="icon-shuffle"></i></a></li>
                                        <li><a href="shop-quick-view.html" class="popup-ajax"><i
                                                    class="icon-magnifier-add"></i></a></li> --}}
                                                    @if ($witems->contains($products_relateds->id))
                                                    <li><a href="#" wire:click.prevent ="removeFromWishList({{$products_relateds->id}})"><i class="icon-heart" style="color: red;"></i></a></li>
                                                    @else
                                                    <li><a href="#" wire:click.prevent ="addToWishlist({{$products_relateds->id}},'{{$products_relateds->name}}',{{$products_relateds->sale_price}})"><i class="icon-heart"></i></a></li>
                                                    @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="product_info">
                                <h6 class="product_title"><a href="{{route('site.detail-produit', ['id' => $products_relateds->id])}}">{{$products_relateds->name}}</a></h6>
                                <div class="product_price">
                                    <span class="price">{{$products_relateds->sale_price}} FCFA</span>
                                    <del>{{ $products_relateds->normal_price}} FCFA</del>
                                </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                        <div class="product_rate" style="width:80%"></div>
                                    </div>
                                    <span class="rating_num">(21)</span>
                                </div>
                                <div class="pr_desc">
                                    <p>{{$products_relateds->description}}</p>
                                </div>
                                <div class="add-to-cart">
                                    <a href="#" wire:click.prevent ="store({{$products_relateds->id}},'{{$products_relateds->name}}',{{$products_relateds->sale_price}})" class="btn btn-fill-out btn-radius btn-sm"><i class="icon-basket-loaded"></i>
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

@push('custom-scripts')
<script>

    function getRatingValue(value) {
        @this.rating=value;
    }

</script>
@endpush
