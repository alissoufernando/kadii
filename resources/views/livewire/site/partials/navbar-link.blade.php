
<ul class="navbar-nav">
    @if (Auth::guest())
    <li><a class="nav-link nav_item {{ Route::currentRouteName()== 'welcome' ? 'active' : '' }}" href="{{route('welcome')}}">Haus</a></li>
    @foreach ($categorieMenu as $categorieMenus)
    <li><a class="nav-link nav_item {{ (request()->is('site/produit-categorie/')) ? 'active' : '' }}" href="{{route('site.produit-categorie',['id' => $categorieMenus->id])}}">{{$categorieMenus->name}}</a></li>
    @endforeach
    <li><a class="nav-link nav_item {{ Route::currentRouteName()== 'site.shop' ? 'active' : '' }}" href="{{route('site.shop')}}">Geschäft</a></li>
    <li><a class="nav-link nav_item {{ Route::currentRouteName()== 'site.contact' ? 'active' : '' }}" href="{{route('site.contact')}}">Kontakt</a></li>
    @else
    <li><a class="nav-link nav_item {{ Route::currentRouteName()== 'welcome' ? 'active' : '' }}" href="{{route('welcome')}}">Haus</a></li>

    @foreach ($categorieMenu as $categorieMenus)

    <li><a class="nav-link nav_item {{  request('id')== $categorieMenus->id? 'active' : '' }}" href="{{route('site.produit-categorie',['id' => $categorieMenus->id])}}">{{$categorieMenus->name}}</a></li>
    @endforeach
    <li><a class="nav-link nav_item {{ Route::currentRouteName()== 'site.shop' ? 'active' : '' }}" href="{{route('site.shop')}}">Geschäft</a></li>
    <li><a class="nav-link nav_item {{ Route::currentRouteName()== 'site.contact' ? 'active' : '' }}" href="{{route('site.contact')}}">Kontakt</a></li>
    @can('admin-admin')
    <li><a class="nav-link nav_item {{ Route::currentRouteName()== 'dashboard' ? 'active' : '' }}" href="{{route('dashboard')}}">Kontrollzentrum</a></li>
    @endcan
    @endif
</ul>

