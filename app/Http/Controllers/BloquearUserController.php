<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
class BloquearUserController extends Controller
{
    public function update(Request $request,$id)
    {
    	$user = User::findOrFail($id)->update($request->all());
        return redirect()->route('users.index');
    }
}
