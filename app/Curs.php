<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curs extends Model
{
    protected $table = 'cursos';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'curs'
    ];

    /**
     * Definim la relació entre el user_id d'aquest taula amb la taula de users
     * @return User
     */
    public function usuari(){
        return $this->belongsTo('App\Models\User', 'user_id')->first();
    }


}
