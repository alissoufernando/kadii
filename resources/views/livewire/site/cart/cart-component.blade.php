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
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container minimenu">
        <!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Einkaufswagen</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Haus</a></li>
                    <li class="breadcrumb-item"><a href="#">Produkts</a></li>
                    <li class="breadcrumb-item active">Einkaufswagen</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
    @endsection
    <!-- START MAIN CONTENT -->
    <div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            @if (Cart::instance('cart')->count() > 0)
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shop_cart_table">
                        @if (Cart::instance('cart')->count() > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Produkt</th>
                                    <th class="product-price">Preis</th>
                                    <th class="product-quantity">Menge</th>
                                    <th class="product-subtotal">Gesamt</th>
                                    <th class="product-remove">Entfernen</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (Cart::instance('cart')->content() as $item)
                                <tr>
                                    @empty($item->model->images->first()->full)
                                    <td class="product-thumbnail"><a href="#"><img src="{{asset('assets/images/product/default.png')}}" alt="{{$item->name}}"></a></td>
                                    @else
                                    @php
                                        $images = explode(",",$item->model->images->first()->full);
                                    @endphp
                                    <td class="product-thumbnail"><a href="#"><img src="{{asset('storage/galerie')}}/{{$images[0]}}" alt="{{$item->name}}"></a></td>
                                    @endempty
                                    <td class="product-name" data-title="Product"><a href="#">{{$item->name}}</a></td>
                                    <td class="product-price" data-title="Price">{{$item->price}} €</td>
                                    <td class="product-quantity" data-title="Quantity"><div class="quantity">
                                    <input type="button" value="-" class="minus" wire:click.prevent ="decreaseQuantity('{{$item->rowId}}')">
                                    <input type="text" name="quantity" value="{{$item->qty}}" title="Qty" class="qty" size="4">
                                    <input type="button" value="+" class="plus" wire:click.prevent ="increaseQuantity('{{$item->rowId}}')">
                                  </div>
                                  <p class="text-center"> <a href="" wire:click.prevent ="switchToSaveForLater('{{$item->rowId}}')"> Speichern Sie für später</a></p>
                                </td>
                                      <td class="product-subtotal" data-title="Total">{{$item->subtotal}} €</td>
                                    <td class="product-remove" data-title="Remove"><a href="#" wire:click.prevent ="destroy('{{$item->rowId}}')"><i class="ti-close"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" class="px-0">
                                        <div class="row g-0 align-items-center">

                                           @if (!Session::has('coupon'))
                                           <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                            <form wire:submit.prevent="applyCouponCode">
                                                @if (Session::has('message'))
                                                    <p class="text-danger">{{Session::get('message')}}</p>
                                                @endif
                                                <div class="coupon field_form input-group">
                                                    <input type="text" value="" class="form-control form-control-sm" placeholder="Gutschein-Code eingeben.." wire:model="couponCode">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-fill-out btn-sm" type="submit">Gutschein anwenden</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>

                                           @endif
                                            <div class="col-lg-8 col-md-6  text-start  text-md-end">
                                                <button class="btn btn-line-fill btn-sm" type="submit">Einkaufswagen aktualisieren</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        @else

                            <p class="text-center">
                                Es wurden keine Produkte hinzugefügt
                            </p>


                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="heading_s1 mb-3">
                        <h6>Berechnen Sie Versandkosten</h6>
                    </div>
                    <form class="field_form shipping_calculator">
                        <div class="form-row">
                            <div class="form-group col-lg-12 mb-3">
                                <div class="custom_select">
                                    <select class="form-control">
                                        <option value="">Wähle eine Option...</option>
                                        <option value="AX">Aland Islands</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="PW">Belau</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia</option>
                                        <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="VG">British Virgin Islands</option>
                                        <option value="BN">Brunei</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo (Brazzaville)</option>
                                        <option value="CD">Congo (Kinshasa)</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">CuraÇao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and McDonald Islands</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="CI">Ivory Coast</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Laos</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao S.A.R., China</option>
                                        <option value="MK">Macedonia</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia</option>
                                        <option value="MD">Moldova</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="AN">Netherlands Antilles</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="KP">North Korea</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PS">Palestinian Territory</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="QA">Qatar</option>
                                        <option value="IE">Republic of Ireland</option>
                                        <option value="RE">Reunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russia</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="ST">São Tomé and Príncipe</option>
                                        <option value="BL">Saint Barthélemy</option>
                                        <option value="SH">Saint Helena</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="SX">Saint Martin (Dutch part)</option>
                                        <option value="MF">Saint Martin (French part)</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="SM">San Marino</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia/Sandwich Islands</option>
                                        <option value="KR">South Korea</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syria</option>
                                        <option value="TW">Taiwan</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom (UK)</option>
                                        <option value="US">USA (US)</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VA">Vatican</option>
                                        <option value="VE">Venezuela</option>
                                        <option value="VN">Vietnam</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="WS">Western Samoa</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6 mb-3">
                                <input required="required" placeholder="Land" class="form-control" name="name" type="text">
                            </div>
                            <div class="form-group col-lg-6 mb-3">
                                <input required="required" placeholder="PLZ" class="form-control" name="name" type="text">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12 mb-3">
                                <button class="btn btn-fill-line" type="submit">Summen aktualisieren</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="border p-3 p-md-4">
                        <div class="heading_s1 mb-3">
                            <h6>Einkaufswagen-Gesamtsummen</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">Warenkorb Zwischensumme</td>
                                        <td class="cart_total_amount">{{Cart::instance('cart')->subtotal()}} €</td>
                                    </tr>
                                    @if (Session::has('coupon'))
                                    <tr>
                                        <td class="cart_total_label">Rabatt ({{Session::instance('coupon')['code']}}) <a href="#" wire:click.prevent="removeCoupon"> <i class="fa fa-trash-o text-danger"></i> </a> </td>
                                        <td class="cart_total_amount"> - {{number_format($discount,2)}} €</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Warenkorbsteuer ({{config('cart.tax')}}%) </td>
                                        <td class="cart_total_amount">{{number_format($taxAfterDiscount, 2)}} €</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Warenkorb Zwischensumme</td>
                                        <td class="cart_total_amount">{{number_format($subtotalAfterDiscount,2)}} €</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Gesamt</td>
                                        <td class="cart_total_amount"><strong>{{$totalAfterDiscount}} €</strong></td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td class="cart_total_label">Warenkorbsteuer</td>
                                        <td class="cart_total_amount">{{Cart::instance('cart')->tax()}} €</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Versand</td>
                                        <td class="cart_total_amount">Kostenloser Versand</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Gesamt</td>
                                        <td class="cart_total_amount"><strong>{{Cart::instance('cart')->total()}} €</strong></td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <a href="#" wire:click.prevent="checkout" class="btn btn-fill-out">Zur Kasse</a>
                    </div>
                </div>
            </div>

            @else
            <div class="text-center" style="padding: 30px 0 ;">
                <h1> Dein Korb ist leer</h1>
                <p>Stellen Sie sicher, dass Sie ein neues Produkt hinzufügen</p>
                <a href="{{route('site.shop')}}" class="btn btn-success">Geschäft</a>
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <h3> {{Cart::instance('saveForLater')->count()}} produit(s) Sauvegarde</h3>
                    <div class="table-responsive shop_cart_table">
                        @if (Cart::instance('saveForLater')->count() > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Produkt</th>
                                    <th class="product-price">Preis</th>
                                    <th class="product-remove">Umzug</th>
                                    <th class="product-remove">Entfernen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::instance('saveForLater')->content() as $item)
                                <tr>

                                    <td class="product-thumbnail"><a href="#"><img src="{{asset('assets/images/product/default.png')}}" alt="{{$item->name}}"></a></td>
                                    {{-- @empty($item->model->images->first()->full)
                                    @else
                                    @php
                                        $images = explode(",",$item->model->images->first()->full);
                                    @endphp
                                    <td class="product-thumbnail"><a href="#"><img src="{{asset('storage/galerie')}}/{{$images[0]}}" alt="{{$item->name}}"></a></td>
                                    @endempty --}}

                                    <td class="product-name" data-title="Product"><a href="#">{{$item->name}}</a></td>
                                    <td class="product-price" data-title="Price">{{$item->price}} FCFA</td>
                                    <td class="product-quantity" data-title="Quantity">
                                    <p class="text-center"> <a href="" wire:click.prevent ="moveToCart('{{$item->rowId}}')"> Wagen</a></p>
                                    </td>
                                    <td class="product-remove" data-title="Remove"><a href="#" wire:click.prevent ="deleteFromSaveForLater('{{$item->rowId}}')"><i class="ti-close"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        @else
                            <p class="text-center">
                                Es wurden keine Produkte hinzugefügt
                            </p>
                        @endif
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

