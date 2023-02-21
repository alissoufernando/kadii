
@section('title', 'Sales')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endsection

@section('breadcrumb-title', 'Sales')
@section('breadcrumb-items')
<li class="breadcrumb-item">Tableau de bord</li>
<li class="breadcrumb-item active">Liste des Sales</li>
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
                        <h5 class="d-inline">Liste des Sale</h5>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalSale" class="btn  btn-primary btn-sm float-end">Ajouter</a>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-sm">
                            <table wire:ignore class="display " id="basic-1">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Date </th>
                                <th>Titre</th>
                                <th>Sous-Titre</th>
                                <th>Liens</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1
                                @endphp
                                @foreach ($sale  as $sales)
                                <tr>
                                    <td>{{$i ++}}</td>
                                    <td> <img src="{{ asset('storage') }}/{{ $sales->image }}" alt="" width="100" height="100"> </td>
                                    <td>
                                        @if ($sales->status == 0)
                                        Inactive
                                        @else
                                        Active
                                        @endif
                                    </td>

                                    <td>{{$sales->sale_date}}</td>
                                    <td>{{$sales->title}}</td>
                                    <td>{{$sales->subtitle}}</td>
                                    <td>{{$sales->link}}</td>
                                    <td>

                                    <a href="" data-bs-toggle="modal" data-bs-target="#modalSale" wire:click.prevent='getElementById({{$sales->id}})'>  <i class="fa fa-edit m-5 text-warning"></i> </a>
                                    <a href="#" wire:click.prevent="deleteSale({{$sales->id}})"> <i class="fa fa-trash-o fa-1x text-danger"></i> </a>
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
    @include('livewire.dashboard.sale.modalSale')
</div>

@section('scripts')

<script>
    $(function(){
        $('#sale-date').datetimepicker({
            format: 'Y-MM-DD h:m:s',
        })
        .on('dp.change',function(ev) {
            var date = $('#sale-date').val();
            @this.set('sale_date', data);
        });
    });
</script>
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection
