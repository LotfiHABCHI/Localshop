<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class Contact extends Mailable
{
    use Queueable, SerializesModels;
 
    /**
     * Elements de contact
     * @var array
     */
    public $contact;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $contact)
    {
        $this->contact = $contact;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        $customer=request()->session()->get('alluser');

        return $this->from($customer['alluseremail']) // L'expéditeur
                    ->subject("Message via le formulaire de contact") // Le sujet
                    ->view('footer/contactEmail'); // La vue
    }
    /*public function build()
    {
        return $this->from('monsite@chezmoi.com')
            ->view('contact');
    }*/
}