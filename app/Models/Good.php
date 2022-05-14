<?php

namespace App\Models;

use App\Models\Traits\ImageableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Good extends Model
{
    use HasFactory, SoftDeletes, ImageableTrait;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'cost',
        'image_url'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
