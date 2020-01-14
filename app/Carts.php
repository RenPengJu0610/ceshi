<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $table        =   'carts';
    protected $primaryKey   =   'carts_id';
    public $timestamps = false;
}
