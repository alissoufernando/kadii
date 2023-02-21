
@section('title', 'Catégories')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endsection

@section('breadcrumb-title', 'Catégories')
@section('breadcrumb-items')
<li class="breadcrumb-item">Tableau de bord</li>
<li class="breadcrumb-item active">Liste des Catégories</li>
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
                        <h5 class="d-inline">Liste des Catégories</h5>
                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn  btn-primary btn-sm float-end">Ajouter</a>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-sm">
                            <table wire:ignore class="display " id="basic-1">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Sous categories</th>
                                <th>Menu</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1
                                @endphp
                                @foreach ($categorie as $categories)
                                <tr>
                                    <td>{{$i ++}}</td>
                                    <td>{{$categories->name}}</td>
                                    <td>{{$categories->slug}}</td>
                                    <td>
                                        <ul style="list-style:none; ">
                                            @foreach($categories->subcategories as $scategories)
                                            <li>
                                                <i class="fa fa-caret-right" style="margin-right: 5px;"></i>{{$scategories->name}}
                                                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" wire:click.prevent='getElementById({{$categories->id}},{{ $scategories->id}})'>  <i class="fa fa-edit text-warning"></i> </a>
                                                <a href="#" wire:click.prevent="deleteSubcategory({{$scategories->id}})"> <i class="fa fa-trash-o text-danger"></i> </a>

                                                <ol>
                                                    @foreach($categories->subsubcategories as $sscategories)
                                                    <li style="margin-left: 20px;margin-top: 10px">
                                                        {{$sscategories->name}}
                                                        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" wire:click.prevent='getElementById({{$categories->id}},{{ $scategories->id}},{{ $sscategories->id}})'>  <i class="fa fa-edit text-warning"></i> </a>
                                                        <a href="#" wire:click.prevent="deleteSubsubcategory({{$sscategories->id}})"> <i class="fa fa-trash-o text-danger"></i> </a>

                                                    </li>
                                                    @endforeach
                                                </ol>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td  class="text-center">
                                        @if ($categories->menu == 0)

                                        <span class="fw-bold">c'est pas un menu</span>

                                        <form wire:submit.prevent="updatemenu({{$categories->id}})">
                                            <label class="mt-3" for="">Voulez-vous <b>l'activé</b> ?</label><br>
                                            <button type="submit" class="btn btn-outline-primary btn-sm  mt-3" style="
                                            font-size: 10px;
                                            border-radius: 10px;
                                            width:30%; ">Oui</button>
                                        </form>

                                        @else
                                        <span class="fw-bold">c'est un menu</span>

                                        <form  wire:submit.prevent="updatemenu({{$categories->id}})">
                                            <label class="mt-3" for="">Voulez-vous le<b> désactivé </b>?</label><br>

                                            <button type="submit" class="btn btn-outline-primary btn-sm mt-3" style="
                                            font-size: 10px;
                                            border-radius: 10px;
                                            width:30%; ">Oui</button>
                                        </form>
                                        @endif
                                    </td>
                                    <td>

                                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" wire:click.prevent='getElementById({{$categories->id}})'>  <i class="fa fa-edit m-5 text-warning"></i> </a>
                                    <a href="#" wire:click.prevent="deleteCategory({{$categories->id}})"> <i class="fa fa-trash-o fa-1x text-danger"></i> </a>
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
    @include('livewire.dashboard.category.modal')
</div>


@section('scripts')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection
