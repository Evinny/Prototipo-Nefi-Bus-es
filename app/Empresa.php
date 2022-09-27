<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['nome', 'responsavel,', 'cnpj', 'email', 'estado', 'telefone', 'tipo'];
}
