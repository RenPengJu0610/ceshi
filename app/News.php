<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table        =   'new';
    protected $primaryKey   =   'new_id';
    public    $timestamps   =   false;
}
