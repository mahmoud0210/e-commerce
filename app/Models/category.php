<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';
    protected $fillable = ['name','image','description'];
    public $timestamp = true;

    // every category has many product
    public function products(){
        return $this->hasMany(Product::class,'products_id');
    }

    // every category has many subCategories
    public function subCategories(){
        return $this->hasMany(SubCategory::class,'sub_categories_id');
    }
}
