<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class recruitsku extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getCreatedAtAttribute()
{
    return Carbon::parse($this->attributes['created_at'])
       ->translatedFormat('d F Y');
}

    public function user()
{
    return $this->belongsTo(User::class);
}

        public function getRouteKeyName()
        {
            return 'id';
        }
        public function province()
        {
            return $this->belongsTo('App\Models\Province');
        }

        public function regency()
        {
            return $this->belongsTo('App\Models\Regency');
        }

        public function district()
        {
            return $this->belongsTo('App\Models\District');
        }

        public function Perjalanan()
    {
        return $this->hasOne('App\Models\Perjalanan');
    }



}
