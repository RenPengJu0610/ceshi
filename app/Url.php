<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $table        =   'url';
    protected $primaryKey   =   'url_id';
    public    $timestamps   =   false;
}
