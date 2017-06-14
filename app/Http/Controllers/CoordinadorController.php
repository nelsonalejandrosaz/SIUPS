<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoordinadorController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('coordinador');
  }

  public function index()
  {
    return view('home/homeCoordinador');
  }
}
