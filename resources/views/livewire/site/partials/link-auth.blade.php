<div class="row align-items-center memeligne">
    <div class="col-6">
        <div class="d-flex align-items-center justify-content-center justify-content-md-start">
            <ul class="contact_detail text-center text-lg-start contacthead">
                @empty($parametre)
                <li><i class="ti-email"></i><span> <a href="mailto:infos@centraledumobilier.com">infos@centraledumobilier.com</a></span></li>
                <li><i class="ti-mobile"></i><span> <a href="https://wa.me/+22955221080?text=Bonjour,">+229 55221080</a></span></li>
                @else
                <li><i class="ti-email"></i><span>{{$parametre->email1}}</span></li>
                <li><i class="ti-mobile"></i><span> {{$parametre->phone}}</span></li>
                @endempty
            </ul>
        </div>
    </div>
    <div class="col-6">
        <div class="text-center text-md-end">
            <ul class="header_list menulink">

                @if (Auth::guest())
                <li><a href="{{route('login')}}" class="{{ Route::currentRouteName()== 'login' ? 'active' : '' }}"><i class="ti-user"></i><span>Login</span></a></li>
                <li><a href="{{route('register')}}" class="{{ Route::currentRouteName()== 'register' ? 'active' : '' }}"><i class="ti-user"></i><span>Register</span></a></li>
                @else
                <li><a href="{{route('site.my-account')}}" class="{{ Route::currentRouteName()== 'site.my-account' ? 'active' : '' }}"><i class="ti-user"></i><span>Mon Compte</span></a></li>

                @endif
            </ul>
        </div>
    </div>
</div>

