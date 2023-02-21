
@section('title', 'Commandes')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endsection

@section('breadcrumb-title', 'Commandes')
@section('breadcrumb-items')
<li class="breadcrumb-item">Tableau de bord</li>
<li class="breadcrumb-item active">Liste des Commandes</li>
@endsection
<div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div wire:ignore class="col-sm-12">
                <div class="card rounded-0">
                    <div class="  card-header">
                        @if (Session::has('message'))
                        <div class="alert alert-success">{{Session::get('message')}}</div>
                    @endif
                        <h5 class="d-inline">Liste des Commandes</h5>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-sm">
                            <table wire:ignore class="display " id="basic-1">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>subtotal</th>
                                <th>discount</th>
                                <th>Tax</th>
                                <th>Total</th>
                                <th>firstname</th>
                                <th>lastname</th>
                                <th>mobile</th>
                                <th>zipcode</th>
                                <th>order date</th>
                                <th colspan="2" class="text-center">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1
                                @endphp
                                @foreach ($order as $orders)
                                <tr>
                                    <td>{{$i ++}}</td>
                                    <td>${{$orders->subtotal}}</td>
                                    <td>${{$orders->discount}}</td>
                                    <td>${{$orders->tax}}</td>
                                    <td>${{$orders->total}}</td>
                                    <td>{{$orders->firstname}}</td>
                                    <td>{{$orders->lastname}}</td>
                                    <td>{{$orders->mobile}}</td>
                                    <td>{{$orders->zipcode}}</td>
                                    <td>{{$orders->created_at}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a class="btn btn-success float-end" href="{{route('admin.detail-order',['order_id' => $orders->id])}}"> Details</a>

                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Status
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{$orders->id}}, 'delivered')">Delivered</a></li>
                                                    <li><a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{$orders->id}}, 'canceled')">Canceled</a></li>
                                                    </ul>
                                            </div>
                                        </div>

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

</div>


@section('scripts')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>

@endsection
