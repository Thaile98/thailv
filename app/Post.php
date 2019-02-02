<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $timestamp = true;

    protected $fillable = [
        'title', 'body',
    ];
}
