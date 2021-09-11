<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table attributes can be changed
    protected $table = 'posts';
    public $primaryKey = 'id';
    public $timestamps = true;

    //Setting up a one to many relationship
    //i.e. one user has many posts but one post
    //can only have one user
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
