<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    protected $fillable = ['data_checkup', 'peso', 'altura', 'art_pressao', 'glicose',
    'colesterol_ldl', 'colesterol_hdl', 'observacoes'];

    protected $guarded = ['id', 'fk_users_id'];

    protected $table = 'checkups';

}
