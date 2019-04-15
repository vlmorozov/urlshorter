<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';

    protected $fillable = [
        'url_id'
    ];

    public function url()
    {
        return $this->hasOne('App\Models\Url', 'id', 'url_id');
    }
}
