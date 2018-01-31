<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Alumno_escuela;

use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use PDF;
use DB;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pdf.listado_reportes");
    }


      public function crearPDF($alumno_escuela)
    {

        $data = $alumno_escuela;

        $pdf = new Dompdf;

         // $date = date('Y-m-d');
        $view =  \View::make("certificado.certificado1", compact('data', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);


        
        return $pdf->stream('reporte.pdf');
      
    }


    public function crear($carnet){

     // $vistaurl="pdf.reporte_por_pais";
      // $alumno_escuela=Alumno_escuela::where([['carnet',$carnet], ['escuela_id',Auth::user()->escuela_id]])->first();
   $alumno_escuela=Alumno_escuela::All();
   return $this->crearPDF($alumno_escuela);
    }


 public function pdfview($carnet, Request $request)
    {

       // $alumno_escuelas = DB::table("alumno_escuelas")->get();

     $alumno_escuelas=Alumno_escuela::where('carnet',$carnet)->first();
 $anio = date('Y');
  $mes = date('M');
    $dia = date('d');


$view = \View::make("certificado.certificado")->with(compact('alumno_escuelas', 'anio', 'mes', 'dia'))->render();


         $pdf = \App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->stream($carnet.'.pdf');

        // view()->share(compact('alumno_escuelas', 'anio', 'mes', 'dia'));


        //  if($request->has('download')){
        //     // Set extra option
        //      PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        //     // pass view file
        //      $pdf = PDF::loadView('certificado.certificado');
        //     // download pdf
        //      return $pdf->download($carnet.'.pdf');
        //  }
        // return view('certificado.certificado');
    }

    public function pdfdescargar($carnet, Request $request)
    {

       // $alumno_escuelas = DB::table("alumno_escuelas")->get();

     $alumno_escuelas=Alumno_escuela::where('carnet',$carnet)->first();

 
 $anio = date('Y');
  $mes = date('M');
    $dia = date('d');

         view()->share(compact('alumno_escuelas', 'anio', 'mes', 'dia'));
        
            // Set extra option
             PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            // pass view file
             $pdf = PDF::loadView('certificado.certificado');
            // download pdf
             return $pdf->download($carnet.'.pdf');
        
    }

 public function CertificadosLista()
    {
        if (Auth::user()->rol[0]->nombre == 'jefe') {
            $alumnos_escuela = Alumno_escuela::all();    
        } else {
            $alumnos_escuela = Alumno_escuela::where('escuela_id',Auth::user()->escuela_id)->get();            
        }
        // $alumnos_escuela = Alumno_escuela::all();
        return view('certificado.certificadosLista')->with(['alumnos_escuela' =>$alumnos_escuela]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
