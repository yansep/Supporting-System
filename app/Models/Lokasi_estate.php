<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi_estate extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function file()
    {
        return $this->hasMany(File::class);
    }

    public function lokasi()
        {
            return $this->belongsTo('App\Models\Lokasi');
        }
}
