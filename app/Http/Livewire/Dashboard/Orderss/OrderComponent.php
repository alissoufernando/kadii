<?php

namespace App\Http\Livewire\Dashboard\Orderss;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class OrderComponent extends Component
{
    public $devise_price = "€";

    public function updateOrderStatus($order_id, $status)
    {
        // dd('ok');
        $order = Order::find($order_id);
        $order->status = $status;
        if($status == "delivered")
        {
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }else if($status == "canceled")
        {
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();

        session()->flash('message', 'le statut est mise a jour avec succès.');
        return redirect()->route('admin.order-index');

    }
    public function render()
    {
        $order = Order::orderBy('created_at', 'desc')->get();
        return view('livewire.dashboard.orderss.order-component',[
            'order' => $order,
        ]);
    }
}
