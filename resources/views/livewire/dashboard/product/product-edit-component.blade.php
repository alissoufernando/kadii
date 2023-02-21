@section('title', 'Produits')
@section('styles')

@endsection

@section('breadcrumb-title', 'Produits')
@section('breadcrumb-items')
<li class="breadcrumb-item">Tableau de bord</li>
<li class="breadcrumb-item active">Modifier un produit</li>
@endsection
<div>
<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <h5 class="d-inline">modifier un produit</h5>
            <a href="{{route('admin.product-index')}}" class="btn  btn-primary btn-sm float-end">Les produits</a>
            @if (Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
        </div>
        <div class="card-body">
          <form class="form-wizard"  wire:submit.prevent="updateProduct">
            @csrf
              <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="name">Nom du product:</label>
                            <input class="form-control" id="name" type="text" placeholder="Nom du produit" required="required" wire:model="name" wire:keyup="generateSlug">
                          </div>
                          <div class="col-md-6 mb-3">
                              <label class="form-label" for="slug">slug du produit:</label>
                              <input class="form-control" id="slug" type="text" placeholder="slug" wire:model="slug">
                          </div>
                          <div class="col-md-6 mb-3">
                            <label class="form-label" for="normal_price">Prix de vente:</label>
                            <input class="form-control" id="normal_price" type="text" placeholder="prix vente" wire:model="normal_price">
                          </div>
                          <div class="col-md-6 mb-3">
                              <label class="form-label" for="sku">SKU du produit:</label>
                              <input class="form-control" id="sku" type="text" placeholder="sku" wire:model="sku">
                          </div>
                            <div class="col-md-6 mb-3">
                              <label class="form-label" for="categorie_id">Catégories:</label>
                                  <select class="form-select" required="" wire:model="categorie_id" wire:change="changeSubcategory">
                                      <option value="0">None</option>
                                      @foreach ($categorie as $categories)
                                      <option value="{{$categories->id}}">{{$categories->name}}</option>
                                      @endforeach
                                  </select>
                                  <div class="invalid-feedback">veillez selectionner une categorie</div>
                            </div>
                            <div class="col-md-6 mb-3">
                              <label class="form-label" for="categorie_id">Sous-Catégories:</label>
                                  <select class="form-select" wire:model="scategorie_id">
                                      <option value="0">None</option>
                                      @foreach ($scategorie as $scategories)
                                      <option value="{{$scategories->id}}">{{$scategories->name}}</option>
                                      @endforeach
                                  </select>

                            </div>
                            <div class="col-md-12 row">
                                <label class="form-label" for="categorie_id">Attributes du produit:</label>
                                <div class="col-md-10">
                                    <select class="form-select" wire:model="attr">
                                        <option value="0">None</option>
                                        @foreach ($pattribute as $pattributes)
                                        <option value="{{$pattributes->id}}">{{$pattributes->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary" wire:click.prevent="add"> Add</button>
                                </div>
                            </div>
                            @foreach ($inputs as $key => $value)
                            <div class="col-md-12 row">
                                <label class="form-label" for="attribute_values">{{$pattribute->where('id',$attribute_arr[$key])->first()->name}}:</label>
                                <div class="col-md-10">
                                    <input class="form-control mb-2" id="attribute_values" type="text" placeholder="{{$pattribute->where('id', $attribute_arr[$key])->first()->name}}" wire:model="attribute_values.{{$value}}">
                                    <input class="form-control" id="attribute_prices" type="text" placeholder="le prix" wire:model="attribute_prices.{{$value}}">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger" wire:click.prevent="remove({{$key}})"> Remove</button>
                                </div>
                            </div>

                            @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="categorie_id">Sous Sous-Catégories:</label>
                                <select class="form-select" wire:model="sscategorie_id">
                                    <option value="0">None</option>
                                    @foreach ($sscategorie as $sscategories)
                                    <option value="{{$sscategories->id}}">{{$sscategories->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">veillez selectionner une categorie</div>
                          </div>
                        <div class="col-md-6 mb-3">
                          <label class="form-label" for="sale_price">Prix promo:</label>
                          <input class="form-control" id="sale_price" type="text" placeholder="prix promo" wire:model="sale_price">
                        </div>
                        <div class="col-md-6 mb-3">
                          <label class="form-label" for="quantity">Quantité:</label>
                          <input class="form-control" id="quantity" type="text" placeholder="la quantité" wire:model="quantity">
                        </div>
                        <div class="col-md-6 mb-3">
                          <label class="form-label" for="quantity_alert">Quantité d'Alert:</label>
                          <input class="form-control" id="quantity_alert" type="text" placeholder="la quantité d'alert" wire:model="quantity_alert">
                        </div>
                        @if($N_categorie != "" && $N_categorie->name == "Bureau")
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="price_c">Prix du caissons:</label>
                            <input class="form-control" id="price_c" type="text" placeholder="Prix du caissons" wire:model="price_c">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="price_r">Prix retour bureau:</label>
                            <input class="form-control" id="price_r" type="text" placeholder="le prix du retour du bureau" wire:model="price_r">
                        </div>
                        @endif
                        <div class="col-md-12">
                            <label class="form-label" for="description">Description:</label>
                            <textarea class="form-control" id="description" rows="3" wire:model="description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary btn-sm" >Modifier</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid Ends-->
</div>

@section('scripts')
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
<script src="{{asset('assets/js/form-wizard/form-wizard.js')}}"></script>
@endsection
