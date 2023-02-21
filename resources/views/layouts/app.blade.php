<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="endless admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities. Laravel version 8, 08-02-2021 (update)">
        <meta name="keywords" content="admin template, endless admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="pixelstrap">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
        <title>@yield('title') | CENTRALE-MOBILIER</title>
        <!-- Google font-->
        @include('livewire.dashboard.partials.style')
        @livewireStyles()
    </head>
    <body main-theme-layout="ltr">
        <!-- Loader starts-->
        <div class="loader-wrapper">
            <div class="loader bg-white">
                <div class="whirly-loader"> </div>
            </div>
        </div>
        <!-- Loader ends-->
        <!-- page-wrapper Start-->
        <div class="page-wrapper">
            <!-- Page Header Start-->
            @include('livewire.dashboard.partials.header')
            <!-- Page Header Ends -->
            <!-- Page Body Start-->
            <div class="page-body-wrapper">
                <!-- Page Sidebar Start-->
                @include('livewire.dashboard.partials.sidebar')
                <!-- Right sidebar Ends-->
                <div class="page-body">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row">
                                <div class="col">
                                    <div class="page-header-left">
                                        <h3>@yield('breadcrumb-title')</h3>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/"><i data-feather="home"></i></a></li>
                                            @yield('breadcrumb-items')
                                        </ol>
                                    </div>
                                </div>
                                <!-- Bookmark Start-->
                                <div class="col">
                                    <div class="bookmark pull-right">
                                        <ul>
                                            <li><a href="#" data-bs-toggle="tooltip" title="Calender" data-bs-original-title="Calendar"><i data-feather="calendar"></i></a></li>
                                            <li><a href="#" data-bs-toggle="tooltip" title="Mail" data-bs-original-title="Mail"><i data-feather="mail"></i></a></li>
                                            <li><a href="#" data-bs-toggle="tooltip" title="Chat" data-bs-original-title="Chat"><i data-feather="message-square"></i></a></li>
                                            <li>
                                                <a href="javascript:void(0)"><i class="bookmark-search" data-feather="star"></i></a>
                                                <form class="form-inline search-form">
                                                    <div class="mb-3 form-control-search">
                                                        <input type="text" placeholder="Search..">
                                                    </div>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Bookmark Ends-->
                            </div>
                        </div>
                    </div>
                    <!-- Container-fluid starts-->
                    {{$slot}}
                    <!-- Container-fluid Ends-->
                </div>
                <!-- footer start-->
                @include('livewire.dashboard.partials.footer')
            </div>
        </div>
        <!-- latest jquery-->
        @livewireScripts()
        @include('livewire.dashboard.partials.script')
        @include('livewire.dashboard.partials.confirmation-de-suppression')
        <!-- Plugin used-->
    </body>
</html>
