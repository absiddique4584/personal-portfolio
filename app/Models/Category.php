<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
class Category extends Model
{
   protected $fillable=['name','slug','status'];

    public function sub_categories(){
        return $this->hasMany(SubCategory::class);
    }
}
