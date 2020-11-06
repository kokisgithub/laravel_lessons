<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //このカラムにはデータを送信してもいいというMass Assignmentの設定
    protected $fillable = ['title', 'body'];

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
