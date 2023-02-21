
@section('title', 'Contacts')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endsection

@section('breadcrumb-title', 'Contacts')
@section('breadcrumb-items')
<li class="breadcrumb-item">Tableau de bord</li>
<li class="breadcrumb-item active">Liste des Contacts</li>
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

                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-sm">
                            <table wire:ignore class="display " id="basic-1">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Commentaires</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1
                                @endphp
                                @foreach ($contact as $contacts)
                                <tr>
                                    <td>{{$i ++}}</td>
                                    <td>{{$contacts->name}}</td>
                                    <td>{{$contacts->phone}}</td>
                                    <td>{{$contacts->email}}</td>
                                    <td>{{$contacts->comment}}</td>
                                    <td>

                                    <a href="#" wire:click.prevent="deleteContact({{$contacts->id}})"> <i class="fa fa-trash-o fa-1x text-danger"></i> </a>
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
