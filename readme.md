#Adding Packages
## List packages adding more to basic laravel 5.2
 - barryvdh/laravel-ide-helper : using for generate helper for IDE coding (https://github.com/barryvdh/laravel-ide-helper)
 - laracasts/flash : using for Flash message (https://github.com/laracasts/flash)
 - intervention/image && intervention/imagecache : using for Image (http://image.intervention.io/getting_started/installation#laravel)
 - cviebrock/eloquent-sluggable : using for slug URL (https://github.com/cviebrock/eloquent-sluggable)
 - laravelcollective/html : using for HTML && Form (https://laravelcollective.com/docs/5.2/html)

##Javascript Packages :
###ckeditor and kcfinder
  Using for editor and upload image in editor to `public/upload`


#install
  ```
     git clone git@github.com:thienkimlove/vtv3.git && cd vtv3 && sh install.sh
  ```
  
## Go to /admin to start  
# Usually Case.
## Sharing Data With All Views
You may need to share a piece of data with all views that are rendered by your application.

```php
  

<?php

namespace App\Providers;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('key', 'value');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
```
## ViewComposer
If you have data that you want to be bound to a view each time that view is rendered, a view composer can help you organize that logic into a single location.
[https://laravel.com/docs/5.2/views#view-composers] : https://laravel.com/docs/5.2/views#view-composers

```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        view()->composer(
            'profile', 'App\Http\ViewComposers\ProfileComposer'
        );

        // Using Closure based composers...
        view()->composer('dashboard', function ($view) {
            //
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
```
Go to ```example/composer``` for testing example.

## Upload And Browser Images.
We are using ```intervention/image``` and ```intervention/imagecache``` for working with images.
1. First we add Html block below to ```resources/views/admin/posts/form.blade.php``` :
```php
<div class="form-group">
    {!! Form::label('image', 'Image') !!}
    @if ($post->image)
        <img src="{{url('img/cache/120x129/' . $post->image)}}" />
        <hr>
    @endif
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>
```
Please note that we using ```intervention/imagecache``` for image thumb url. To do that we config in  ```config\imagecache.php``` :

```php
 //prefix in url.
 'route' => 'img/cache',
 //path which we stored images.
 'paths' => array(
        public_path('files')
    ),
 //prefix which specific image size.   
 'templates' => array(
        ...
        '120x120' => function($image) {
            return $image->fit(120, 120);
        },
    ),
```
2. Create AdminController with ```php artisan make:controller AdminController``` as below :

```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Save images
     * @param $file
     * @param null $old
     * @return string
     */
    public function saveImage($file, $old = null)
    {
        $filename = md5(time()) . '.' . $file->getClientOriginalExtension();
        Image::make($file->getRealPath())->save(public_path('files/'. $filename));

        if ($old) {
            @unlink(public_path('files/' .$old));
        }
        return $filename;
    }
}
```
3. change ```PostsController``` to extend `AdminController`
4. In `PostsController@store` , we change the code as below :

```php
public function store(PostRequest $request)
{
    $data = $request->all();
    $data['image'] =  ($request->file('image') && $request->file('image')->isValid()) ? $this->saveImage($request->file('image')) : '';
    Post::create($data);
    flash('Create post success!', 'success');
    return redirect('admin/posts');
}
```
5. In `PostsController@update`, we change as below :

```php
public function update($id, PostRequest $request)
{
    $data = $request->all();
    $post = Post::find($id);
    if ($request->file('image') && $request->file('image')->isValid()) {
        $data['image'] = $this->saveImage($request->file('image'), $post->image);
    }
    $post->update($data);
    flash('Update post success!', 'success');
    return redirect('admin/posts');
}
```
6. In `PostsController@destroy` , we change code as below :

```php
$post = Post::find($id);          
if (file_exists(public_path('files/' . $post->image))) {
    @unlink(public_path('files/' . $post->image));
}
$post->delete();
```
## Implement Post Tags
1. Create Migration `php artisan make:migration create_tags_table`
2. Edit the migration file as below :

```php
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('tags', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('slug', 32)->unique();
            $table->timestamps();
        });
        Schema::create('post_tag', function(Blueprint $tale)
        {
            $tale->integer('post_id')->unsigned()->index();
            $tale->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $tale->integer('tag_id')->unsigned()->index();
            $tale->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('post_tag');
		Schema::drop('tags');
	}

}

```
3. Run the migration and add those functions below to `App\Post` :

```php
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

    /**
     * get the list tags of current post.
     * @return mixed
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('name')->all();
    }
```
4. Run `php artisan make:model PostTag` and change as below :

```php
<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post_tag';

    /**
     * The timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

}
```
5. `php artisan make:model Tag` and change as below :

```php
    protected $fillable = ['name', 'slug'];

    /**
     * get the posts associated with tag
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post')           
           ->latest('updated_at')
           ->paginate(10);
    }
```
6. Change in `PostsController` :

```php
    public $tags;
    
    /**
     * PostsController constructor.    
     */
    public function __construct()
    {
        parent::__construct();
        $this->tags = Tag::lists('name', 'name')->all(); 
    }

    protected function syncTags($request, Post $post)
    {
        $tagIds = [];
        foreach ($request->input('tag_list') as $tag) {
            $tagIds[] = Tag::firstOrCreate(['name' => $tag])->id;
        }
        $post->tags()->sync($tagIds);
    }
    public function create()
    {
        $tags = $this->tags;
        return view('admin.post.form', compact('tags'));
    }
    
    public funtion store(PostRequest $request)
    {
      ...
      $this->syncTags($request, $post);
    }
    
    public function edit($id)
    {
        $post = Post::find($id);
        $tags = $this->tags;           
        return view('admin.post.form', compact('tags', 'post'));
    }
    public function update($id, PostRequest $request)
    {
       ...
       $this->syncTags($request, $post);
    }
       
    
```
7. in `resources/views/admin/posts/form.blade.php` add :

```php
 <div class="form-group">
    {!! Form::label('tag_list', 'Tags') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>

...

@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder : 'choose or add new tag',
            tags : true //allow to add new tag which not in list.
        });
    </script>
@endsection
```