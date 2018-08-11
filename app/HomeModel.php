<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeModel extends Model
{
    //
    protected $table = 'airplane_models';

    protected $fillable = ['model_id','manufacturer','model'];
}
