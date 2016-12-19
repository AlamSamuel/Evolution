<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Course;
use App\betaCorrectaModel;
use App\betaExamenModel;
use App\betaPracticaModel;
use App\betaPreguntaModel;
use App\betaRespuestaModel;
use App\betaResultadoModel;
use Session;

class Evaluaciones2Controller extends Controller
{    
    public function index()
    {
        return view('evaluation2.cursos');
    }

    public function indexControl(){
        return view('evaluation2.controlTema');
    }

    public function indexControl2($id){
        return view('evaluation2.control',['idExamen'=>$id]);
    }

    public function indexPrincipal(Request $request){

        $ver = $request->check1;
        $sel = $request->check2;
        $com = $request->check3;
        $mul = $request->check4;
        $idexam = $request->idExamen;
        return view('evaluation2.principal',['ver'=>$ver,'sel'=>$sel,'com'=>$com,'mul'=>$mul,'idexamen'=>$idexam]);
    }

    public function indexEvaluacion($id){
        return view('evaluation2.indexEvaluation2',['id'=>$id]);
    }

    public function indexprueba($id){

        $examen = DB::table('betaexamenes')
                    ->select("betaexamenes.id","betaexamenes.id_curso","betaexamenes.status","betapreguntas.id as idpregunta","betapreguntas.id_examenes","betapreguntas.texto","betapreguntas.tipo_pregunta")
                    ->join('betapreguntas','betaexamenes.id','=','betapreguntas.id_examenes')
                    ->where('betaexamenes.id_curso','=',$id)
                    ->where('betaexamenes.status', '=',1)
                    ->get();

        $respuesta = DB::table("betarespuestas")->get();

        return view('evaluation2.prueba',['id_examen'=>$examen,'respuesta'=>$respuesta]);
    }

/*********************************************************************************************************************************************************************************************************************************************************************************************************************************************/
    public function create()
    {
        return view('evaluation2.estudiante.Cursos');
    }

    public function createExamen($id){
        return view('evaluation2.createEvaluation.createExamen',['id'=>$id]);
    }

    public function createMultipleRespuesta($id){
        return view('evaluation2.pregunta.createMultipleRespuesta',['idPregunta'=>$id]);
    }

    public function createSeleccionMultiple($id){
        return view('evaluation2.pregunta.createSeleccionMultiple',['idPregunta'=>$id]);
    }

    public function createFalsoVerdadero($id){
        return view('evaluation2.pregunta.createFalsoVerdadero',['idPregunta'=>$id]);
    }

    public function createCompleta($id){
        return view('evaluation2.pregunta.createCompleta',['idPregunta'=>$id]);
    }

    public function createLista(){
        $lista = Course::paginate(5);
        return view('evaluation2.listaCurso',['list'=>$lista]);
    }
/*********************************************************************************************************************************************************************************************************************************************************************************************************************************************/

