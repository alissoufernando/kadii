<div>

    <a class="nav-link cart_trigger" href="{{route('site.shopping-cart')}}" data-bs-toggle="dropdown">
        <i class="linearicons-cart"></i>
        <span class="cart_count">
            @if (Cart::instance('cart')->count() > 0)
                {{Cart::instance('cart')->count()}}
            @else
            0
            @endif
        </span>
    </a>
    <div class="cart_box dropdown-menu dropdown-menu-right">
        @if (Cart::instance('cart')->content())

        <ul class="cart_list">
            @foreach(Cart::instance('cart')->content() as $item)

            <li>
                <a href="#" class="item_remove"><i class="ion-close"></i></a>

                @empty ($item->model->images->first()->thumbnail)
                <a href="javascrip:void(0)">
                    <img src="{{asset('assets/images/product/default.png')}}" alt="{{$item->model->name}}">
                    {{$item->name}}
                </a>
                @else
                @php
                $images = explode(",",$item->model->images->first()->full);
                @endphp
                <a href="javascrip:void(0)">
                    <img src="{{asset('storage/galerie')}}/{{$images[0]}}" alt="{{$item->name}}">
                    {{$item->name}}
                </a>

                @endempty
                <span class="cart_quantity"> {{$item->qty}}<span class="cart_amount"> X <span class="price_symbole"></span></span>{{$item->price}} FCFA</span>
            </li>
            @endforeach
        </ul>
        <div class="cart_footer">
            <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole"></span></span>{{Cart::instance('cart')->subtotal()}} FCFA</p>
            <p class="cart_buttons"><a href="{{route('site.shopping-cart')}}" class="btn btn-fill-line view-cart">View Cart</a><a href="#" class="btn btn-fill-out checkout">Checkout</a></p>
        </div>

        @else
            <p>Aucun produit n'a été ajouter</p>
        @endif

    </div>


</div>
