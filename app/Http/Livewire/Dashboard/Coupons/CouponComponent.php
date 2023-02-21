<?php

namespace App\Http\Livewire\Dashboard\Coupons;

use App\Models\Coupon;
use Livewire\Component;

class CouponComponent extends Component
{
    public $code;
    public $type;
    public $cart_value;
    public $value;
    public $coupon_id;
    public $expiry_date;
    public $deleteIdBeingRemoved = null;
    protected $listeners = ['deleteConfirmation' => 'deleteCoupons'];




    public function resetInputFields()
    {
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['code', 'type', 'coupon_id','cart_value', 'value','expiry_date']);
    }


    public function updated($fields)
    {
        if ($this->coupon_id) {
            $this->validateOnly($fields, [
                'code' =>  ['required','unique:coupons'],
                'type' =>  ['required'],
                'cart_value' =>  ['required','numeric'],
                'value' =>  ['required','numeric'],
                'expiry_date' =>  ['required'],
            ]);
        } else {
            $this->validateOnly($fields, [
                'code' =>  ['required','unique:coupons'],
                'type' =>  ['required'],
                'cart_value' =>  ['required','numeric'],
                'value' =>  ['required','numeric'],
                'expiry_date' =>  ['required'],
        ]);
    }

    }
    public function saveCoupon()
    {
        if ($this->coupon_id) {
            $this->validate([
                'code' =>  ['required','unique:coupons'],
                'type' =>  ['required'],
                'cart_value' =>  ['required','numeric'],
                'value' =>  ['required','numeric'],
                'expiry_date' =>  ['required'],
            ]);
        } else {
            $this->validate([
                'code' =>  ['required','unique:coupons'],
                'type' =>  ['required'],
                'cart_value' =>  ['required','numeric'],
                'value' =>  ['required','numeric'],
                'expiry_date' =>  ['required'],
            ]);
        }
        $myCoupon = new Coupon();
        if ($this->coupon_id) {
            $myCoupon = Coupon::findOrFail($this->coupon_id);
        }
        $myCoupon->code = $this->code;
        $myCoupon->type = $this->type;
        $myCoupon->cart_value = $this->cart_value;
        $myCoupon->value = $this->value;
        $myCoupon->expiry_date = $this->expiry_date;

        $myCoupon->save();

        if ($this->coupon_id) {
            session()->flash('message', 'Modification effectuée avec succès.');
        } else {
            session()->flash('message', 'Enregistrement effectué avec succès.');
        }
        $this->resetInputFields();
        $this->emit('saveCoupon');
    }

    public function getElementById($id)
    {
        $this->coupon_id = $id;
        $myCoupon = Coupon::findOrFail($this->coupon_id);
        $this->code = $myCoupon->code;
        $this->type = $myCoupon->type;
        $this->cart_value = $myCoupon->cart_value;
        $this->value = $myCoupon->value;
        $this->expiry_date = $myCoupon->expiry_date;
    }


    public function deleteCoupon($id)
    {
        $this->deleteIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteCoupons()
    {
        $myCoupon = Coupon::findOrFail($this->deleteIdBeingRemoved);
        $myCoupon->delete();
        $this->dispatchBrowserEvent('deleted',['message' => 'Ce coupon à été supprimer']);

    }
    public function render()
    {
        $coupon = Coupon::all();
        return view('livewire.dashboard.coupons.coupon-component',[
            'coupon' => $coupon,
        ]);
    }
}
