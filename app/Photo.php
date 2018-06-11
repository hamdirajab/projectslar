<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $upload = '/image/';

    protected $fillable = ['file'];

    public function getFileAttribute($photo){

        return $this->upload . $photo;

    }

}
