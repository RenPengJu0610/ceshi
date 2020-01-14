<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellHouse extends Model
{
    protected $table        =   'house';
    protected $primaryKey   =   'house_id';
    public    $timestamps   =   false;
}
