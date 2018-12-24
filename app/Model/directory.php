<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class directory extends Model
{
    protected $fillable = [
        'id','name','description','website','email','phone_no','address','filename'
    ];
    public function categories()
    {
        return $this->hasMany(category::class);
    }
}
