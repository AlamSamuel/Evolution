<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendario;
use App\Http\Requests;
use Exception;
use DB;
use Auth;
use App\User;
use App\Http\Controllers\Controller;

class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      private $path = 'calendario';

    public function index()
    {
       
  $calendarios=Calendario::all();
  
       return view ($this->path .'.calendario', compact('calendarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         switch (Auth::user()->rol) 
        {
            case '1':
              return view($this->path.'.create');
            break;
            case '2':

           return view($this->path.'.create');
            break;
            
            default:

       return view($this->path.'.create');
    }
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
        
            try {
                $calendarios               = new Calendario();
                $calendarios->title        = $request->title;
                $calendarios->type_events  = $request->type_events;
               $calendarios->evento       = $request->evento;
                $calendarios->fecha       = $request->fecha;
                 $calendarios->id_users         = $request->id_users;
                  $calendarios->status        = $request->status;
                $calendarios->save();

                return redirect()->route('calendar.index');
            } catch (Exception $e) {

                return "Tu monte sur recif XD " . $e->getMessage();
            }
        }

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
         $calendarios = Calendario::findOrFail($id);
       
        return view($this->path.'.show', compact('calendarios'));

    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
    public function edit($id)
    {
    
         $calendarios = Calendario::findOrFail($id);
        
       return view ($this->path . '.edit', compact('calendarios'));

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

        $calendarios  = Calendario::findOrFail($id);
        $calendarios->title        = $request->title;
        $calendarios->type_events  = $request->type_events;
       $calendarios->evento       = $request->evento;
       $calendarios->fecha       = $request->fecha;
       $calendarios->id_users         = $request->id_users;
      $calendarios->save();

     $calendarios->save();


      return redirect('calendar');

    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Calendario::find($id)->delete();
   return redirect('calendar');
    }
}
