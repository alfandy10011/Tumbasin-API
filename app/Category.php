<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    /**
     * Data yang di perbolehkan masuk ke dalam database
     * melalui form inputan dengan eloquent
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'image'
    ];

    /**
     * Mengambil data image dari category
     *
     * @return  String
     */
    public function getImageUrlAttribute()
    {
        return Storage::url($this->image);
    }
}