@section('title', 'Produits')
@section('styles')

@endsection

@section('breadcrumb-title', 'Produits')
@section('breadcrumb-items')
<li class="breadcrumb-item">Tableau de bord</li>
<li class="breadcrumb-item active">Ajouter un produit</li>
@endsection
<div>
<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <h5 class="d-inline">Ajouter un produit</h5>
            <a href="{{route('admin.product-index')}}" class="btn  btn-primary btn-sm float-end">Les produits</a>
            @if (Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
        </div>
        <div class="card-body">
          <form class="form-wizard"  wire:submit.prevent="saveProduct">
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
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
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
                        <div class="col-md-12">
                            <label class="form-label" for="description">Description:</label>
                            <textarea class="form-control" id="description" rows="3" wire:model="description"></textarea>
                        </div>
                    </div>
                </div>



                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary btn-sm" >Ajouter</button>
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
