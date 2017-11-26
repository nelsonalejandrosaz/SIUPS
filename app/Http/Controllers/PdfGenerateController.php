<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use PDF;

use Illuminate\Http\Request;

class PdfGenerateController extends Controller
{
    //

     public function pdfview(Request $request)
    {
        $users = DB::table("users")->get();
        view()->share('users',$users);

        if($request->has('download')){
        	// Set extra option
        	PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        	// pass view file
            $pdf = PDF::loadView('pdfview');
            // download pdf
            return $pdf->download('pdfview.pdf');
        }
        return view('pdfview');
    }
}
