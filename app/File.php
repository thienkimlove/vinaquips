<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
       'path',
       'filesize',
       'extension',
       'status',
       'title',
       'desc',
       'vina_id',
       'type'
    ];
}
