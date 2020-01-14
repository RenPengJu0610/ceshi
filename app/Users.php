<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table        =   'admins';
    protected $primaryKey   =   'admin_id';
    public    $timestamps   =   false;
}
