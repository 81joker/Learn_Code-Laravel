<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cource extends Model
{
  protected $fillable = [
      'title',
      'status',
      'link',
      'track_id'
  ];

  public function photo() {
    return $this->morphOne('App\Photo', 'photoable');
}

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function quizzes() {
        return $this->hasMany('App\Quiz');
    }

    public  function  track() {
        return $this->belongsTo('App\Track');
    }

    public  function  vadeos() {
        return $this->hasMany('App\Vadio', 'course_id');
    }
}
