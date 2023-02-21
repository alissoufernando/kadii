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
<div class="breadcrumb_section bg_gray page-title-mini ">
    <div class="container minimenu"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>My Account</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">My Account</li>
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
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="false"><i class="ti-location-pin"></i>Mon profile</a>
                        </li>

                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Orders</a>
                      </li>
                      <li class="nav-item">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="nav-link" type="submit"><i class="ti-lock"></i>Logout</button>
                    </form>
                      </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">

                    <div class="tab-pane fade active show" id="address" role="tabpanel" aria-labelledby="address-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-3 mb-lg-0">
                                    <div class="card-header">
                                        <h4>Mes informations</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                @empty( $user->profile->image )
                                                <img src="{{asset('assets/site/assets/images/user.png')}}" alt="" width="300" height="300">
                                                @else
                                                <img src="{{ asset('storage') }}/{{ $user->profile->image }}" alt="" width="300" height="300">
                                                @endempty
                                            </div>
                                            <div class="col-lg-6">
                                                <p> <b>Nom</b>{{$user->name}}</p>
                                                <p> <b>Email</b> {{$user->email}}</</p>
                                                <p> <b>Téléphone</b> {{$user->profile->mobile}}</</p>
                                                <hr>
                                                <p> <b>Line1</b>{{$user->profile->line2}}</p>
                                                <p> <b>Line2</b> {{$user->profile->line2}}</p>
                                                <p> <b>city</b> {{$user->profile->city}}</p>
                                                <p> <b>departement</b> {{$user->profile->departement}}</p>
                                                <p> <b>country</b> {{$user->profile->country}}</p>
                                                <p> <b>zipcode</b> {{$user->profile->zipcode}}</p>
                                                <a href="#"wire:click.prevent='getElementById({{$user->profile->id}})' class="btn btn-fill-out float-end" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  	<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Orders</h3>
                            </div>
                            <div class="card-body">
                                @empty($order)
                                <div class="text-center" style="padding: 30px 0 ;">
                                    <h1> Aucune commande n'a été effectuée</h1>
                                    <p>Veillez effectuée une commande</p>
                                    <a href="{{route('site.shop')}}" class="btn btn-success">Voir la boutique</a>
                                </div>
                                @else
                    			<div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>

                                                <th>ID</th>
                                                <th>order date</th>
                                                <th>Statut</th>
                                                <th>subtotal</th>
                                                <th>discount</th>
                                                <th>Tax</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $i=1
                                            @endphp
                                            @foreach ($order as $orders)
                                            <tr>
                                                <td>{{$i ++}}</td>
                                                <td>{{$orders->created_at}}</td>
                                                <td>{{$orders->status}}</td>
                                                <td>${{$orders->subtotal}}</td>
                                                <td>${{$orders->discount}}</td>
                                                <td>${{$orders->tax}}</td>
                                                <td>${{$orders->total}}</td>
                                                <td><a href="{{route('site.detail-order',['order_id'=>$orders->id])}}" class="btn btn-fill-out btn-sm">View</a></td>

                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>


                                @endempty
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
@include('livewire.site.account.modalAccount')
</div>


