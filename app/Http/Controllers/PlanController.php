<?php

namespace App\Http\Controllers;

use App\module;
use DB;
use Exception;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $path = 'plan';

    public function index()
    {

        $plan = Module::all();

        return view($this->path . '.index', compact('plan'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plan.create');
    }
    public function listas()
    {
        $plan = DB::table('modules')->paginate(5);
        return view('plan.listas')->with('plan', $plan);

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
                $plan                  = new module();
                $plan->name            = $request->name;
                $plan->id_courses      = $request->id_courses;
                $plan->cantity_modules = $request->cantity_modules;
                $plan->description     = $request->description;
                $plan->modules         = $request->modules;
                $plan->save();
                return redirect()->route('plan.index');
            } catch (Exception $e) {

                return " sorry ,error - " . $e->getMessage();
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

        $plan = Module::findOrFail($id);
        return view($this->path . '.mostrar', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $plan = Module::findOrFail($id);

        return view($this->path . '.edit', compact('plan'));
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

        $plan                  = Module::findOrFail($id);
        $plan->name            = $request->name;
        $plan->id_courses      = $request->id_courses;
        $plan->cantity_modules = $request->cantity_modules;
        $plan->description     = $request->description;
        $plan->modules         = $request->modules;
        $plan->save();

        return redirect()->route('plan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $plan = Module::findOrFail($id);
            $plan->delete();
            return redirect()->route('plan.index');
        } catch (Exception $e) {
            return "sorry error - " . $e->getMessage();
        }

    }
}
