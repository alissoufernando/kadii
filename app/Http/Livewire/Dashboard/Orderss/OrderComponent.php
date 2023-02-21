<?php

namespace App\Http\Livewire\Dashboard\Orderss;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class OrderComponent extends Component
{
    public function updateOrderStatus($order_id, $status)
    {
        $order = Order::find($order_id);
        $order->status = $status;
        if($status == "delivered")
        {
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }else if($status == "canceled")
        {
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }

        session()->flash('message', 'le statut est mise a jour avec succès.');
    }
    public function render()
    {
        $order = Order::orderBy('created_at', 'desc')->get();
        return view('livewire.dashboard.orderss.order-component',[
            'order' => $order,
        ]);
    }
}
