<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class KategoriService extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function services()
    {
        // return $this->belongsTo(KategoriBlog::class);
        return $this->hasMany(Service::class, 'category_id', 'id');
    }
}
