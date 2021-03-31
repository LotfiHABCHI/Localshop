<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function showFormContact(){
        return view('/footer/contact');
    } 
    
    public function showAbout(){
        return view('/footer/about');
    } 

    public function showFaq(){
        return view('/footer/faq');
    } 

    public function showMentions(){
        return view('/footer/mentions');
    } 
   
 
    public function contact()
    {
        //dd(request()->all());
        $contact=request()->validate([
            'name'=> 'required', 
            'email' => 'required',
            'message' => 'required'
        ]);
        Mail::to('localshop@localshop.com')
            ->send(new Contact($contact));
            return back()->with(['success'=>"Votre message a bien été envoyé"]);

        //pour envoyer un msg aux people
        /*$people = People::all();
        Mail::to($people)->send(new Contact(request()->all()));*/
    }
}
