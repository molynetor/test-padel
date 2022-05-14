<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citas;
use App\Models\Horas;
use App\Models\Pista;
class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
      $this->middleware('admin');
    }
    public function index()
    {
       
        $pistas = Pista::get();

        return view('admin.citas.index',compact('pistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pistas = Pista::get();
        // dd($pistas);
        
        return view('admin.citas.create',compact('pistas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //dd($request->all());
     $pista_id =$request->pista;
     
       $this->validate($request,[
           //condicion para que no podamos reservar la misma cita 2 veces.
        'date'=>'required|unique:citas,date,NULL,id,pista_id,'.$pista_id,
                    
        'time'=>'required'
    ]);
    $citas = Citas::create([
        'pista_id'=> $request->pista,
        'date' => $request->date
    ]);
    foreach($request->time as $time){
        Horas::create([
            'cita_id'=> $citas->id,
            'time'=> $time,
            //'stauts'=>0
        ]);
    }
    return redirect()->back()->with('message','Las citas se han programado para el '.formatDate($request->date, $format = 'd-m-Y').' en la pista '.$pista_id);
    }
    public function check(Request $request){
      // dd($request->all());
        $date = $request->date;
        $pista_id =$request->pista;
        $cita= Citas::where('date',$date)->where('pista_id',$pista_id)->first();
       
        if(!$cita){
            return redirect()->to('/citas')->with('errmessage','No hay citas disponibles para esta fecha');
        }
        $cita_id = $cita->id;
        $times = Horas::where('cita_id',$cita_id)->get();
        //dd($times);
        $pistas = Pista::get();
       
        return view('admin.citas.index',compact('times','cita_id','date','pistas'));
    }

  
    public function show(Request $request)
    {
        
        
        $pistas = Pista::get();

        return view('admin.citas.show',compact('pistas'));
    }
  public function todas(Request $request){
     
    $pistas = Pista::get();
    $pista_id =$request->pista;
    
    $todas = Citas::select('citas.id', 'citas.pista_id','citas.date','horas.time')
            ->join('horas', 'citas.id', '=', 'horas.cita_id')
            ->where('citas.pista_id',$pista_id)
            ->get();
          
            return view('admin.citas.show',compact('todas','pistas','pista_id'));
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
    public function updateTime(Request $request){
        $cita_id = $request->cita_id;
        $citas = Horas::where('cita_id',$cita_id)->delete();
        foreach($request->time as $time){
            Horas::create([
                'cita_id'=>$cita_id,
                'time'=>$time,
                'status'=>0
            ]);
        }
        return redirect()->route('citas.index')->with('message','Se ha actualizado el horario de citas!!');
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
