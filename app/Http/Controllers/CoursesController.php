<?php

namespace App\Http\Controllers;
 use App\Course;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     private $path ='course';

    public function index(){ 

        $courses=Course::all();

        return view($this->path.'.index',compact('courses'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view($this->path.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
            $courses = new Course();
           $courses->theme     = $request->theme;
            $courses->sub_theme     = $request->sub_theme;
            $courses->category    = $request->category;
            $courses->id_users    = $request->id_users;
                     $courses->route    = $request->route;
             $courses->id_student     = $request->id_student;
              $courses->id_teacher     = $request->id_teacher; 
                 $courses->start_date     = $request->start_date;
              $courses->end_date     = $request->end_date; 
            $courses->save();

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
   return view($this->path.'.edit',compact('courses'));
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
        $courses = Course::findOrFail($id);
            $courses->theme     = $request->theme;
            $courses->sub_theme     = $request->sub_theme;
            $courses->category    = $request->category;
            $courses->id_users    = $request->id_users;

             $courses->id_student     = $request->id_student;
              $courses->id_teacher     = $request->id_teacher; 
            $courses->save();

        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
   return redirect('course');
    }
}
