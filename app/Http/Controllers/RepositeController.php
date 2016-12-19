<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Reposito;

use Illuminate\Http\Response;

class RepositeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $path ='reposito';
    public function index()
    {

        $repositos=Reposito::all();

      return view($this->path.'.index',compact('repositos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    
        {
     $file = Request::file('filefield');


        $extension = $file->getClientOriginalExtension();
        
      $size = $file->getClientSize();
         $size >=50000;
        
       if ($extension == 'pdf' || $extension == 'zip' || $extension == 'jpg' || $extension == 'docx' || $extension == '' || $extension == 'pptx'|| $extension == 'rar')
        {
             Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));


        $repositos = new Reposito();
        $repositos->content = Request::input('content');

         $repositos->id_users = Request::input('id_users');
        $repositos->mime = $file->getClientMimeType();
        $repositos->original_filename = $file->getClientOriginalName();
        $repositos->name = $file->getFilename().'.'.$extension;


        $repositos->save();

        return redirect('reposite');
        }
        else{
            return ('lo sentimos,no autorizado');
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
        $repositos = Reposito::findOrFail($id);
            $repositos->delete();
     return redirect()->route('reposite.index');
    }
}
