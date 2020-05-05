<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class SubCategory extends Model
{
    protected $fillable=['category_id','title','image','status'];

    public function category(){
        return $this->belongsTo(Category::class)->select('id','name','slug');
    }

}
