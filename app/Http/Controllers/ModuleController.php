<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
         private $path ='modulo';

    public function index()
    {
        $modules=Module::all();
      
        return view('modulo.index',compact('modules'));
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
         
            $modules = new Module();

             $modules->title     = $request->title;
           $modules->name     = $request->name;
            $modules->content     = $request->content;
            $modules->id_courses    = $request->id_courses;
            $modules->save();
            return redirect()->route('course.index');
   
    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $courses=Course::find($id);

   return view($this->path.'.show',compact('courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $courses=Course::find($id);

   return view($this->path.'.create',compact('courses'));
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
