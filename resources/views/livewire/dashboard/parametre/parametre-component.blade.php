
@section('title', 'Parametre')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endsection

@section('breadcrumb-title', 'Parametre')
@section('breadcrumb-items')
<li class="breadcrumb-item">Tableau de bord</li>
<li class="breadcrumb-item active">Liste des Parametre</li>
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
                        <h5 class="d-inline">Liste des Parametre</h5>
                        <a href="" data-bs-toggle="modal" data-bs-target="#ModalParametre" class="btn  btn-primary btn-sm float-end">Ajouter</a>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-sm">
                            <table wire:ignore class="display " id="basic-1">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>logo</th>
                                <th>Email 1</th>
                                <th>Email 2</th>
                                <th>phone</th>
                                <th>Map</th>
                                <th>facebook</th>
                                <th>instagram</th>
                                <th>twitter</th>
                                <th>youtube</th>
                                <th>Adresse</th>
                                <th>google</th>
                                <th colspan="2" class="text-center">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @empty($parametre)
                                @else
                                @php
                                $i=1
                                @endphp
                                @foreach ($parametre as $parametres)
                                <tr>
                                    <td>{{$i ++}}</td>
                                    <td><img src="{{ asset('storage') }}/{{ $parametres->logo }}" alt="" width="100" height="100"></td>
                                    <td>${{$parametres->email1}}</td>
                                    <td>${{$parametres->email2}}</td>
                                    <td>${{$parametres->phone}}</td>
                                    <td>{{$parametres->Map}}</td>
                                    <td>{{$parametres->facebook}}</td>
                                    <td>{{$parametres->instagram}}</td>
                                    <td>{{$parametres->twitter}}</td>
                                    <td>{{$parametres->youtube}}</td>
                                    <td>{{$parametres->adress}}</td>
                                    <td>{{$parametres->google}}</td>
                                    <td>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#ModalParametre" wire:click.prevent='getElementById({{$parametres->id}})'>  <i class="fa fa-edit m-5 text-warning"></i> </a>
                                        <a href="#" wire:click.prevent="deleteParametre({{$parametres->id}})"> <i class="fa fa-trash-o fa-1x text-danger"></i> </a>
                                        </td>
                                </tr>

                                @endforeach
                                @endempty

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
    @include('livewire.dashboard.parametre.modalParametre')

</div>


@section('scripts')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>

@endsection
