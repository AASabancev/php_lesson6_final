<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderGood extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'good_id',
        'title',
        'count',
        'cost',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getImage()
    {
        $image_url = null;
        if ($this->good()->exists()) {
            $image_url = $this->good->image_url;
        }
        return $image_url;
    }

    public function good()
    {
        return $this->belongsTo(Good::class);
    }
}
