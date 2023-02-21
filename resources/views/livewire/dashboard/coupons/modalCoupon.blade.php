  <!-- Vertically centered modal-->

  <div wire:ignore.self class="modal fade" id="modalCoupon" tabindex="-1" role="dialog" aria-labelledby="modalCoupon" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            @if ($coupon_id)
            <h5 class="modal-title text-center">Edit une catégories</h5>
            @else
            <h5 class="modal-title text-center">Ajouter une catégories</h5>
            @endif
          <button wire:click.prevent='resetInputFields' class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="form theme-form" wire:submit.prevent='saveCoupon'>
                <div class="modal-body">
                        <div class="card-body">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label class="form-label" for="code">Code du Coupon:</label>
                            <input class="form-control form-control-lg" id="code" type="text" placeholder="Code du coupon" required wire:model.lazy='code' >
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="md-3">
                                <label class="form-label" for="type">Type de Coupon:</label>
                                <select class="form-select" required wire:model.lazy="type">

                                    <option value="fixed">Fixed</option>
                                    <option value="percent">Percent</option>

                                </select>
                                <div class="invalid-feedback">veillez selectionner le type de coupon</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label class="form-label" for="value">Valeur du Coupon:</label>
                            <input class="form-control form-control-lg" id="value" type="text" placeholder="valeur du Coupon" required wire:model.lazy='value' >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label class="form-label" for="cart_value">Valeur du cart:</label>
                            <input class="form-control form-control-lg" id="cart_value" type="text" placeholder="valeur de la cart" required wire:model.lazy='cart_value' >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3" wire:ignore>
                            <label class="form-label" for="cart_value">Date d'expiration:</label>
                            <input class="form-control form-control-lg" id="expiry_date" type="date" placeholder="" required wire:model.lazy='expiry_date' >
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start" >
                    @if ($coupon_id)
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
