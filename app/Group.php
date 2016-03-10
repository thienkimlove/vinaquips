<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Group extends Model implements  SluggableInterface {

    use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
        'unique'          => true,
        'on_update'       => true,
    );
    protected $fillable = [
        'name',
        'slug',
        'image',
        'type',
        'desc',
        'keywords',
        'vina_id'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
