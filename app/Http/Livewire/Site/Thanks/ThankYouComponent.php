<?php

namespace App\Http\Livewire\Site\Thanks;

use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Http\Request;
use StephaneAss\Payplus\Pay\PayPlus;

class ThankYouComponent extends Component
{
    public function mount(Request $request)
    {
        $token= $request->token;
        // dd($request->token);
        $this->verify($token);
    }

    public function verify($token)
    {
        // dd($token);
        $token = blank($token) ? $_GET['token'] : trim($token);

        $co = (new PayPlus())->init();
        $transaction_payment_id = $co->getCustomData('first_key');
        $myTransaction = Transaction::where('inscription_id',$transaction_payment_id)->first();
        if ($co->confirm($token)) {
            // Transaction has successed
            // Perform your success logique here

            if($myTransaction)
            {
                $myTransaction->status = "approved";
                $myTransaction->save();
            }

            // Mail::to($myInscription->individu->email)->send( new InscriptionComfirmMail($myInscription->individu->nom, $myInscription->individu->email));


        }else {

            if($myTransaction)
            {
                $myTransaction->status = "refunded";
                $myTransaction->save();
            }
        }

    }
    public function render()
    {
        return view('livewire.site.thanks.thank-you-component');
    }
}
