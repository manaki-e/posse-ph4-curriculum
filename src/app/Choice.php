<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = [
        'name',
        'valid'
    ];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
