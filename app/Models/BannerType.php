<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerType extends Model
{
    use HasFactory;

    protected $table = 'banner_types';

    protected $guarded = [
        'name'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

    public function banners()
    {
        return $this->hasMany(BannerSetting::class, 'banner_type_id');
    }
}
