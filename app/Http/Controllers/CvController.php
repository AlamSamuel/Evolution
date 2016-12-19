<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\CV;
use DB;
use Auth;

class CvController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('cv.index');
    }
    public function ajax()
    {
        $data = DB::table('cvs')->orderBy('id','DESC')->paginate(3);
        return view('cv.ajax')->with('data',$data);
    }
    public function create()
    {
        return view('cv.create');
    }

    public function store(Request $request) 
    {

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $nombre = $file->getClientOriginalName();
        $size = $file->getClientSize();
        if($size >= 5242880) 
        {
            return "El archivo que intenta subir sobrepasa el limite del tamaño establecido";
        }
        else
        {
          
                if($extension == 'pdf' || $extension == 'png' || $extension == 'jpg' || $extension == 'docx')
                {
                    \Storage::disk('local')->put($nombre,  \File::get($file));

                    $cv = new CV();
                    $cv->id_users = Auth::user()->id;
                    $cv->name_user = Auth::user()->full_name;
                    $cv->file = $nombre;
                    $cv->category = $request->input('category');

                    $cv->save();

                    return "Esta mierda funciona";
                }
                else
                {
                     return "El archivo que intenta subir no esta permitido";
        
                }
        }
    }

    public function show($id)
    {
        $data = CV::findOrFail($id);
        return view($this->path.'.show', compact('data'));
    }
   
}

