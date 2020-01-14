<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table        =   'login';
    protected $primaryKey   =   'login_id';
    public    $timestamps   =   false;
}
