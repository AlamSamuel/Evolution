<?php

namespace App\Http\Controllers;

use App\User;
use App\Country;
use Auth;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Exception;
use Session;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private $path ='user';

    public function index()
    {   
        return view($this->path.'.index');    
    }
    public function listall()
    {
       switch (Auth::user()->rol) 
        {
            case '1':
                $data = DB::table('users')
                                // ->where('rol','!=',Auth::user()->rol)
                                ->orderBy('id','DESC')
                                ->paginate(3);
                return view($this->path.'.listall')->with('data',$data);
            break;
            case '2':
                $data = DB::table('users')->where('rol',3)
                                          ->orWhere('rol',4)
                                         ->orderBy('id','DESC')
                             
                                        ->paginate(3);
                                        
                return view($this->path.'.listall')->with('data',$data);
            break;
            
            default:
            return view($this->path.'.index');
        }
    }
    public function create(){
        $paises = Country::all();
        return view($this->path.'.create')->with('paises',$paises);
    }

    public function store(UserRequest $request)
    {   
    
        if($request->ajax()){
            $file = $request->file('file');
            $nombre = $file->getClientOriginalName();
            \Storage::disk('local')->put($nombre,  \File::get($file));
            $user = new User();
            $user->full_name = $request->full_name;
            $user->id_card   = $request->id_card;
            $user->email     = $request->email;
            $user->password  = bcrypt($request->password);
            $user->phone     = $request->phone;
            $user->country   = $request->country;
            $user->address   = $request->address;
            $user->genre     = $request->genre;
            $user->rol       = $request->rol;
            $user->status    = $request->status;
            $user->file     = $nombre;
            $user->save();
            return response()->json([
                "mensaje" => "Registrado"
                ]);
        }
    }

    public function destroy($id){
        try{
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('users.index');
        } catch (Exception $e){

            return "Fatal error - ".$e->getMessage();
        }

    }
    public function show($id)
    {
        
        $user = User::findOrFail($id);
        return view($this->path.'.show', compact('user'));
    }
    public function edit($id){
        $user = User::findOrFail($id);
        return view($this->path.'.edit', compact('user'));
    }

    public function update(Request $request, $id){

            $user = User::findOrFail($id);
            $user->full_name = $request->full_name;
            $user->id_card   = $request->id_card;
            $user->email     = $request->email;
            $user->password  = bcrypt($request->password);
            $user->phone     = $request->phone;
            $user->address   = $request->address;
            $user->genre   = $request->genre;
            $user->rol       = $request->rol;
            $user->status    = $request->status;
            // $user->image     = $request->image;
            $user->save();
        return redirect()->route('users.index');
    }

}
