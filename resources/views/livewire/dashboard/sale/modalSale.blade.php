  <!-- Vertically centered modal-->

  <div wire:ignore.self class="modal fade" id="modalSale" tabindex="-1" role="dialog" aria-labelledby="modalSale" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            @if ($sale_id)
            <h5 class="modal-title text-center">Edit une Sale</h5>
            @else
            <h5 class="modal-title text-center">Ajouter une Sale</h5>
            @endif
          <button wire:click.prevent='resetInputFields' class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form theme-form" wire:submit.prevent='saveSale'>
                <div class="modal-body">
                        <div class="card-body">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="md-3">
                                <label class="form-label" for="type">Status:</label>
                                <select class="form-select" required wire:model.lazy="status">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                                <div class="invalid-feedback">veillez selectionner le type de coupon</div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                            <label class="form-label" for="cart_value">sale:</label>
                            <input class="form-control form-control-lg" id="sale-date" type="text" placeholder="YYYY/MM/DD H:M:S" required wire:model.lazy='sale_date' >
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                            <label class="form-label" for="title">Titre:</label>
                            <input class="form-control form-control-lg" id="title" type="text" placeholder="titre" wire:model.lazy='title'>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label class="form-label" for="subtitle">Sous - Titre:</label>
                            <input class="form-control form-control-lg" id="subtitle" type="text" placeholder="Sous - Titre" wire:model.lazy='subtitle' >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label class="form-label" for="link">Liens:</label>
                            <input class="form-control form-control-lg" id="link" type="text" placeholder="le liens" wire:model.lazy='link'>
                            </div>
                        </div>
                          <div class="col-md-12">
                              <div class="mb-3">
                                  <label class="form-label" for="image">Image Carousel:</label>
                                  <input class="form-control form-control-lg" id="image" type="file"
                                      accept=".jpg, .png, image/jpeg, image/png" wire:model.lazy='image'>

                              </div>
                          </div>
                          <div class="col-md-12">
                              @if ($image)
                                  <img src="{{ $image->temporaryUrl() }}" width="100">
                              @endif
                          </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start" >
                    @if ($sale_id)
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
