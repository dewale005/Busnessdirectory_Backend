<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'category'
    ];
    public function directories()
    {
        return $this->belongsTo(directory::class);
    }
}