    public function store(Request $request)
    {        // dd($request->all());
            if ($request->ajax()) {
                
                switch ($_POST['type']) {
                    case 'Completa':
                        $completa = new betaPreguntaModel;
                        $completa->id_examenes = $_POST['idExamen'];
                        $completa->texto = $_POST['completa'];
                        $completa->tipo_pregunta = $_POST['type'];
                        $completa->fecha = $_POST['fecha'];

                        $id = DB::table("betapreguntas")->insertGetId(['id_examenes'=>$completa->id_examenes,'texto'=>$completa->texto,'tipo_pregunta'=>$completa->tipo_pregunta,'fecha'=>$completa->fecha]);
                        DB::table("betarespuestas")->insert(['id_preguntas'=>$id,'posibles_respuestas'=>$_POST['area']]);
                        DB::table("betacorrectas")->insert(['id_preguntas'=>$id,'respuestas_correctas'=>$completa->texto]);
                        if ($id == null or "") {
                            Session::flash('not','Error al Guardar');
                            return response()->json(['success'=>'false']);
                        }else{
                            Session::flash('save','Guardado Correctamente');
                            return response()->json(['success'=>'true']);
                        }                        
                        break;
                    case 'Falso o Verdadero':
                        $verdaderoFalso = new betaPreguntaModel;
                        $verdaderoFalso->id_examenes = $_POST['idExamen'];
                        $verdaderoFalso->texto = $_POST['pregunta'];
                        $verdaderoFalso->tipo_pregunta = $_POST['type'];
                        $verdaderoFalso->fecha = $_POST['fecha'];

                        for ($i=0; $i < count($verdaderoFalso->texto ); $i++) { 

                            $respuesta[$i] = $_POST['correcta'.$i];
                            $id = DB::table("betapreguntas")->insertGetId(['id_examenes'=>$verdaderoFalso->id_examenes,'texto'=>$verdaderoFalso->texto[$i],'tipo_pregunta'=>$verdaderoFalso->tipo_pregunta,'fecha'=>$verdaderoFalso->fecha]);
                            DB::table("betarespuestas")->insert(['id_preguntas'=>$id,'posibles_respuestas'=>$respuesta[$i]]);
                            DB::table("betacorrectas")->insert(['id_preguntas'=>$id,'respuestas_correctas'=>$respuesta[$i]]);

                            if ($respuesta[$i] == 'Verdadero') {
                                
                                DB::table("betarespuestas")->insert(['id_preguntas'=>$id,'posibles_respuestas'=>'Falso']);
                                
                            }elseif ($respuesta[$i] == 'Falso') {
            
                                DB::table("betarespuestas")->insert(['id_preguntas'=>$id,'posibles_respuestas'=>'Verdadero']);
                            }
                        }
                        if ($id == null or "") {
                            Session::flash('not','Error al Guardar');
                            return response()->json(['success'=>'false']);
                        }else{
                            Session::flash('save','Guardado Correctamente');
                            return response()->json(['success'=>'true']);
                        }
                        break;
                    case 'Selection Multiple':
                            $seleccionMultiple = new betaPreguntaModel;
                            $seleccionMultiple->id_examenes = $_POST['idExamen'];
                            $seleccionMultiple->texto = $_POST['question'];
                            $seleccionMultiple->tipo_pregunta = $_POST['type'];
                            $seleccionMultiple->fecha = $_POST['fecha'];
                            $id = DB::table("betapreguntas")->insertGetId(['id_examenes'=>$seleccionMultiple->id_examenes,'texto'=>$seleccionMultiple->texto,'tipo_pregunta'=>$seleccionMultiple->tipo_pregunta,'fecha'=>$seleccionMultiple->fecha]);
                            foreach($_POST['answer'] as $clave=>$row){

                                foreach($_POST['correcta'] as $key=>$fila){

                                    if($clave == $fila){
                                        $correcta = $row;
                                    }
                                }
                                DB::table("betarespuestas")->insert(['id_preguntas'=>$id,'posibles_respuestas'=>$row]);
                            }
                            DB::table("betacorrectas")->insert(['id_preguntas'=>$id,'respuestas_correctas'=>$correcta]);

                            if ($id == null or "") {
                                Session::flash('not','Error al Guardar');
                                return response()->json(['success'=>'false']);
                            }else{
                                Session::flash('save','Guardado Correctamente');
                                return response()->json(['success'=>'true']);
                            }
                            break;
                    case 'Multiples Respuestas':
                            $multipleRespuesta = new betaPreguntaModel;
                            $multipleRespuesta->id_examenes = $_POST['idExamen'];
                            $multipleRespuesta->texto = $_POST['question'];
                            $multipleRespuesta->tipo_pregunta = $_POST['type'];
                            $multipleRespuesta->fecha = $_POST['fecha'];
                             $l = 0;
                            // $id = DB::table("betapreguntas")->insertGetId(['id_examenes'=>$multipleRespuesta->id_examenes,'texto'=>$multipleRespuesta->texto,'tipo_pregunta'=>$multipleRespuesta->tipo_pregunta,'fecha'=>$multipleRespuesta->fecha]);
                              for ($i=0; $i < count($_POST['answer']); $i++) { 
                            // //     echo $res = $_POST['answer'.$i]."<br>";
                                   $res[$i] = $_POST['check'.$i];
                                 echo $i."<br>";
                            // }
                           //  echo  $_POST['check1'];
                           // foreach ($_POST['answer'] as $key => $row) {
                                // $checkbox = 'check'.$l;
                               // echo $resp = $_POST['check'.$key];
                               // echo $checkbox."<br>";
                               // echo $row."<br>";
                                
                                // DB::table("betarespuestas")->insert(['id_preguntas'=>$id,'posibles_respuestas'=>$row]);

                                // if ($resp != "" or 0) {
                                //     DB::table("betacorrectas")->insert(['id_preguntas'=>$id,'respuestas_correctas'=>$row]);
                                // }
                                 //$l = $l + 1;
                            } 
                            // if ($id == null or "") {
                            //     Session::flash('not','Error al Guardar');
                            //     return response()->json(['success'=>'false']);
                            // }else{
                                Session::flash('save','Guardado Correctamente');
                                return response()->json(['success'=>'true']);
                            // }     
                            break;            
                    default:
                        # code...
                        break;
                }

             } 
        // switch($request->type){
        //     case 'Falso o Verdadero':

        //         $verdaderoFalso = new betaPreguntaModel;
        //         $verdaderoFalso->id_examenes = $request->idExamen;
        //         $verdaderoFalso->texto = $request->pregunta;
        //         $verdaderoFalso->tipo_pregunta = $request->type;
        //         $verdaderoFalso->fecha = $request->fecha;
        //         $l = 0;
        //         foreach ($verdaderoFalso->texto as $key => $row) {
                    
        //             $correcta = 'correcta'.$l;
        //             $respuesta = $request->$correcta;
        //             $id = DB::table("betapreguntas")->insertGetId(['id_examenes'=>$verdaderoFalso->id_examenes,'texto'=>$row,'tipo_pregunta'=>$verdaderoFalso->tipo_pregunta,'fecha'=>$verdaderoFalso->fecha]);
        //             DB::table("betarespuestas")->insert(['id_preguntas'=>$id,'posibles_respuestas'=>$respuesta]);
        //             DB::table("betacorrectas")->insert(['id_preguntas'=>$id,'respuestas_correctas'=>$respuesta]);

        //             if ($respuesta == 'Verdadero') {
                        
        //                 DB::table("betarespuestas")->insert(['id_preguntas'=>$id,'posibles_respuestas'=>'Falso']);
                        
        //             }elseif ($respuesta == 'Falso') {
    
        //                 DB::table("betarespuestas")->insert(['id_preguntas'=>$id,'posibles_respuestas'=>'Verdadero']);
        //             }
        //             $l = $l + 1;
        //         }
        //         break;
        //     case 'Selection Multiple':

        //             $seleccionMultiple = new betaPreguntaModel;
        //             $seleccionMultiple->id_examenes = $request->idExamen;
        //             $seleccionMultiple->texto = $request->question;
        //             $seleccionMultiple->tipo_pregunta = $request->type;
        //             $seleccionMultiple->fecha = $request->fecha;
        //             $id = DB::table("betapreguntas")->insertGetId(['id_examenes'=>$seleccionMultiple->id_examenes,'texto'=>$seleccionMultiple->texto,'tipo_pregunta'=>$seleccionMultiple->tipo_pregunta,'fecha'=>$seleccionMultiple->fecha]);
        //             foreach($request->answer as $clave=>$row){

        //                 foreach($request->correcta as $key=>$fila){

        //                     if($clave == $fila){
        //                         $correcta = $row;
        //                     }
        //                 }
        //                 DB::table("betarespuestas")->insert(['id_preguntas'=>$id,'posibles_respuestas'=>$row]);
        //             }
        //             DB::table("betacorrectas")->insert(['id_preguntas'=>$id,'respuestas_correctas'=>$correcta]);
        //         break;
        //     case 'Multiples Respuestas':
        //         $multipleRespuesta = new betaPreguntaModel;
        //         $multipleRespuesta->id_examenes = $request->idExamen;
        //         $multipleRespuesta->texto = $request->question;
        //         $multipleRespuesta->tipo_pregunta = $request->type;
        //         $multipleRespuesta->fecha = $request->fecha;
        //         $l = 0;
        //         $id = DB::table("betapreguntas")->insertGetId(['id_examenes'=>$multipleRespuesta->id_examenes,'texto'=>$multipleRespuesta->texto,'tipo_pregunta'=>$multipleRespuesta->tipo_pregunta,'fecha'=>$multipleRespuesta->fecha]);
        //         foreach ($request->answer as $key => $row) {
        //             $checkbox = 'cn'.$l;
        //             $resp = $request->$checkbox;
        //             DB::table("betarespuestas")->insert(['id_preguntas'=>$id,'posibles_respuestas'=>$row]);

        //             if ($resp != "" or 0) {
        //                 DB::table("betacorrectas")->insert(['id_preguntas'=>$id,'respuestas_correctas'=>$row]);
        //             }
        //             $l = $l + 1;
        //         }
        //         break;
        //     case 'Completa':
        //         $completa = new betaPreguntaModel;
        //         $completa->id_examenes = $request->idExamen;
        //         $completa->texto = $request->completa;
        //         $completa->tipo_pregunta = $request->type;
        //         $completa->fecha = $request->fecha;

        //         $id = DB::table("betapreguntas")->insertGetId(['id_examenes'=>$completa->id_examenes,'texto'=>$completa->texto,'tipo_pregunta'=>$completa->tipo_pregunta,'fecha'=>$completa->fecha]);
        //         DB::table("betarespuestas")->insert(['id_preguntas'=>$id,'posibles_respuestas'=>$request->area]);
        //         DB::table("betacorrectas")->insert(['id_preguntas'=>$id,'respuestas_correctas'=>$request->completa]);
        //         break;
        //     default:
        //         break;
        // }

        // echo "Guardedo Correcto";
    }

