<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JefeController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('jefe');
  }

  public function index()
  {
    return view('home/homeJefe');
  }
}
