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
    <div class="container minimenu"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Contact</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
@endsection

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION CONTACT -->
<div class="section pb_70">
	<div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-map2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Address</span>
                        <p>Aganmadin,Rue avant SBBE Lot 147-d</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-envelope-open"></i>
                    </div>
                    <div class="contact_text">
                        <span>Email Address</span>
                        <a href="mailto:infos@centraledumobilier.com">infos@centraledumobilier.com </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-tablet2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Phone</span>
                        <a href="https://wa.me/+22955221080?text=Bonjour,">+229 55221080</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->

<!-- START SECTION CONTACT -->
<div  class="section pt-0">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-6">
                @if (Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
            	<div class="heading_s1">
                	<h2>Contactez-nous</h2>
                </div>
                <p class="leads">Que vous soyez à la maison ou dans la nature, nous sommes là pour vous. </p>
                <div class="field_form">
                    <form wire:submit.prevent="sendMessage">
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <input required placeholder="Enter Name *" id="first-name" class="form-control" name="name" type="text" wire:model="name">
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                             </div>
                            <div class="form-group col-md-6 mb-3">
                                <input required placeholder="Enter Email *" id="email" class="form-control" name="email" type="email" wire:model="email">
                                @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <input required placeholder="Enter Phone No. *" id="phone" class="form-control" name="phone" wire:model="phone">
                                @error('phone')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <select name="subject" id="subject" class="form-control" wire:model="subject">
                                    <option value="">None</option>
                                    <option value="problèmes techniques">problèmes techniques</option>
                                    <option value="échange administratif et autre informations">échange administratif et autre informations</option>
                                    <option value="demande de proforma">demande de proforma</option>
                                </select>

                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <textarea required placeholder="Message *" id="description" class="form-control" name="message" rows="4" wire:model="comment"></textarea>
                                @error('comment')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-fill-out" >Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0">
            	<div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=MAMERI&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies-online.net">fmovies</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net">embed google maps wordpress</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->

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
