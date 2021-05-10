<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagament extends Model
{
    protected $table = 'pagaments';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'categoria_id',
        'compte_id',
        'titol',
        'descripcio',
        'preu',
        'data_inici',
        'data_fi',
        'estat'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id')->first();
    }

    public function categoria(){
        return $this->belongsTo('App\Categoria', 'categoria_id')->first();
    }

    public function compte(){
        return $this->belongsTo('App\Compte', 'compte_id')->first();
    }


}
