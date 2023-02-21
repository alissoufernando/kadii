<?php

namespace App\Http\Livewire\Site\Orders;

use App\Models\Order;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderDetailComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function cancelOrder(){
        $order = Order::find($this->order_id);
        $order->status = "canceled";
        $order->canceled_date = DB::raw('CURRENT_DATE');
        $order->save();
        session()->flash('message', 'la commande été annuler avec succès.');

    }

    public function render()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id', $this->order_id)->first();
        $categorieMenu = Category::where('menu',1)->get();

        return view('livewire.site.orders.order-detail-component',[
            'order' => $order,
            'categorieMenu' => $categorieMenu
        ])->layout('layouts.site');
    }
}
