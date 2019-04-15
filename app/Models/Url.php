<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $table = 'url';

    protected $fillable = [
        'link'
    ];

    public function getShortLinkAttribute()
    {
        return env('APP_URL') . '/' . rtrim(base64_encode($this->id), '=');
    }
}
