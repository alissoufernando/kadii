
@section('title', 'Produits')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endsection

@section('breadcrumb-title', 'Produits')
@section('breadcrumb-items')
<li class="breadcrumb-item">Tableau de bord</li>
<li class="breadcrumb-item active">Liste des produits</li>
@endsection

<!-- Container-fluid starts-->
<div wire:ignore class="container-fluid">
  <div class="row">
    <!-- Zero Configuration  Starts-->
    <div class="col-sm-12">
      <div  class="card rounded-0">
        <div class="  card-header">
            @if (Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        <h5 class="d-inline">Liste des produits</h5>
        <a href="{{route('admin.product-create')}}" class="btn  btn-primary btn-sm float-end">Ajouter</a>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table wire:ignore class="display" id="basic-1">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Prix de vente</th>
                  <th>Prix Promo</th>
                  <th>Quantité</th>
                  <th>Quantité Alert</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                  @php
                      $i = 1;
                  @endphp
                  @foreach ($product as $products)
                  <tr>
                    <td>{{$i ++}}</td>
                    <td>{{$products->name}}</td>
                    <td>{{$products->description}}</td>
                    <td>{{$products->normal_price}}</td>
                    <td>{{$products->sale_price}}</td>
                    <td>{{$products->quantity}}</td>
                    <td>{{$products->quantity_alert}}</td>
                    <td>
                      <a href="{{route('admin.detail-produit',['id' => $products->id])}}"> <i class="fa fa-list fa-1x m-5 text-primary"></i> </a>
                      <a href="{{route('admin.product-edit',['id' => $products->id])}}"> <i class="fa fa-edit fa-1x m-5 text-warning"></i> </a>
                      <a href="#" wire:click.prevent="deleteProduct({{$products->id}})"> <i class="fa fa-trash-o fa-1x text-danger"></i> </a>
                    </td>
                  </tr>
                  @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Zero Configuration  Ends-->

  </div>
</div>
<!-- Container-fluid Ends-->

@section('scripts')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection
