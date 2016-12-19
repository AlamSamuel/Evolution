<?php

namespace App\Http\Controllers;

use App\Http\Requests\WikisRequest;
use App\Wiki;
use Auth;
use DB;
use Illuminate\Http\Request;

class WikisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('wikis.index');
    }
    public function lista()
    {
        $data = DB::table('wikis')->where('id_users', '=', Auth::user()->id)->paginate(5);
        return view('wikis.lista')->with('data', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wikis.register');
    }

    public function welcome()
    {
        $wiki  = Wiki::all();
        $wikis = DB::table('wikis')->orderBy('title', 'asc')->paginate(15);

        return view('wikis.welcome', ["wikis" => $wikis]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WikisRequest $request)
    {
        if ($request->ajax()) {
            $wiki = new Wiki();

            $wiki->id_users  = Auth::user()->id;
            $wiki->title     = $request->title;
            $wiki->content   = $request->content;
            $wiki->name_user = Auth::user()->full_name;
            $wiki->save();

            return response()->json([
                "mensaje" => "Registrado",
            ]);
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
        
        $wiki = Wiki::find($id);
        return view('wikis.show', compact('wiki'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wiki = Wiki::findOrFail($id);
        return view('wikis.edit', compact('wiki'));
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
        $wiki = Wiki::findOrFail($id)->update($request->all());
        return redirect()->route('wikis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Wiki::findOrFail($id)->delete();
        return view('wikis.index');
    }
}
