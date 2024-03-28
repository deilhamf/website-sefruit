<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'logo',
        'breadcrumb',
        'favicon',
        'copyright1',
        'copyright2',
        'meta_keyword',
        'meta_description',
    ];
}
