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
                            <h1>Einzelheiten der Bestellung</h1>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb justify-content-md-end">
                            <li class="breadcrumb-item"><a href="#">Haus</a></li>
                            <li class="breadcrumb-item"><a href="#">Mein Konto</a></li>
                            <li class="breadcrumb-item active">Einzelheiten der Bestellung</li>
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
                                        <h3>Einzelheiten der Bestellung</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('site.my-account') }}"
                                            class="btn btn-success btn-sm float-end">Die Aufträge</a>
                                        @if ($order->status == 'ordered')
                                            <a href="" wire:click.prevent="cancelOrder" style="margin-right:20px;"
                                                class="btn btn-warning btn-sm float-end"> Stornieren</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <th>Auftragsnummer</th>
                                        <td>{{ $order->id }}</td>
                                        <th>Auftragsdatum</th>
                                        <td>{{ $order->created_at }}</td>
                                        <th>Status</th>
                                        <td>{{ $order->status }}</td>
                                        @if ($order->status == 'delivrered')
                                            <th>Liefertermin</th>
                                            <td>{{ $order->delivered_date }}</td>
                                        @elseif ($order->status == 'canceled')
                                            <th>Stornierungsdatum</th>
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
                                <h3>Aufträge</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail">Image</th>
                                                <th class="product-name">Produkt</th>
                                                <th class="product-price">Preis</th>
                                                <th class="product-quantity">Menge</th>
                                                <th class="product-subtotal">Gesamt</th>
                                                <th class="product-subtotal">Aktionen</th>

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
                                                        {{ $item->price * $item->quantity }} €</td>

                                                    <td class="product-subtotal" data-title="Total">
                                                        @if ($order->status == "delivered" && $item->rstatus == false)
                                                        <a href="{{route('site.detail-produit', ['id' => $item->id])}}"> Bewertung schreiben</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td class="product-quantity">
                                                    <h6 class="m-0"> <span
                                                            class="f-w-600">Zwischensumme:</span></h6>
                                                </td>
                                                <td colspan="4"><span class="float-end" style="margin-right:80px;">{{ $order->subtotal }} €</span></td>
                                            </tr>
                                            <tr>
                                                <td class="product-quantity">
                                                    <h6 class="m-0"> <span class="f-w-600">Steuer:</span>
                                                    </h6>
                                                </td>
                                                <td colspan="4"><span class="float-end" style="margin-right:80px;">{{ $order->tax }} €</span></td>
                                            </tr>
                                            <tr>
                                                <td class="product-quantity">
                                                    <h6 class="m-0"> <span
                                                            class="f-w-600">Versand:</span></h6>
                                                </td>
                                                <td colspan="4"><span class="float-end" style="margin-right:80px;">Kostenloser Versand</span></td>
                                            </tr>
                                            <tr>
                                                <td class="product-quantity">
                                                    <h6 class="m-0"> <span
                                                            class="f-w-600">Gesamt:</span></h6>
                                                </td>
                                                <td colspan="4"><span class="float-end" style="margin-right:80px;">{{ $order->total }} €</span></td>
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
                                <h3>Abrechnung</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Vorname</th>
                                            <td>{{ $order->firstname }}</td>
                                            <th>Familienname</th>
                                            <td>{{ $order->lastname }}</td>
                                        </tr>
                                        <tr>
                                            <th>Telefon</th>
                                            <td>{{ $order->mobile }}</td>
                                            <th>E-mail-Adresse</th>
                                            <td>{{ $order->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Land</th>
                                            <td>{{ $order->country }}</td>
                                            <th>Adresse</th>
                                            <td>{{ $order->line1 }}</td>
                                        </tr>
                                        <tr>
                                            <th>PLZ</th>
                                            <td>{{ $order->zipcode }}</td>
                                            <th>Auftragsdatum</th>
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
                                    <h3>Versanddetails</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Vorname</th>
                                                <td>{{ $order->shipping->firstname }}</td>
                                                <th>Familienname</th>
                                                <td>{{ $order->shipping->lastname }}</td>
                                            </tr>
                                            <tr>
                                                <th>Telefon</th>
                                                <td>{{ $order->shipping->mobile }}</td>
                                                <th>E-mail Adresse</th>
                                                <td>{{ $order->shipping->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Land</th>
                                                <td>{{ $order->shipping->country }}</td>
                                                <th>Adresse 1</th>
                                                <td>{{ $order->shipping->line1 }}</td>
                                            </tr>
                                            <tr>
                                                <th>PLZ</th>
                                                <td>{{ $order->shipping->zipcode }}</td>
                                                <th>Auftragsdatum</th>
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
                                <h3>Transaktionsdetails</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            @if ($order->translation)
                                                <th>Transaktionsmodus</th>
                                                <td>{{ $order->translation->mode }}</td>
                                                <th>Status</th>
                                                <td>{{ $order->translation->status }}</td>
                                                <th>Datum der Transaktion</th>
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
</div>
