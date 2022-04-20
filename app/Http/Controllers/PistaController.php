<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pista;
class PistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pistas = Pista::get();
       // dd($pistas);
        return view('admin.pistas.index',compact('pistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pistas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStore($request);
            $data = $request->all();
            
            $name = (new Pista)->userAvatar($request);

            $data['image'] = $name;
       
      
            Pista::create($data);
            return redirect()->back()->with('message','Pista añadida correctamente');
        
    }
    

    public function validateStore($request){
        return $this->validate($request,[
            'name'=>'required|unique:pistas',
            'type'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png'
        ]);
    }
  
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pista = Pista::find($id);
        return view('admin.pistas.delete',compact('pista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pista= Pista::find($id);
        return view('admin.pistas.edit',compact('pista'));
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
        $this->validateUpdate($request,$id);
        $data = $request->all();
        $pista = Pista::find($id);
        $imageName = $pista->image;
      
        if($request->hasFile('image')){
            $imageName =(new Pista)->userAvatar($request);
            //borrar la imagen anterior
            unlink(public_path('images/'.$pista->image));
        } 
        $data['image'] = $imageName;
        
         $pista->update($data);
        return redirect()->route('pistas.index')->with('message','Pista actualizada con exito');

    }
    public function validateUpdate($request,$id){
        return $this->validate($request,[
            'name'=>'required|unique:pistas,name,'.$id,
            'type'=>'required',
            'image'=>'mimes:jpeg,jpg,png'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        /* if(auth()->user()->id == $id){
            abort(401);
       } */
       $pista = Pista::find($id);
       $pistaDelete = $pista->delete();
       if($pistaDelete){
        unlink(public_path('images/'.$pista->image));
       }
        return redirect()->route('pistas.index')->with('message','La pista se ha borrado con exito');
    }
}
