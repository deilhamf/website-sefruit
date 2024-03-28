<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\KategoriService;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(KategoriService::class, 'category_id');
    }

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::creating(function ($model) {
    //         if (empty($model->{$model->getKeyName()})) {
    //             $model->{$model->getKeyName()} = Str::uuid()->toString();
    //         }
    //     });
    // }

    // public function getIncrementing()
    // {
    //     return false;
    // }

    // public function getKeyType()
    // {
    //     return 'string';
    // }
}
