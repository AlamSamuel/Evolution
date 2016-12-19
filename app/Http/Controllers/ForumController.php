<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;

use App\Comment;
use App\Forum;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     private $path = 'forum';

    public function index()

    {
$forums = DB::table('forums')->get();

        return view('forum.index', ['forums' => $forums]);
   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
         switch (Auth::user()->rol) 
        {
            case '1':
              return view('forum.create');
            break;
            case '2':

           return view('forum.create');
            break;
            
            default:

       return view('forum.create');
    }
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
          $forum =new Forum();
             $forum->id_users = $request->id_users;
          $forum->email = $request->email;
             $forum->title = $request->title;
               $forum->messages = $request->messages;

           $forum->save();

 return redirect()->route('forum.index');
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

    public function ver (){

        $forums = Forum::all();
     
       return view($this->path.'.index',compact('$forums'));

    }
}
