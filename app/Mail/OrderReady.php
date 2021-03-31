<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;


 


class OrderReady extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Elements de contact
     * @var array
     */
    //public $contact;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $sellerId=request()->session()->get('alluser')['allusersellerid'];
        $seller=DB::table('sellers')->where('sellerid', $sellerId)->get()->toArray();

        return $this->from($seller[0]->selleremail) // L'expéditeur
                    ->subject("Votre commande") // Le sujet
                    ->view('orderReady', compact('seller')); // La vue
    }
}
