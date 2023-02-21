  <!-- ModalProductImage modal-->

  <div wire:ignore.self class="modal fade" id="ModalProductImage" tabindex="-1" role="dialog"
      aria-labelledby="ModalProductImage" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  @if ($productImage_id)
                      <h5 class="modal-title text-center">Editer la galerie</h5>
                  @else
                      <h5 class="modal-title text-center">Ajouter la galerie</h5>
                  @endif
                  <button wire:click.prevent='resetInputFields' class="btn-close" type="button"
                      data-bs-dismiss="modal" aria-label="Close"></button>

              </div>
              <form class="form theme-form"  wire:submit.prevent='saveImage'>
                  <div class="modal-body">
                      <div class="card-body">
                          <div class="row">
                            @if ($productImage_id)
                            @empty ($fulls)
                            @php
                            $images = explode(",",$this->fulls);
                            @endphp
                            @endempty

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="fulls">Galerie du produit</label>:</label>
                                    <input class="form-control form-control-lg mb-3" id="fulls" type="file"
                                        accept=".jpg, .png, image/jpeg, image/png" multiple wire:model.lazy='fulls'>
                                        @if ($images)
                                        @foreach ($images as $image)
                                        <img src="{{asset('storage/galerie')}}/{{$image}}" class="px-2" width="100">
                                        @endforeach
                                        @php
                                        $images = null;
                                        @endphp
                                        @elseif ($images == null && $fulls)
                                        @foreach ($fulls as $full)
                                        <img src="{{$full->temporaryUrl()}}" class="px-2" width="100">
                                        @endforeach
                                        @endif
                                </div>
                            </div>
                            @else
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="fulls">Galerie du produit</label>:</label>
                                    <input class="form-control form-control-lg mb-3" id="fulls" type="file"
                                        accept=".jpg, .png, image/jpeg, image/png" multiple wire:model.lazy='fulls'>
                                        @if ($fulls)
                                          @foreach ($fulls as $full)
                                          <img src="{{$full->temporaryUrl()}}" class="px-2" width="100">
                                          @endforeach
                                        @endif
                                </div>
                            </div>
                            @endif
                          </div>
                      </div>


                      <div class="modal-footer justify-content-start">
                          @if ($productImage_id)
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
