<?php

namespace App;

use App\Brand;
use App\Color;
use App\Category;
use App\Application;
use App\ProductPicture;
use App\VariableProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'order', 'name',  'description', 'data_sheet', 'extra1'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function variableProducts()
    {
        return $this->hasMany(VariableProduct::class);
    }
}
