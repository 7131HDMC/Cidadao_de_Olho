<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verbas extends Model
{
    //
    protected $table = 'Verbas';
    protected $fillable = ['codDeputado','codTipoDespesa','codMes','valor','descTipoDespesa'];
}
