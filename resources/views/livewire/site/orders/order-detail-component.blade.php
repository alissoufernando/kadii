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

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-expanded="false">
                        <span class="ion-android-menu"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        @include('livewire.site.partials.navbar-link')
                    </div>
                    <ul class="navbar-nav attr-nav align-items-center">
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
    @section('sous-menu')
        <!-- START SECTION BREADCRUMB -->
        <div class="breadcrumb_section bg_gray page-title-mini">
            <div class="container minimenu">
                <!-- STRART CONTAINER -->
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-title">
                            <h1>Détails de la commande</h1>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb justify-content-md-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">mon compte</a></li>
                            <li class="breadcrumb-item active">Détails de la commande</li>
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
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>orders detail</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('site.my-account') }}"
                                            class="btn btn-success btn-sm float-end"> Les Commandes</a>
                                        @if ($order->status == 'ordered')
                                            <a href="" wire:click.prevent="cancelOrder" style="margin-right:20px;"
                                                class="btn btn-warning btn-sm float-end"> Annuler</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <th>Order ID</th>
                                        <td>{{ $order->id }}</td>
                                        <th>date commande</th>
                                        <td>{{ $order->created_at }}</td>
                                        <th>Statut</th>
                                        <td>{{ $order->status }}</td>
                                        @if ($order->status == 'delivrered')
                                            <th>Delivery date</th>
                                            <td>{{ $order->delivered_date }}</td>
                                        @elseif ($order->status == 'canceled')
                                            <th>cancellation date</th>
                                            <td>{{ $order->canceled_date }}</td>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Orders</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail">Image</th>
                                                <th class="product-name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-subtotal">Total</th>
                                                <th class="product-subtotal">Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->orderItems as $item)
                                                <tr>
                                                    @empty($item->product->images->first()->full)
                                                    <td class="product-thumbnail"><a href="#"><img
                                                        src="{{asset('assets/images/product/default.png')}}"
                                                        alt="{{ $item->product->name }}"></a></td>
                                                    @else
                                                    @php
                                                    $images = explode(",",$item->product->images->first()->full);
                                                    @endphp
                                                    <td class="product-thumbnail"><a href="#"><img
                                                                src="{{ asset('storage/galerie') }}/{{ $images[0] }}"
                                                                alt="{{ $item->product->name }}"></a></td>
                                                    @endempty

                                                    <td class="product-name" data-title="Product"><a
                                                            href="#">{{ $item->product->name }}</a></td>
                                                    <td class="product-price" data-title="Price">{{ $item->price }} FCFA
                                                    </td>
                                                    <td class="product-quantity" data-title="Quantity">
                                                        <div class="quantity">
                                                            <h5>{{ $item->quantity }}</h5>
                                                        </div>
                                                    </td>
                                                    <td class="product-subtotal" data-title="Total">
                                                        {{ $item->price * $item->quantity }} FCFA</td>

                                                    <td class="product-subtotal" data-title="Total">
                                                        @if ($order->status == "delivered" && $item->rstatus == 0)
                                                        <a href="{{route('site.detail-produit', ['id' => $item->id])}}"> Wirte Review</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td class="product-quantity">
                                                    <h6 class="m-0"> <span
                                                            class="f-w-600">Subtotal:</span></h6>
                                                </td>
                                                <td colspan="4"><span class="float-end" style="margin-right:80px;">{{ $order->subtotal }} FCFA</span></td>
                                            </tr>
                                            <tr>
                                                <td class="product-quantity">
                                                    <h6 class="m-0"> <span class="f-w-600">Tax:</span>
                                                    </h6>
                                                </td>
                                                <td colspan="4"><span class="float-end" style="margin-right:80px;">{{ $order->tax }} FCFA</span></td>
                                            </tr>
                                            <tr>
                                                <td class="product-quantity">
                                                    <h6 class="m-0"> <span
                                                            class="f-w-600">Shipping:</span></h6>
                                                </td>
                                                <td colspan="4"><span class="float-end" style="margin-right:80px;">Free Shipping</span></td>
                                            </tr>
                                            <tr>
                                                <td class="product-quantity">
                                                    <h6 class="m-0"> <span
                                                            class="f-w-600">Total:</span></h6>
                                                </td>
                                                <td colspan="4"><span class="float-end" style="margin-right:80px;">{{ $order->total }} FCFA</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Billing</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>firstname</th>
                                            <td>{{ $order->firstname }}</td>
                                            <th>lastname</th>
                                            <td>{{ $order->lastname }}</td>
                                        </tr>
                                        <tr>
                                            <th>mobile</th>
                                            <td>{{ $order->mobile }}</td>
                                            <th>email</th>
                                            <td>{{ $order->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>country</th>
                                            <td>{{ $order->country }}</td>
                                            <th>Address 1</th>
                                            <td>{{ $order->line1 }}</td>
                                        </tr>
                                        <tr>
                                            <th>zipcode</th>
                                            <td>{{ $order->zipcode }}</td>
                                            <th>order date</th>
                                            <td>{{ $order->created_at }}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($order->is_shipping_different)
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3>shipping Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>firstname</th>
                                                <td>{{ $order->shipping->firstname }}</td>
                                                <th>lastname</th>
                                                <td>{{ $order->shipping->lastname }}</td>
                                            </tr>
                                            <tr>
                                                <th>mobile</th>
                                                <td>{{ $order->shipping->mobile }}</td>
                                                <th>email</th>
                                                <td>{{ $order->shipping->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>country</th>
                                                <td>{{ $order->shipping->country }}</td>
                                                <th>Address 1</th>
                                                <td>{{ $order->shipping->line1 }}</td>
                                            </tr>
                                            <tr>
                                                <th>zipcode</th>
                                                <td>{{ $order->shipping->zipcode }}</td>
                                                <th>order date</th>
                                                <td>{{ $order->shipping->created_at }}</td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>translation details</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            @if ($order->translation)
                                                <th>Mode de translation</th>
                                                <td>{{ $order->translation->mode }}</td>
                                                <th>Status</th>
                                                <td>{{ $order->translation->status }}</td>
                                                <th>Date de translation</th>
                                                <td>{{ $order->translation->created_at }}</td>
                                            @endif
                                        </tr>

                                    </table>
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
                            <h3>Subscribe Our Newsletter</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="newsletter_form">
                            <form>
                                <input type="text" required="" class="form-control rounded-0"
                                    placeholder="Enter Email Address">
                                <button type="submit" class="btn btn-dark rounded-0" name="submit"
                                    value="Submit">Subscribe</button>
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
