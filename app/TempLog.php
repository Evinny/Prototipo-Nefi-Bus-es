<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempLog extends Model
{
    protected $fillable = ['auth_inscrito', 'auth_empresa', 'auth_adm', 'ip'];
}
