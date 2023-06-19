<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'genre_id','title','detail','author','magazine','image_path','meta_keywords',
        'volumes'
    ];

    protected $hidden = [
        'updated_at'
    ];

    public function volumes()
    {
        return $this->hasMany(Volume::class, 'item_id');
    }

    public function genre()
    {
        return $this->belongsTo(Category::class, 'genre_id');
    }

}
