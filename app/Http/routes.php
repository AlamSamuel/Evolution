<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', 'WelcomeController@index');
Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);
Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);

Route::group(['middleware' => ['auth', 'status']], function () {
    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('wikis', 'WikisController');
    Route::get('wikis/{id}/{title}', 'WikisController@show');
    Route::get('lista/{page?}', 'WikisController@lista');
    Route::get('/welcome', 'WikisController@welcome');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('users', 'UserController');
    Route::get('listall/{page?}', 'UserController@listall');
    Route::resource('user','BloquearUserController');

    Route::resource('cv', 'CvController');
    Route::get('ajax/{page?}', 'CvController@ajax');

    Route::get('/listas/{page?}', 'PlanController@listas');
    Route::resource('plan', 'PlanController');
    Route::get('add_module', 'PlanController@add_module');

    Route::get('/listass/{page?}', 'CoursesController@listas');
	Route::resource('course','CoursesController');
	Route::resource('module','ModuleController');
    Route::resource('calendar','CalendarioController');

    Route::resource('reposite','RepositeController');


Route::get('mail', 'MailController@index');

Route::post('enviar_correo', 'MailController@enviar');

Route::post('cargar_correo', 'MailController@store');
	
/***************************************************************************************************************************************************************************************************************************************************************************************************************************************** * ******************************************************************************************************************************************************************/
	//COSAS NUEVAS AQUI ABAJO 13/10/2016
	Route::resource('evaluacion','Evaluaciones2Controller');
	Route::get('Control','Evaluaciones2Controller@indexControl');
	Route::post('control/{id}','Evaluaciones2Controller@indexControl2');
	Route::post('principal', 'Evaluaciones2Controller@indexPrincipal');
	// Route::get('curso', 'Evaluaciones2Controller@indexEvaluacion');
	Route::get('resultado','Evaluaciones2Controller@showResultadoExamen');

	Route::get('prueba/{id}', 'Evaluaciones2Controller@indexprueba');
	//examen y practicas
	Route::get('examen/{id}','Evaluaciones2Controller@createExamen');
	Route::post('examen','Evaluaciones2Controller@storeExamen');
	Route::post('examenEstudiante','Evaluaciones2Controller@storeEvaluacionExamen');
	Route::get('listarexamen/{id}','Evaluaciones2Controller@showListarExamen');
	Route::get('listaCProfesor','Evaluaciones2Controller@showCursoProfesor');
	//una prueba
	Route::get('curso/{id}', 'Evaluaciones2Controller@indexEvaluacion');
	Route::post('curso/{id}', 'Evaluaciones2Controller@indexEvaluacion');
	Route::get('listarCurso/{page?}', 'Evaluaciones2Controller@createLista');
	Route::get('listarCurso', 'Evaluaciones2Controller@createLista');
	//fin de la prueba
	//comienzo de los temas
	Route::get('respmult/{id}', 'Evaluaciones2Controller@createMultipleRespuesta');
	Route::get('completa2/{id}', 'Evaluaciones2Controller@createCompleta');
	Route::get('selemult/{id}', 'Evaluaciones2Controller@createSeleccionMultiple');
	Route::get('falsverd/{id}', 'Evaluaciones2Controller@createFalsoVerdadero');
	//fin de los temas
	//VISTA PARA LOS ESTUDIANTES EXAMEN, PRACTICA Y CURSOS
	Route::get('verCurso','Evaluaciones2Controller@showCurso');
	Route::post('verModulo/{id}','Evaluaciones2Controller@showCursoEstudiante');
	//FIN DE LAS VISTAS EXAMEN, PRACTICA Y CURSOS

	//FIN DE LAS COSAS NUEVAS 
/***************************************************************************************************************************************************************************************************************************************************************************************************************************************** * ******************************************************************************************************************************************************************/
});
 
 Route::resource('email','CorreoController');
Route::resource('forum','ForumController');

Route::get('vera','ForumController@ver');

Route::resource('comment','Comment_forumController');

Route::get('comment/crear/{$id}/crear',
 [ 
 'uses' => 'Comment_forumController@crear',
'as' => 'comment.crear',
  ]);
