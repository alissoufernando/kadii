

    <a class="nav-link cart_trigger" href="{{route('site.shopping-wishlist')}}">
        <i class="icon-heart"></i>
        <span class="cart_count">
            @if (Cart::instance('wishlist')->count() > 0)
                {{Cart::instance('wishlist')->count()}}
            @else
            0
            @endif
        </span>
    </a>

