<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller

{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    //Finalizar la sesion del usuario
    public function store()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
