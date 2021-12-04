<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
    protected $table="drives";
    public $fillable=['title', 'description', 'file'];
}
