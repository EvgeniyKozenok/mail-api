<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    protected $table = 'dispatch';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['msg'];
}
