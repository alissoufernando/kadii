<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
    <meta name="keywords"
        content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/site/assets/images/logo_1.png') }}">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/assets/css/animate.css') }}">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.css" integrity="sha512-qveKnGrvOChbSzAdtSs8p69eoLegyh+1hwOMbmpCViIwj7rn4oJjdmMvWOuyQlTOZgTlZA0N2PXA7iA8/2TUYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.js" integrity="sha512-1mDhG//LAjM3pLXCJyaA+4c+h5qmMoTc7IuJyuNNPaakrWT9rVTxICK4tIizf7YwJsXgDC2JP74PGCc7qxLAHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>CENTRALE-MOBILIER</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @include('livewire.site.partials.style')

    @livewireStyles()

</head>

<body>

    <div>
        {{-- <!-- LOADER -->
        <div class="preloader">
            <div class="lds-ellipsis">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- END LOADER --> --}}
        <!-- START HEADER -->
        <header class="header_wrap fixed-top dd_dark_skin transparent_header">
              @yield('headerTop')
            @yield('headerNav')
        </header>
        <!-- END HEADER -->
        @yield('sous-menu')

        <!-- END MAIN CONTENT -->


            {{ $slot }}


        <!-- END MAIN CONTENT -->

        <!-- START FOOTER -->
        @include('livewire.site.partials.footer')
        <!-- END FOOTER -->



        @livewireScripts()
        @include('livewire.site.partials.script')
        @yield('script-super')

    </div>

</body>

</html>
