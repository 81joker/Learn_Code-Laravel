<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vadio extends Model
{
    protected $fillable = [
        'title',
        'link',
        'course_id'
    ];

    public function course(){
        return $this->belongsTo('App\Cource', 'course_id');
    }
}
