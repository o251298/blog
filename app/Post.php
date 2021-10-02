<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function photo(){
        return $this->hasOne(Photo::class);
    }

    public function marks(){
        return $this->morphMany(Mark::class, 'table');
    }
    public function rating(){
        $result = array();
        $likes = self::marks()->where('type_mark', '=', '0')->get();
        $unlike = self::marks()->where('type_mark', '=', '1')->get();
        $rating = count($likes) - count($unlike);
        $result['likes'] = count($likes);
        $result['unlikes'] = count($unlike);
        $result['rating'] = $rating;
        return $result;
    }
    public function ratings(){
        $result = array();
        $likes = self::marks()->where('type_mark', '=', '0')->get();
        $unlike = self::marks()->where('type_mark', '=', '1')->get();
        $rating = count($likes) - count($unlike);
        return $rating;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
