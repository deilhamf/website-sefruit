<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class KategoriProduct extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products()
    {
        // return $this->belongsTo(KategoriBlog::class);
        return $this->hasMany(Service::class, 'category_id', 'id');
    }
}
