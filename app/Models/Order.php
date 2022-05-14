<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'email',
        'address'
    ];


    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function getTotalSum()
    {
        $total_sum = 0;
        if ($this->order_goods()->exists()) {
            foreach ($this->order_goods as $order_good) {
                $total_sum += $order_good->cost * $order_good->count;
            }
        }

        return $total_sum;
    }

    public function order_goods()
    {
        return $this->hasMany(OrderGood::class, 'order_id', 'id');
    }

    public function getImage()
    {
        $image_url = null;
        if ($this->order_goods()->exists()) {
            $image_url = $this->order_goods->first()->getImage();
        }

        return $image_url;
    }
}
