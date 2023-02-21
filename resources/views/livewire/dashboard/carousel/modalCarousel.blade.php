  <!-- ModalCarousel modal-->

  <div wire:ignore.self class="modal fade" id="ModalCarousel" tabindex="-1" role="dialog"
      aria-labelledby="ModalCarousel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  @if ($carousel_id)
                      <h5 class="modal-title text-center">Editer la Carousel</h5>
                  @else
                      <h5 class="modal-title text-center">Ajouter la Carousel</h5>
                  @endif
                  <button wire:click.prevent='resetInputFields' class="btn-close" type="button"
                      data-bs-dismiss="modal" aria-label="Close"></button>

              </div>
              <form class="form theme-form" wire:submit.prevent='saveCarousel'>
                  <div class="modal-body">
                      <div class="card-body">
                          <div class="row">
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
                              <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="text">Description:</label>
                                    <textarea class="form-control" id="text" rows="3" wire:model.lazy="text"></textarea>
                                </div>
                            </div>

                          </div>
                      </div>


                      <div class="modal-footer justify-content-start">
                          @if ($carousel_id)
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
