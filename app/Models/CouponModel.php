<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponModel extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    protected $primaryKey = 'coupon_id';
    protected $guarded = [];
    public $timestamps = false;
}
