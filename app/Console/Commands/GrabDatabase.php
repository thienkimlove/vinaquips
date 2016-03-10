<?php

namespace App\Console\Commands;

use App\Category;
use App\Post;
use DB;
use Illuminate\Console\Command;
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

    protected function saveVinaImage($path)
    {
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

           $filename = md5(time()) . $extension;

           $image->save(public_path('files/' . $filename));

           return $filename;

       } catch (NotReadableException $e) {
           return "";
       }
    }

    protected function savePost($category_id, $vina_cat_id, $type = 'products')
    {
        $table = 'nv4_'.$type.'_rows';

        $posts = DB::connection('vina')
            ->select("select * from $table where listcatid = ".$vina_cat_id);

        if ($posts) {
            foreach ($posts as $post) {

                $path = public_path('public_html/uploads/'.$type.'/'. $post->homeimgfile);

                $created = Post::updateOrCreate([ 'title' => $post->vi_title ], [
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
                    'weight_unit' => $post->weight_unit
                ]);

                if (!$created->image) {
                    $created->image = $this->saveVinaImage($path);
                    $created->save();
                }
            }
        }
    }

    protected function saveCategories($category, $parent_id)
    {
        return  Category::updateOrCreate([
            'name' => $category->vi_title
        ],  [
            'name' => $category->vi_title,
            'parent_id' => $parent_id,
            'desc' => $category->vi_description,
            'image' => $category->image,
            'keywords' => $category->vi_keywords,
            'vina_id' => $category->catid
        ]);
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
            ->select("select * from $category_table where parentId = 0");

        foreach ($main_categories as $main_category) {
            $insert_main_category = $this->saveCategories($main_category, $root_parent_id);
            $this->savePost($insert_main_category->id, $main_category->catid, $type);
            $sub_categories = DB::connection('vina')
                ->select("select * from $category_table where parentId = ".$main_category->catid);

            foreach ($sub_categories as $sub_category) {
                $insert_sub_category = $this->saveCategories($sub_category, $insert_main_category->id);
                $this->savePost($insert_sub_category->id, $sub_category->catid, $type);

                $last_categories = DB::connection('vina')
                    ->select("select * from $category_table where parentId = ".$sub_category->catid);

                foreach ($last_categories as $last_category) {

                    $insert_last_category = $this->saveCategories($last_category, $insert_sub_category->id);
                    $this->savePost($insert_last_category->id, $last_category->catid, $type);
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
    }
}
