  <!-- Vertically centered modal-->

  <div wire:ignore.self class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            @if ($categorie_id)
            <h5 class="modal-title text-center">Edit une catégories</h5>
            @else
            <h5 class="modal-title text-center">Ajouter une catégories</h5>
            @endif
          <button wire:click.prevent='resetInputFields' class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form theme-form" wire:submit.prevent='saveCategory'>
                <div class="modal-body">
                        <div class="card-body">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label class="form-label" for="name">Nom de la categories:</label>
                            <input class="form-control form-control-lg" id="name" type="text" placeholder="nom de la categories" wire:model.lazy='name' wire:keyup="generateSlug">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label class="form-label" for="slug">Slug de la categories:</label>
                            <input class="form-control form-control-lg" id="slug" type="text" placeholder="Slug de la categories" wire:model.lazy='slug'>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="md-3">
                                <label class="form-label" for="parent_id">Sous Catégories:</label>
                                <select class="form-select" wire:model.lazy="parent_id">
                                    <option value="">None</option>
                                    @foreach ($categorie as $categories)
                                    <option value="{{$categories->id}}">{{$categories->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="md-3">
                                <label class="form-label" for="parent_id">Sous Sous-Catégories:</label>
                                <select class="form-select" wire:model.lazy="parents_id">
                                    <option value="">None</option>
                                    @foreach ($subcategorie as $subcategories)
                                    <option value="{{$subcategories->id}}">{{$subcategories->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start" >
                    @if ($categorie_id)
                    <button type="submit" class="btn btn-primary btn-sm">
                        Modifier
                    </button>
                    @else
                    <button type="submit" class="btn btn-primary btn-sm">
                        Ajouter
                    </button>
                    @endif
                  <a wire:click.prevent='resetInputFields' class="btn btn-danger float-end" type="button" data-bs-dismiss="modal">Fermer</a>
                </div>
        </form>
      </div>
    </div>
  </div>
