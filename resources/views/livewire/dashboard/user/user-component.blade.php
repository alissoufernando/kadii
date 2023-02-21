@section('title', 'Utilisateur')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endsection

@section('breadcrumb-title', 'Utilisateur')
@section('breadcrumb-items')
    <li class="breadcrumb-item">Tableau de bord</li>
    <li class="breadcrumb-item active">Liste des utilisateurs</li>
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
                            <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif

                        <h5 class="d-inline">Liste des utilisateurs</h5>
                        <a href="" data-bs-toggle="modal" data-bs-target="#ModalUser"
                            class="btn  btn-primary btn-sm float-end">Ajouter</a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table wire:ignore class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Prénoms</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($user as $users)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $users->name }}</td>
                                            <td>{{ $users->firstname }}</td>
                                            <td>{{ $users->email }}</td>
                                            <td>
                                                <a data-bs-toggle="modal" data-bs-target="#ModalUser"
                                                    wire:click.prevent='getElementById({{ $users->id }})'> <i
                                                        class="fa fa-edit m-5 text-warning"></i> </a>
                                                <a wire:click.prevent="deleteUser({{ $users->id }})"> <i
                                                        class="fa fa-trash-o fa-1x text-danger"></i> </a>
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
    @include('livewire.dashboard.user.modal')
    <!-- Container-fluid Ends-->
</div>


@section('scripts')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    {{-- @include('livewire.dashboard.partials.confirmation-de-suppression') --}}
@endsection
