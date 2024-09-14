<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Authenticatable
{
    protected $guarded = ['id'];
    protected $table = 'vendors';
}


