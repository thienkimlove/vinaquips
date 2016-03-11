<?php

namespace App\Providers;

use App\Category;
use App\Post;
use Illuminate\Support\ServiceProvider;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
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
        view()->composer('frontend.footer', function ($view) {
            $view->with('footer_list_categories', [
                'san-pham'  => 'Sản phẩm',
                'mua-hang' => 'Mua hàng',
                'phu-kien' => 'Phụ kiện',
                'gioi-thieu' => 'Giới thiệu',
                'lien-he' => 'Liên hệ'
            ]);
        });

        view()->composer('frontend.header', function ($view) {

            $header_products_categories = Category::where('parent_id',  env('PRODUCTS_CAT_ID'))->get();
            $header_shopping_categories = Category::where('parent_id',  env('SHOPPING_CAT_ID'))->get();
            $header_accessories_categories = Category::where('parent_id',  env('ACCESSORIES_CAT_ID'))->get();

            $view->with('header_products_categories', $header_products_categories);
            $view->with('header_shopping_categories', $header_shopping_categories);
            $view->with('header_accessories_categories', $header_accessories_categories);

            $posts = [];

            $temp = Post::image()->whereHas('category', function($q){
                $q->where('parent_id', env('PRODUCTS_CAT_ID'));
            })->limit(1)->get();

            if ($temp->count() > 0) {
                $posts['products'] = $temp->first();
            } else {
                $posts['products'] = null;
            }

            $temp = Post::image()->whereHas('category', function($q){
                $q->where('parent_id', env('SHOPPING_CAT_ID'));
            })->limit(1)->get();

            if ($temp->count() > 0) {
                $posts['shopping'] = $temp->first();
            } else {
                $posts['shopping'] = null;
            }

            $temp = Post::image()->whereHas('category', function($q){
                $q->where('parent_id', env('ACCESSORIES_CAT_ID'));
            })->limit(1)->get();

            if ($temp->count() > 0) {
                $posts['accessories'] = $temp->first();
            } else {
                $posts['accessories'] = null;
            }
            $view->with('header_products', $posts);
        });

        view()->composer('example.composer', function ($view) {
            $view->with('latestPosts',  Post::latest()->limit(6)->get());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
