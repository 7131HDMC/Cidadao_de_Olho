<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deputado extends Model
{
    protected $table = 'Deputado';
    protected $fillable = ['idDeputado','partido','nome'];
    protected $primaryKey = 'idDeputado';

}
