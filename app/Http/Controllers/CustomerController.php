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
        return view('customers.registerC');
    }

    public function register(array $data)
    {
        return Customers::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'numstreet'=>$data['numstreet'],
            'namestreet'=>$data['namestreet'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            
        ]);

    }
}

