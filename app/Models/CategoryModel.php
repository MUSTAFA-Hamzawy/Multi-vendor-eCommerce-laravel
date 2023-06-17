<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'category';
    public $timestamps = false;
    protected $primaryKey = 'category_id';
}
