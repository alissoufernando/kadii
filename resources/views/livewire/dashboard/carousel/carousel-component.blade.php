
@section('title', 'Catégories')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endsection

@section('breadcrumb-title', 'Carousels')
@section('breadcrumb-items')
<li class="breadcrumb-item">Tableau de bord</li>
<li class="breadcrumb-item active">Liste des Carousels</li>
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
                        <h5 class="d-inline">Liste des Carousels</h5>
                        <a href="" data-bs-toggle="modal" data-bs-target="#ModalCarousel" class="btn  btn-primary btn-sm float-end">Ajouter</a>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-sm">
                            <table wire:ignore class="display " id="basic-1">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Sous-Titre</th>
                                <th>Liens</th>
                                <th>Description</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1
                                @endphp
                                @foreach ($carousel as $carousels)
                                <tr>
                                    <td>{{$i ++}}</td>
                                    <td><img src="{{ asset('storage') }}/{{ $carousels->image }}" alt="" width="100" height="100"></td>
                                    <td>{{$carousels->title}}</td>
                                    <td>{{$carousels->subtitle}}</td>
                                    <td>{{$carousels->link}}</td>
                                    <td>{{$carousels->text}}</td>
                                    <td>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#ModalCarousel" wire:click.prevent='getElementById({{$carousels->id}})'>  <i class="fa fa-edit m-5 text-warning"></i> </a>
                                    <a href="#" wire:click.prevent="deleteCarousel({{$carousels->id}})"> <i class="fa fa-trash-o fa-1x text-danger"></i> </a>
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
    @include('livewire.dashboard.carousel.modalCarousel')
</div>


@section('scripts')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection

