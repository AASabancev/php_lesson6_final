<?php

namespace App\Models;

use App\Models\Traits\ImageableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory, ImageableTrait;

    protected $fillable = [
        'author_id',
        'datetime',
        'title',
        'description',
        'image_url',
    ];

    protected $dates = [
        'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
