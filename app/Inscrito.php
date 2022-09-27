<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscrito extends Model
{
    use SoftDeletes;

    protected $fillable=['nome', 'sobrenome', 'cpf', 'rg', 'telefone', 'idade'];
}
