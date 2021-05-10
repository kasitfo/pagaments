<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagament extends Model
{
    protected $table = 'pagaments';

    public $timestamps = false;

    protected $fillable = [
        'categoria_id',
        'compte_id',
        'nivell',
        'comanda',
        'titol',
        'descripcio',
        'preu',
        'data_inici',
        'data_fi',
        'estat'
    ];

    
}
