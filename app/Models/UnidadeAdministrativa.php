<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadeAdministrativa extends Model
{
    use HasFactory;
    protected $table = 'unidade_administrativas';

    protected $fillable = ['descricao'];
}
