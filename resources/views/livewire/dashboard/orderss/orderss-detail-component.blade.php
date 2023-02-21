
@section('title', 'Details Commandes')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
@endsection

@section('breadcrumb-title', 'Details Commandes')
@section('breadcrumb-items')
<li class="breadcrumb-item">Tableau de bord</li>
<li class="breadcrumb-item active">Details Commandes</li>
@endsection
<div>
    <!-- Billing detail starts-->
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-6">
                        <h5>order Details</h5>
                      </div>
                      <div class="col-md-6">
                        <a href="{{route('admin.order-index')}}" class="btn btn-success float-end"> Les Commandes</a>
                    </div>
                  </div>

              </div>
              <div class="card-body cart">
                <div class="order-history table-responsive wishlist">
                  <table class="table table-bordernone">
                        <tr class="title-orders">
                         <td colspan="12">Billing Details</td>
                        </tr>
                      <tr>
                        <th>ID</th>
                        <td>{{$order->id}}</td>
                        <th>Date commande</th>
                        <td>{{$order->created_at}}</td>
                        <th>Status</th>
                        <td>{{$order->status}}</td>
                        @if ($order->status == "delivrered")
                        <th>Delivery date</th>
                        <td>{{$order->delivered_date}}</td>
                        @elseif ($order->status == "canceled")
                        <th>cancellation date</th>
                        <td>{{$order->canceled_date}}</td>
                        @endif
                      </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Billing detail Ends-->

    <!-- orders details starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5>Details Commandes</h5>
            </div>
            <div class="card-body cart">
              <div class="order-history table-responsive wishlist">
                <table class="table table-bordernone">
                  <thead>
                    <tr>
                      <th>Prdouct</th>
                      <th>Prdouct Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Action</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr class="title-orders">
                      <td colspan="12">Commandes</td>
                    </tr>
                    @foreach($order->orderItems as $item)
                    <tr>
                        @empty($item->product->images->first()->full)
                        <td><img class="img-fluid img-60" src="{{asset('assets/images/product/default.png')}}" alt="{{$item->product->name}}"></td>
                        @else
                        @php
                        $images = explode(",",$item->product->images->first()->full);
                        @endphp
                        <td><img class="img-fluid img-60" src="{{asset('storage/galerie')}}/{{$images[0]}}" alt="{{$item->product->name}}"></td>
                        @endempty
                        <td>
                          <div class="product-name"><a href="#">{{$item->product->name}}</a></div>
                        </td>
                        <td>${{$item->price}}</td>
                        <td>
                          <fieldset class="qty-box">
                            <div class="input-group">
                              <h5>{{ $item->quantity }}</h5>
                            </div>
                          </fieldset>
                        </td>
                        <td><i data-feather="x-circle"></i></td>
                        <td>${{$item->price * $item->quantity}}</td>
                    </tr>

                    @endforeach
                    <tr>
                      <td class="total-amount" >
                        <h6 class="m-0"> <span class="f-w-600">Subtotal:</span></h6>
                      </td>
                      <td colspan="5"><span class="float-end" style="margin-right:20px;">${{$order->subtotal}}</span></td>
                    </tr>
                    <tr>
                        <td class="total-amount" >
                          <h6 class="m-0"> <span class="f-w-600">Tax:</span></h6>
                        </td>
                        <td colspan="5"><span class="float-end" style="margin-right:20px;">${{$order->tax}}</span></td>
                      </tr>
                      <tr>
                        <td class="total-amount" >
                          <h6 class="m-0"> <span class="f-w-600">Shipping:</span></h6>
                        </td>
                        <td colspan="5"><span class="float-end" style="margin-right:20px;">Free Shipping</span></td>
                      </tr>
                      <tr>
                        <td class="total-amount" >
                          <h6 class="m-0"> <span class="f-w-600">Total:</span></h6>
                        </td>
                        <td colspan="5"><span class="float-end" style="margin-right:20px;">${{$order->total}}</span></td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- orders details Ends-->
    <!-- Billing detail starts-->
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Billing Details</h5>
              </div>
              <div class="card-body cart">
                <div class="order-history table-responsive wishlist">
                  <table class="table table-bordernone">
                    <tr class="title-orders">
                        <td colspan="12">Billing Details</td>
                    </tr>
                    <tr>
                        <th>firstname</th>
                        <td>{{$order->firstname}}</td>
                        <th>lastname</th>
                        <td>{{$order->lastname}}</td>
                    </tr>
                    <tr>
                        <th>mobile</th>
                        <td>{{$order->mobile}}</td>
                        <th>email</th>
                        <td>{{$order->email}}</td>
                    </tr>
                    <tr>
                        <th>country</th>
                        <td>{{$order->country}}</td>
                        <th>Address 1</th>
                        <td>{{$order->line1}}</td>
                    </tr>
                    <tr>
                        <th>zipcode</th>
                        <td>{{$order->zipcode}}</td>
                        <th>order date</th>
                        <td>{{$order->created_at}}</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Billing detail Ends-->
    <!-- Shipping detail starts-->
    @if ($order->is_shipping_different)
    <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h5>shipping Details</h5>
                </div>
                <div class="card-body cart">
                  <div class="order-history table-responsive wishlist">
                    <table class="table table-bordernone">
                        <tr class="title-orders">
                            <td colspan="12">Shipping Details</td>
                        </tr>
                        <tr>
                            <th>firstname</th>
                            <td>{{$order->shipping->firstname}}</td>
                            <th>lastname</th>
                            <td>{{$order->shipping->lastname}}</td>
                        </tr>
                        <tr>
                            <th>mobile</th>
                            <td>{{$order->shipping->mobile}}</td>
                            <th>email</th>
                            <td>{{$order->shipping->email}}</td>
                        </tr>
                        <tr>
                            <th>country</th>
                            <td>{{$order->shipping->country}}</td>
                            <th>Address 1</th>
                            <td>{{$order->shipping->line1}}</td>
                        </tr>
                        <tr>
                            <th>zipcode</th>
                            <td>{{$order->shipping->zipcode}}</td>
                            <th>order date</th>
                            <td>{{$order->shipping->created_at}}</td>
                        </tr>
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    @endif
    <!-- Shipping detail Ends-->
    <!-- Billing detail starts-->
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Translation Details</h5>
              </div>
              <div class="card-body cart">
                <div class="order-history table-responsive wishlist">
                  <table class="table table-bordernone">
                    <tr class="title-orders">
                        <td colspan="12">Translation Details</td>
                      </tr>
                      <tr>
                        @if ($order->translation)
                        <th>Mode de translation</th>
                        <td>{{$order->translation->mode}}</td>
                        <th>Status</th>
                        <td>{{$order->translation->status}}</td>
                        <th>Date de translation</th>
                        <td>{{$order->translation->created_at}}</td>
                        @endif
                      </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Billing detail Ends-->
</div>

@section('scripts')
<script>
    $(function() {
        $('$expiry_date').detetimepicker({
            format: 'YYYY-MM-DD'
        })
        .on('dp.change',function(ev) {
            var date = $('expiry_date').val();
            @this.set('expiry_date', data);
        });
    });
</script>
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection
