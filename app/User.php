<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name','id_card','email','password','phone','country','address','genre','rol','status','file',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function setFileAttribute($file)
    // {
    //     $this->attributes['file'] = Carbon::now()->second.$file->getClientOriginalName();
    //     $name = Carbon::now()->second.$file->getClientOriginalName();
    //     \Storage::disk('local')->put($name, \File::get($file)); 
    // }

     /*--Funciones para los middleware--*/
    public function TypeUser()
    {
        return $this->rol === 1;
    }
    public function TypeUser2()
    {
        return $this->rol === 2;
    }
    public function Status()
    {
        
        return $this->status === 1;
    }

    public function calendario() {
return $this->hasMany('App\Calendario');
}
}
