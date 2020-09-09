<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    protected $table = "artigos";
    protected $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        'id',
        'nome_veiculo',
        'link',
        'ano',
        'portas',
        'combustivel',
        'quilometragem',
        'cambio',
        'cor',
        'created_at',
        'updated_at',
        'id_usuario'
    ];

    public function usuario(){
        return $this->belongsTo('App\User','id_usuario','id');
    }
}
