  <!-- ModalAttribute modal-->

  <div wire:ignore.self class="modal fade" id="ModalAttribute" tabindex="-1" role="dialog"
      aria-labelledby="ModalAttribute" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  @if ($attribut_id)
                      <h5 class="modal-title text-center">Editer la Attributs</h5>
                  @else
                      <h5 class="modal-title text-center">Ajouter la Attributs</h5>
                  @endif
                  <button wire:click.prevent='resetInputFields' class="btn-close" type="button"
                      data-bs-dismiss="modal" aria-label="Close"></button>

              </div>
              <form class="form theme-form" wire:submit.prevent='saveAttribut'>
                  <div class="modal-body">
                      <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                <label class="form-label" for="code">Code:</label>
                                <input class="form-control form-control-lg" id="code" type="text" placeholder="code" wire:model.lazy='code'>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                <label class="form-label" for="name">Name:</label>
                                <input class="form-control form-control-lg" id="name" type="text" placeholder="name" wire:model.lazy='name' >
                                </div>
                            </div>
                          </div>
                      </div>


                      <div class="modal-footer justify-content-start">
                          @if ($attribut_id)
                              <button type="submit" class="btn btn-primary btn-sm">
                                  Modifier
                              </button>
                          @else
                              <button type="submit" class="btn btn-primary btn-sm">
                                  Ajouter
                              </button>
                          @endif
                          <a wire:click.prevent='resetInputFields' class="btn btn-danger float-end" type="button"
                              data-bs-dismiss="modal">Fermer</a>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
