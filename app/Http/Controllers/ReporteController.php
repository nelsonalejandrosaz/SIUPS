<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    //

    public function reporteIndex()
    {
        
       
        return view('reportes.reporteIndex');
    }

}
