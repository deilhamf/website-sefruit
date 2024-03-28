<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'overview',
        'desc',
        'image',
        'image2',
        'image3',
        'tahun',
    ];
}
