<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = ['id'];

    public function setFilenameAttribute($file)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/pdf', $filename);
        $this->attributes['filename'] = $filename;
    }

    public function lokasi()
        {
            return $this->belongsTo('App\Models\Lokasi');
        }

        public function lokasi_estate()
        {
            return $this->belongsTo('App\Models\Lokasi_estate');
        }
}
