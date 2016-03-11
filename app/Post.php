<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
        'unique'          => true,
        'on_update'       => true,
    );
    protected $fillable = [
        'title',
        'category_id',
        'slug',
        'desc',
        'content',
        'image',
        'status',
        'user_id',
        'vina_id',
        'code',
        'price',
        'number',
        'currency',
        'unit',
        'weight',
        'views',
        'weight_unit',
        'vina_cat_id',
        'address',
        'type',
        'file',
        'image_1',
        'image_2',
        'image_3',
        'video',
        'video_desc'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * post belong to one category.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * like tags.
     * @param $query
     * @param $tag
     * @return mixed
     */
    public function scopeTagged($query, $tag)
    {
        if (strlen($tag) > 2) {
            $query->where('title', 'LIKE', '%'.$tag.'%');
        }
    }

    /**
     * get the tags that associated with given post
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }


    /**
     * get the list tags of current post.
     * @return mixed
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('name')->all();
    }

    public function getTitleShowAttribute()
    {
        return html_entity_decode($this->title);
    }

    public function getGroupListAttribute()
    {
        return $this->groups->lists('name')->all();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
