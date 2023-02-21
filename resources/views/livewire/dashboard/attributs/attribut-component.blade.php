
@section('title', 'Attributes')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endsection

@section('breadcrumb-title', 'Attributes')
@section('breadcrumb-items')
<li class="breadcrumb-item">Tableau de bord</li>
<li class="breadcrumb-item active">Liste des Attributes</li>
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
                        <h5 class="d-inline">Liste des Attributes</h5>
                        <a href="" data-bs-toggle="modal" data-bs-target="#ModalAttribute" class="btn  btn-primary btn-sm float-end">Ajouter</a>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-sm">
                            <table wire:ignore class="display " id="basic-1">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>code</th>
                                <th>Name</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1
                                @endphp
                                @foreach ($pattribute as $pattributes)
                                <tr>
                                    <td>{{$i ++}}</td>
                                    <td>{{$pattributes->code}}</td>
                                    <td>{{$pattributes->name}}</td>
                                    <td>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#ModalAttribute" wire:click.prevent='getElementById({{$pattributes->id}})'>  <i class="fa fa-edit m-5 text-warning"></i> </a>
                                    <a href="#" wire:click.prevent="deleteAttribute({{$pattributes->id}})"> <i class="fa fa-trash-o fa-1x text-danger"></i> </a>
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
    @include('livewire.dashboard.attributs.modalAttribute')
</div>


@section('scripts')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection

