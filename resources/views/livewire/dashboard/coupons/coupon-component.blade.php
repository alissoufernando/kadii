
@section('title', 'Coupons')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endsection

@section('breadcrumb-title', 'Coupons')
@section('breadcrumb-items')
<li class="breadcrumb-item">Tableau de bord</li>
<li class="breadcrumb-item active">Liste des Coupons</li>
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
                        <h5 class="d-inline">Liste des Coupons</h5>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalCoupon" class="btn  btn-primary btn-sm float-end">Ajouter</a>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-sm">
                            <table wire:ignore class="display " id="basic-1">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Coupon Code</th>
                                <th>Coupon Type</th>
                                <th>Coupon Value</th>
                                <th>Cart Value</th>
                                <th>Date d'expiration</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1
                                @endphp
                                @foreach ($coupon  as $coupons)
                                <tr>
                                    <td>{{$i ++}}</td>
                                    <td>{{$coupons->code}}</td>
                                    <td>{{$coupons->type}}</td>
                                    <td>
                                        @if ($coupons->type == 'fixed')
                                        {{$coupons->value}}
                                        @else
                                        {{$coupons->value}} %
                                        @endif
                                    </td>
                                    <td>{{$coupons->cart_value}}</td>
                                    <td>{{$coupons->expiry_date}}</td>
                                    <td>

                                    <a href="" data-bs-toggle="modal" data-bs-target="#modalCoupon" wire:click.prevent='getElementById({{$coupons->id}})'>  <i class="fa fa-edit m-5 text-warning"></i> </a>
                                    <a href="#" wire:click.prevent="deleteCoupon({{$coupons->id}})"> <i class="fa fa-trash-o fa-1x text-danger"></i> </a>
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
    @include('livewire.dashboard.coupons.modalCoupon')
</div>

@section('scripts')
<script>
    $(function() {
        $('$expiry_date').detetimepicker({
            format: 'YYYY-MM-DD'
        })
        .on('dp.change',function(ev) {
            var date = $('expiry_date').val();
            @this.set('expiry_date', data);
        });
    });
</script>
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection
