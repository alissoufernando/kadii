  <!-- ModalCarousel modal-->

  <div wire:ignore.self class="modal fade" id="ModalParametre" tabindex="-1" role="dialog"
      aria-labelledby="ModalParametre" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  @if ($parametre_id)
                      <h5 class="modal-title text-center">Editer la Parametre</h5>
                  @else
                      <h5 class="modal-title text-center">Ajouter la Parametre</h5>
                  @endif
                  <button wire:click.prevent='resetInputFields' class="btn-close" type="button"
                      data-bs-dismiss="modal" aria-label="Close"></button>

              </div>
              <form class="form theme-form" wire:submit.prevent='saveParametre'>
                  <div class="modal-body">
                      <div class="card-body">
                          <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                        <label class="form-label" for="title">Email 1</label>
                                        <input class="form-control form-control-lg" id="title" type="email" placeholder="Email 1" wire:model.lazy='email1'>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                        <label class="form-label" for="title">Email 2</label>
                                        <input class="form-control form-control-lg" id="title" type="email" placeholder="Email 2" wire:model.lazy='email2'>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                        <label class="form-label" for="title">Adress</label>
                                        <input class="form-control form-control-lg" id="title" type="text" placeholder="Adresse" wire:model.lazy='address'>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                        <label class="form-label" for="title">Facebook</label>
                                        <input class="form-control form-control-lg" id="title" type="text" placeholder="lien facebook" wire:model.lazy='facebook'>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                        <label class="form-label" for="title">YouTube</label>
                                        <input class="form-control form-control-lg" id="title" type="text" placeholder="lien YouTube" wire:model.lazy='youtube'>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                        <label class="form-label" for="title">instagram</label>
                                        <input class="form-control form-control-lg" id="title" type="text" placeholder="lien instagram" wire:model.lazy='instagram'>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                        <label class="form-label" for="title">Google</label>
                                        <input class="form-control form-control-lg" id="title" type="text" placeholder="lien Google" wire:model.lazy='google'>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                        <label class="form-label" for="title">Twitter</label>
                                        <input class="form-control form-control-lg" id="title" type="text" placeholder="lien Twitter" wire:model.lazy='twitter'>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                        <label class="form-label" for="title">Map</label>
                                        <input class="form-control form-control-lg" id="title" type="text" placeholder="Map" wire:model.lazy='map'>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                        <label class="form-label" for="subtitle">Numero</label>
                                        <input class="form-control form-control-lg" id="subtitle" type="tel" placeholder="telephone" wire:model.lazy='phone' >
                                        </div>
                                    </div>
                                </div>

                              <div class="col-md-12">
                                  <div class="mb-3">
                                      <label class="form-label" for="logo">logo:</label>
                                      <input class="form-control form-control-lg" id="image" type="file"
                                          accept=".jpg, .png, image/jpeg, image/png" wire:model.lazy='logo'>

                                  </div>
                              </div>
                              <div class="col-md-12">
                                  @if ($logo)
                                      <img src="{{ $logo->temporaryUrl() }}" width="100">
                                  @endif
                              </div>
                          </div>
                      </div>


                      <div class="modal-footer justify-content-start">
                          @if ($parametre_id)
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
