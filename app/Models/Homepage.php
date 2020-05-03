<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    protected $fillable = ['title', 'sub_title','paragraph', 'image'];
}
