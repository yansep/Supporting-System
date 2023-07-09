<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perjalanan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function recruitsku()
    {
        return $this->belongsTo('App\Models\recruitsku');
    }
}
