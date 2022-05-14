<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    const ROLE_ADMIN = 1;
    const ROLE_USER = 2;

    protected $fillable = [
        'title',
        'description',
        'keyword',
    ];

}
