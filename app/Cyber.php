<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cyber extends Model
{
    //
    protected $table ='cyber';
    protected $fillable =['id', 'time', 'FB', 'TW', 'IG','GP','total_issue'];
}