    public function storeExamen(Request $request){

        $id = DB::table('betaexamenes')->insertGetId(['id_curso'=>$request->idCurso, 'titulo'=>$request->titulo, 'codigo_examen'=>$request->codigo, 'fecha'=>$request->fecha]);
        return view('evaluation2.controlTema',['idExamen'=>$id]);
    }

    public function storeEvaluacionExamen(Request $request){
         //dd($request->all());
        $pregunta = DB::table("betapreguntas")
                        ->select('id','tipo_pregunta')
                        ->get();
        $numero = 1;
        $nota = 100;
        foreach($request->pregunta as $key=>$row){
  
            foreach ($pregunta as $clave => $value) {
                if($value->tipo_pregunta == "Falso o Verdadero"){
                    if($value->id == $row){
                        $falsverd = 'falverd'.$numero;
                        $resp = $request->$falsverd;           
                        $evalua = DB::table("betapreguntas")
                                        ->select('betacorrectas.respuestas_correctas')
                                        ->join("betacorrectas","betapreguntas.id", "=", "betacorrectas.id_preguntas")
                                        ->where("betapreguntas.id", "=", $value->id)
                                        ->where("betapreguntas.tipo_pregunta", "=", "Falso o Verdadero")
                                        ->where("betacorrectas.respuestas_correctas", "=", $resp)
                                        ->get();
                        if(empty($evalua)){
                           // echo $numero."mala = ". $value->id."<br>";
                            $nota = $nota - 5;
                        }else{
                           // echo $numero."buena = ".$value->id ."<br>";                           
                        }
                    }

                }elseif($value->tipo_pregunta == "Selection Multiple"){
                    if($value->id == $row){
                       $selection = 'seleccion'.$numero;
                       $resp2 = $request->$selection;
                       $evalua2 = DB::table("betapreguntas")
                                        ->select('betacorrectas.respuestas_correctas')
                                        ->join("betacorrectas","betapreguntas.id", "=", "betacorrectas.id_preguntas")
                                        ->where("betapreguntas.id", "=", $value->id)
                                        ->where("betapreguntas.tipo_pregunta", "=","Selection Multiple")
                                        ->where("betacorrectas.respuestas_correctas", "=", $resp2)
                                        ->first();
                        if(empty($evalua2)){
                            //echo $numero."mala = ". $value->id."<br>";
                            $nota = $nota - 5;
                        }else{
                            //echo $numero."buena = ".$value->id ."<br>";                          
                        } 
                    }

                }elseif($value->tipo_pregunta == "Completa"){
                    if($value->id == $row){
                       $completa = 'completa'.$numero;
                       $resp3 = $request->$completa;
                       $evalua3 = DB::table("betapreguntas")
                                        ->select('betacorrectas.respuestas_correctas')
                                        ->join("betacorrectas","betapreguntas.id", "=", "betacorrectas.id_preguntas")
                                        ->where("betapreguntas.id", "=", $value->id)
                                        ->where("betapreguntas.tipo_pregunta", "=","Completa")
                                        ->where("betacorrectas.respuestas_correctas", "=", $resp3)
                                        ->first();
                        if(empty($evalua3)){
                            //echo $numero."mala = ". $value->id."<br>";
                            $nota = $nota - 5;
                        }else{
                            //echo $numero."buena = ".$value->id ."<br>";                          
                        }
                    }

                }elseif($value->tipo_pregunta == "Multiples Respuestas"){
                    if($value->id == $row){
                       $multiple = 'multiple'.$numero;
                       $resp4 = $request->$multiple;
                       foreach($resp4 as $res){
                            $evalua4 = DB::table("betapreguntas")
                                        ->select('betacorrectas.respuestas_correctas')
                                        ->join("betacorrectas","betapreguntas.id", "=", "betacorrectas.id_preguntas")
                                        ->where("betapreguntas.id", "=", $value->id)
                                        ->where("betapreguntas.tipo_pregunta", "=","Multiples Respuestas")
                                        ->where("betacorrectas.respuestas_correctas", "=", $res)
                                        ->first();
                        
                             if(count($evalua4) > 0){
  
                                   //echo $numero." AQUI EL RESULTADO ".$value->id."<br>";

                             }elseif(count($evalua4) == 0){
                                   
                               // echo $numero." MALAS ".$value->id."<br>";
                                $nota = $nota - 5;
                                break;                                              
                             }
                       
                        } //fin del foreach  
                    }//fin del if
                }//fin del elseif
            }//fin del foreach
                           
            $numero = $numero + 1;
        }

            //echo "<br> <h1>".$nota."</h1>";
         $resul = new betaResultadoModel;
         $resul->id_examen_practica = $request->examen;
         $resul->id_estudiante = $request->Estudiante;
         $resul->tipo_evaluacion = $request->tipo;
         $resul->resultado = $nota;
         $resul->fecha = $request->fecha;

        $id = DB::table("betaresultados")->insertGetId(['id_examen_practica'=>$resul->id_examen_practica ,'id_estudiante'=>$resul->id_estudiante, 'tipo_evaluacion'=>$resul->tipo_evaluacion ,'resultado'=>$resul->resultado ,'fecha'=>$resul->fecha]);
        return view("evaluation2.estudiante.resultadoExamen",['nota'=>$nota]);
    }

