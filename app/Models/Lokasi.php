<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function lokasi_estate()
    {
        return $this->hasMany(Lokasi_estate::class);
    }

    public function file()
    {
        return $this->hasMany(File::class);
    }


}
