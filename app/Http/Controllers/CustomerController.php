<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Repository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
use Session;
use Customers;

class CustomerController extends Controller
{

    public function __construct(Repository $repository)
    {
    $this->repository = $repository;
    }

    
    public function showLoginForm()
{
    return view('customers.login');
}

public function login(Request $request, Repository $repository)
{
    $rules = [
        'email' => ['required', 'email', 'exists:customers,email'],
        'password' => ['required']
    ];
    $messages = [
        'email.required' => 'Vous devez saisir un e-mail.',
        'email.email' => 'Vous devez saisir un e-mail valide.',
        'email.exists' => "Cet utilisateur n'existe pas.",
        'password.required' => "Vous devez saisir un mot de passe.",
    ];
    $validatedData = $request->validate($rules, $messages);
    //$pass = Hash::make($validatedData['password']);
    $email = $validatedData['email'];
    try {
      # TODO 1 : lever une exception si le mot de passe de l'utilisateur n'est pas correct
     // $this->repository->getUser($email, $validatedData['password']);
        
      # TODO 2 : se souvenir de l'authentification de l'utilisateur
      $request->session()->put('customer', $this->repository->getCustomer($email, $validatedData['password']));


    } catch (Exception $e) {
        return redirect()->back()->withInput()->withErrors("Impossible de vous authentifier.");
    }
    
    return redirect()->route('home');
    }

    public function logout(Request $request) {
        $request->session()->forget('customer');
        return redirect()->route('home');
    }


    public function showRegisterForm()
    {
        return view('/customers/customer_register');
    }

    public function customerRegister(Request $request, Repository $repository)
    {
        $rules = [
            'lastname' => ['required'], 
            'firstname' => ['required'],  
            'email' => ['required', 'email'],
            'password' => ['required'], 
            'phone'=>['required'],
            'passwordConfirm'=>['required'],
            'numstreet' => ['required'], 
            'namestreet' => ['required'],
            'postcode'=>['required'],
            'city'=>['required'],
        ];
        $messages = [
            'lastname.required' => 'Vous devez saisir un nom.',
            'firstname.required' => 'Vous devez saisir un prénom.',
            'email.required' => 'Vous devez saisir un e-mail.',
            'email.email' => 'Vous devez saisir un e-mail valide.',
            'password.required' => "Vous devez saisir un mot de passe.",
            'passwordConfirm.required' => "Vous devez confirmer le mot de passe.",
            'numstreet.required' => 'Vous devez saisir un numéro de rue.',
            'namestreet.required' => 'Vous devez saisir un nom de rue.',
            'postcode.required' => 'Vous devez saisir un code postal.',
            'city.required' => 'Vous devez saisir une ville.',
        ];

        
        $validatedData = $request->validate($rules, $messages);
        $lastname = $validatedData['lastname'];
        $firstname = $validatedData['firstname'];
        $email = $validatedData['email'];
        $password = $validatedData['password'];
        $phone=$validatedData['phone'];
        $numstreet = $validatedData['numstreet'];
        $namestreet = $validatedData['namestreet'];
        $postcode = $validatedData['postcode'];
        $city = $validatedData['city'];
        


        if($validatedData['password']==$validatedData['passwordConfirm']){
            try {
                $this->repository->addCustomer($firstname, $lastname, $email, $password, $phone, $numstreet, $namestreet, $postcode, $city); 
                 $request->session()->put('alluser', $this->repository->getAlluser($email, $password));
                
            } catch (Exception $e) {
                return redirect()->back()->withInput()->withErrors("Impossible de vous inscrire.");
            }
        }else{
            return redirect()->back()->withInput()->withErrors("mots de passe différents.");
        }
        return redirect()->route('home');
    }
}

