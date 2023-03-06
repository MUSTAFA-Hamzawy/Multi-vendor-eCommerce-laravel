<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImagesModel extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'product_images';
    protected $primaryKey = 'image_id';
    public $timestamps = false;
}
