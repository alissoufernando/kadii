<?php

namespace App\Http\Livewire\Dashboard\Orderss;

use App\Models\Order;
use Livewire\Component;

class OrderssDetailComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }
    
    public function render()
    {
        $order = Order::find($this->order_id);
        return view('livewire.dashboard.orderss.orderss-detail-component',[
            'order' => $order,
        ]);
    }
}
