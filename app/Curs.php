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

    public function usuari(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }


}
