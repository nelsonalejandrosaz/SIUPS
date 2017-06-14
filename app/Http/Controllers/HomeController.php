<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
      foreach ($this->guard()->user()->rol as $role) {
        if($role->nombre=="admin"){
          return redirect('home/admin');
        }elseif ($role->nombre=="jefe") {
          return redirect('home/jefe');
        }elseif ($role->nombre=="secretaria") {
          return redirect('home/secretaria');
        }elseif ($role->nombre=="coordinador_Sups") {
          return redirect('home/coordinador');
        }
      }
    }
}
