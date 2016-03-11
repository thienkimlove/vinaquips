<?php

namespace App\Console\Commands;

use App\Category;
use App\Group;
use App\Post;
use App\Review;
use App\Tag;
use DB;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Intervention\Image\Exception\NotReadableException;
use Intervention\Image\Facades\Image;

class GrabDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vina:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function saveVinaImage($path, $id = null)
    {
       if (!file_exists($path)) {
           return '';
       }
       try {
           $image = Image::make($path);
           $mime = $image->mime();  //edited due to updated to 2.x
           if ($mime == 'image/jpeg')
               $extension = '.jpg';
           elseif ($mime == 'image/png')
               $extension = '.png';
           elseif ($mime == 'image/gif')
               $extension = '.gif';
           else
               $extension = '.jpg';

           $random = ($id)?  $id.'_'.md5(time()) : md5(time());
           $filename = $random . $extension;

           $image->save(public_path('files/' . $filename));

           return $filename;

       } catch (NotReadableException $e) {
           return "";
       }
    }

    protected function savePost($category_id, $vina_cat_id, $type = 'products')
    {
        $table = 'nv4_'.$type.'_rows';

        $review_table = 'nv4_'.$type.'_review';

        $posts = DB::connection('vina')
            ->select("select * from $table where listcatid = ".$vina_cat_id);

        if ($posts) {
            foreach ($posts as $post) {

                $path = ($post->homeimgfile) ? public_path('public_html/uploads/'.$type.'/'. $post->homeimgfile) : '';

                $created = Post::updateOrCreate([ 'vina_id' => $post->id, 'type' => $type ], [
                    'vina_id' => $post->id,
                    'title' => $post->vi_title,
                    'category_id' => $category_id,
                    'vina_cat_id' => $vina_cat_id,
                    'desc' => $post->vi_hometext,
                    'content' => $post->vi_bodytext,
                    'user_id' => 1,
                    'status' => true,
                    'code' => $post->product_code,
                    'price' => $post->product_price,
                    'number' => $post->product_number,
                    'currency' => $post->money_unit,
                    'unit' => $post->product_unit,
                    'weight' => $post->product_weight,
                    'views' => $post->hitstotal,
                    'weight_unit' => $post->weight_unit,
                    'type' => $type,
                    'address' => $post->vi_address
                ]);

                if (!$created->image && $path) {
                    $created->update([
                        'image' => $this->saveVinaImage($path, $created->id. '_'. $post->id)
                    ]);
                }

                //get reviews.
                $vinaReviews = DB::connection('vina')->select("select * from $review_table where product_id = ".$post->id);

                foreach ($vinaReviews as $review) {
                  Review::updateOrCreate([
                      'vina_id' => $review->review_id,
                      'type' => $type
                  ], [
                      'vina_id' => $review->review_id,
                      'post_id' => $created->id,
                      'type' => $type,
                      'content' => $review->content,
                      'rating' => $review->rating,
                      'sender' => $review->sender,
                      'status' => $review->status
                  ]);
                }
            }
        }
    }

    protected function saveCategories($category, $parent_id, $type)
    {
        $path = ($category->image)? public_path('public_html/uploads/'.$type.'/'. $category->image) : '';

        $created =  Category::updateOrCreate([
            'vina_id' => $category->catid,
            'type' => $type
        ],  [
            'name' => $category->vi_title,
            'parent_id' => $parent_id,
            'desc' => $category->vi_description,
            'keywords' => $category->vi_keywords,
            'vina_id' => $category->catid,
            'sub_category_ids' => $category->subcatid,
            'type' => $type
        ]);

        if (!$created->image && $path) {
            $created->image = $this->saveVinaImage($path, $created->id.'_'.$category->catid);
            $created->save();
        }

        return $created;
    }

    protected function syncVina($type)
    {
        $category_table = 'nv4_'.$type.'_catalogs';
        if ($type == 'products') {
            $root_parent_id = env('PRODUCTS_CAT_ID');
        } else if ($type == 'shopping') {
            $root_parent_id = env('SHOPPING_CAT_ID');
        } else {
            $root_parent_id = env('ACCESSORIES_CAT_ID');
        }
        $main_categories = DB::connection('vina')
            ->select("select * from $category_table where parentid = 0");

        foreach ($main_categories as $main_category) {
            $insert_main_category = $this->saveCategories($main_category, $root_parent_id, $type);
            $this->savePost($insert_main_category->id, $main_category->catid, $type);
            $sub_categories = DB::connection('vina')
                ->select("select * from $category_table where parentid = ".$main_category->catid);

            foreach ($sub_categories as $sub_category) {
                $insert_sub_category = $this->saveCategories($sub_category, $insert_main_category->id, $type);
                $this->savePost($insert_sub_category->id, $sub_category->catid, $type);

                $last_categories = DB::connection('vina')
                    ->select("select * from $category_table where parentid = ".$sub_category->catid);

                foreach ($last_categories as $last_category) {

                    $insert_last_category = $this->saveCategories($last_category, $insert_sub_category->id, $type);
                    $this->savePost($insert_last_category->id, $last_category->catid, $type);
                }
            }
        }
    }

    protected function saveGroups()
    {
        foreach (['products', 'shopping', 'accessories'] as $type) {
            $table = 'nv4_'.$type.'_group';
            $group_post_table = 'nv4_'.$type.'_group_items';
            $groups = DB::connection('vina')->select("select * from $table where parentid > 0");
            foreach ($groups as $group) {

               $path = ($group->image)? public_path('public_html/uploads/'.$type.'/'. $group->image) : '';

               $created = Group::updateOrCreate([
                    'vina_id' => $group->groupid,
                    'type' => $type
                ], [
                    'name' => $group->vi_title,
                    'desc' => $group->vi_description,
                    'keywords' => $group->vi_keywords,
                    'type' => $type,
                    'vina_id' => $group->groupid
                ]);

                if (!$created->image && $path) {
                    $created->image = $this->saveVinaImage($path, $created->id.'_'. $group->groupid);
                    $created->save();
                }

                //sync with posts

                $groupPosts = DB::connection('vina')
                    ->select("select * from $group_post_table where group_id = ".$group->groupid);
                foreach ($groupPosts as $groupPost) {
                   $post = Post::where('vina_id', $groupPost->pro_id)->where('type', $type)->get();
                   if ($post->count() > 0) {
                       $post->first()->groups()->detach($created->id);
                       $post->first()->groups()->attach($created->id);
                   }
                }
            }
        }
    }

    protected function saveTags()
    {
        foreach (['products', 'shopping', 'accessories'] as $type) {
            $table = 'nv4_'.$type.'_tags_vi';
            $tag_post_table = 'nv4_'.$type.'_tags_id_vi';
            $tags = DB::connection('vina')->select("select * from $table");
            foreach ($tags as $tag) {

                try {
                    $created = Tag::updateOrCreate([
                        'type' => $type,
                        'vina_id' => $tag->tid
                    ], [
                        'name' => $tag->keywords,
                        'type' => $type,
                        'vina_id' => $tag->tid,
                        'desc' => $tag->description
                    ]);

                    //sync with posts

                    $tagPosts = DB::connection('vina')
                        ->select("select * from $tag_post_table where tid = ".$tag->tid);
                    foreach ($tagPosts as $tagPost) {
                        $post = Post::where('vina_id', $tagPost->id)->where('type', $type)->get();
                        if ($post->count() > 0) {
                            $post->first()->tags()->detach($created->id);
                            $post->first()->tags()->attach($created->id);
                        }
                    }
                } catch (QueryException $e) {
                    \Log::info($e->getMessage());
                }

            }
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $this->syncVina('products');
       $this->syncVina('shopping');
       $this->syncVina('accessories');
       // $this->saveGroups();
       // $this->saveTags();
    }
}
