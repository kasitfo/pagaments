<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categories';

    public $timestamps = true;

    protected $fillable = [
        'categoria',
        'user_id',
        'curs_id'
    ];

    /**
     * Definim la relació entre el user_id d'aquest taula amb el id de la taula de users
     * @return User
     */
    public function usuari(){
        return $this->belongsTo('App\User', 'user_id')->first();
    }

    /**
     * Definim la relació entre el curs_id d'aquest taula amb el id de la taula de users
     * @return Curs
     */
    public function curs(){
        return $this->belongsTo( 'App\Curs', 'curs_id')->first();
    }


}
