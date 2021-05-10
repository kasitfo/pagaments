<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    protected $table = 'comptes';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'compte',
        'fuc',
        'clau'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id')->first();
    }
}