    public function storePreguntaExamen(Request $request){
        echo "AQUI SE GUARDAN LAS PREGUNTAS Y RESPUESTAS DE ELLAS MISMAS";
    }

    public function storeResultadoExamen(Request $request){
        echo "AQUI SE GUARDA EL RESULTADO DE LOS EXAMENS HECHOS POR LOS ESTUDIANTES";
    }

/*********************************************************************************************************************************************************************************************************************************************************************************************************************************************/

    public function show($id)
    {
        dd($id);
    }

    public function showCurso(){
        $curso = DB::table('courses')->get();
        return view('evaluation2.estudiante.Cursos',['cursos'=>$curso]);
    }

    public function showCursoProfesor(){
       // $curso = Course::paginate(7);
        $curso = DB::table('courses')->paginate(7);
        return view('evaluation2.listaCursoProfesor',['listado'=>$curso]);
    }

    public function showCursoEstudiante($id){

        $modulo = DB::table('modules')
                        ->where('id_courses', '=', $id)
                        ->get();
        $examen = DB::table('betaexamenes')
                        ->where('id_curso', '=', $id)
                        ->where('status', '=', 1)
                        ->get();               
        return view('evaluation2.estudiante.showCurso',['id'=>$id,'modulo'=>$modulo,'examen'=>$examen]);
    }

    public function showListarExamen($id){
        $examen = DB::table('betaexamenes')
                        ->where('id_curso', '=', $id)
                        ->get();
        return view('evaluation2.createEvaluation.listarExamen',['examen'=>$examen]);
    }

    public function showResultadoExamen($id){
        return view("evaluation2.estudiante.resultadoExamen");
    }
/*********************************************************************************************************************************************************************************************************************************************************************************************************************************************/

    public function edit($id)
    {
        //
    }
/*********************************************************************************************************************************************************************************************************************************************************************************************************************************************/

    public function update(Request $request, $id)
    {
        //dd($request->all());
        DB::table('betaexamenes')
                    ->where('id', '=', $id)
                    ->update(['status' => $request->status]);
        //return redirect()->to('curso',$id);
       return redirect()->route('evaluacion.index');
    }
/*********************************************************************************************************************************************************************************************************************************************************************************************************************************************/

    public function destroy($id)
    {
        //
    }
}
