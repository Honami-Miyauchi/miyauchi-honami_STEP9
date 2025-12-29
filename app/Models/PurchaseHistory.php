<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    // 商品情報を取得できるようにリレーションを追加
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
