  <!-- ModalUser modal-->

  <div wire:ignore.self class="modal fade" id="ModalUser" tabindex="-1" role="dialog" aria-labelledby="ModalUser"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  @if ($user_id)
                      <h5 class="modal-title text-center">Edit un utilisateur</h5>
                  @else
                      <h5 class="modal-title text-center">Ajouter un utilisateur</h5>
                  @endif
                  <button wire:click.prevent='resetInputFields' class="btn-close" type="button"
                      data-bs-dismiss="modal" aria-label="Close"></button>

              </div>
              <form class="form theme-form" wire:submit.prevent='saveUser'>
                  <div class="modal-body">
                      @if ($user_id)
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="mb-3">
                                          <label class="form-label" for="name">Nom:</label>
                                          <input class="form-control form-control-lg" id="name" type="text"
                                              placeholder=" lenom " wire:model.lazy='name'>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="mb-3">
                                          <label class="form-label" for="firstname">Prénoms:</label>
                                          <input class="form-control form-control-lg" id="firstname" type="text"
                                              placeholder="le prenom" wire:model.lazy='firstname'>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="mb-3">
                                          <label class="form-label" for="email">Email:</label>
                                          <input class="form-control form-control-lg" id="email" type="text"
                                              placeholder="l'email" wire:model.lazy='email'>
                                      </div>
                                  </div>

                              </div>
                          </div>
                      @else
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="mb-3">
                                          <label class="form-label" for="name">Nom:</label>
                                          <input class="form-control form-control-lg" id="name" type="text"
                                              placeholder="nom de l'utilisateur" wire:model.lazy='name'>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="mb-3">
                                          <label class="form-label" for="firstname">Prénoms:</label>
                                          <input class="form-control form-control-lg" id="firstname" type="text"
                                              placeholder="prénom de l'utilisateur" wire:model.lazy='firstname'>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="mb-3">
                                          <label class="form-label" for="email">Email:</label>
                                          <input class="form-control form-control-lg" id="email" type="text"
                                              placeholder="email de l'utilisateur" wire:model.lazy='email'>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="mb-3">
                                          <label class="form-label" for="password">Mot de passe:</label>
                                          <input class="form-control form-control-lg" id="password" type="password"
                                              wire:model.lazy='password'>
                                      </div>
                                  </div>

                              </div>
                          </div>
                      @endif
                  </div>

                  <div class="modal-footer justify-content-start">
                      @if ($user_id)
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
              </form>
          </div>
      </div>
  </div>
