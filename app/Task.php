<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];
    protected $attributes = [
        'completed' => false,
    ];

    public function users() {
        return $this->belongsTo('App\User');
    }
}
