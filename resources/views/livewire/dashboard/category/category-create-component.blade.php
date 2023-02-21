@extends('layouts.sidebardark.master')
@section('title', 'Product')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/chartist.css')}}">
<!-- Plugins css start-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">
<!-- Plugins css Ends-->
@endsection

@section('breadcrumb-title', 'Product')
@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard  </li>
<li class="breadcrumb-item active">Product</li>
@endsection

@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">

        <div class="card">
          <div class="card-header">
            <h5>Ajout d'un produit</h5>
            <a href="{{route('admin.product-components')}}" class="btn btn-pill btn-outline-success float-end">Les produits</a>
          </div>
          <form class="form theme-form">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">nom du produit:</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" name="name" placeholder="nom du produit">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col">
                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Prix de vente:</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" name="priceVente" placeholder="prix de vente">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col">
                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Prix de promo:</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" name="pricePromo" placeholder="prix de promo">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col">
                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Quantité:</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" name="quantity" placeholder="quantité">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col">
                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Quantité d'alert:</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" name="quantityAlert" placeholder="Quantité d'alert">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col">
                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Reference du produit:</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" name="productReference" placeholder="reference du produit">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col">
                  <div class="row">
                    <label class="col-sm-3 col-form-label">Categories:</label>
                    <div class="col-sm-9">
                      <select class="custom-select form-select">
                        <option value="1">Categories1</option>
                        <option value="2">Categories2</option>

                      </select>
                    </div>
                  </div>
                </div>
              </div>


              <div class="row mt-5">
                <div class="col">
                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Description:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea" required=""></textarea>
                        <div class="invalid-feedback">Please enter a message in the textarea.</div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button class="btn btn-success" type="submit">Ajouter</button>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- Container-fluid Ends-->

@endsection
@section('scripts')
<script src="{{asset('assets/js/chart/chartist/chartist.js')}}"></script>
<script src="{{asset('assets/js/chart/knob/knob.min.js')}}"></script>
<script src="{{asset('assets/js/chart/knob/knob-chart.js')}}"></script>
<script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
<script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
<script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
<script src="{{asset('assets/js/notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/js/dashboard/default.js')}}"></script>
<script src="{{asset('assets/js/notify/index.js')}}"></script>
<script src="{{asset('assets/js/height-equal.js')}}"></script>
@endsection
