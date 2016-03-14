<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

    $page = 'index';

    $hotProducts = \App\Post::image()->latest()->limit(12)->get();
    $newProducts = \App\Post::image()->latest()->limit(3)->get();

    return view('frontend.index', compact('hotProducts', 'newProducts', 'page'))->with([
        'meta_title' => 'Vinaquips | Trang chủ',
        'meta_desc' => 'Cung cấp, lắp đặt, sửa chữa và bảo trì thiết bị khoa học kỹ thuật',
        'meta_keywords' => 'cân, máy ph, khuấy từ, bếp đun, cất quay, chân không, sắc ký, nghiền mẫu, sắc ký lỏng, hóa, thí nghiệm, y tế, máy khuấy từ, lắc, tủ ấm memmert, sấy, ấm lạnh, âm sâu, lưu mẫu, chân không, co2, so màu, sắc ký, khí, lỏng, khuấy, gia nhiệt, sinh học,  sinh hoá, hấp thụ, quang phổ, ftir, kính hiển vi, cô quay, đồng hoá, xử lý mẫu'
    ]);

});


Route::get('example/composer', function(){
    return view('example.composer');
});

Route::get('example/paginator', function(){
    $posts = \App\Post::paginate(1);
    //$posts->setPath('custom/url');
    return view('example.paginator', compact('posts'));
});


Route::get('restricted', function(){
    return view('errors.restricted');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/admin', 'HomeController@index');
    Route::resource('admin/posts', 'PostsController');
    Route::resource('admin/categories', 'CategoriesController');
    Route::resource('admin/settings', 'SettingsController');
});

Route::get('tag/{value}', function($value) {
    $page = 'tag';

    $tag = \App\Tag::where('slug', $value)->first();

    $posts = $tag->posts()->image()->paginate(9);

    $tag->desc = ($tag->desc) ? $tag->desc : 'Thông tin theo từ khóa '.$tag->name. ' của sản phẩm';

    $category = $tag;

    $tag->keywords = 'cân, máy ph, khuấy từ, bếp đun, cất quay, chân không, sắc ký, nghiền mẫu, sắc ký lỏng, hóa, thí nghiệm, y tế, máy khuấy từ, lắc, tủ ấm memmert, sấy, ấm lạnh, âm sâu, lưu mẫu, chân không, co2, so màu, sắc ký, khí, lỏng, khuấy, gia nhiệt, sinh học,  sinh hoá, hấp thụ, quang phổ, ftir, kính hiển vi, cô quay, đồng hoá, xử lý mẫu';

    return view('frontend.tag', compact(
        'category', 'page', 'posts'
    ))->with([
        'meta_title' => $tag->name,
        'meta_desc' => $tag->desc,
        'meta_keywords' => $tag->keywords
    ]);
});

Route::get('{value}', function ($value, Illuminate\Http\Request $request) {

    if (preg_match('/([a-z0-9\-]+)\.html/', $value, $matches)) {

        $page = 'detail';

        $post = \App\Post::where('slug', $matches[1])->first();

        $relatedPosts = \App\Post::image()->where('category_id', $post->category_id)
            ->where('id', '<>', $post->id)
            ->limit(4)
            ->get();

        $recentIds = json_decode( $request->cookie('recent') );

        if (!$recentIds) {
            $recentIds = [];
        }
        array_push($recentIds, $post->id);
        if (count($recentIds) > 4) {
            array_pop($recentIds);
        }

        $viewedProducts = \App\Post::image()->latest()
            ->whereIn('id', $recentIds)
            ->where('id', '<>', $post->id)
            ->limit(4)
            ->get();

        $response = new \Illuminate\Http\Response(view('frontend.detail', compact('post', 'page', 'viewedProducts', 'relatedPosts'))->with([
            'meta_title' => str_limit($post->title, 50),
            'meta_desc' => str_limit($post->desc, 150),
            'meta_keywords' => implode(',', $post->tag_list)
        ])->with([
            'meta_title' => str_limit($post->title, 50),
            'meta_desc' => str_limit($post->desc, 150),
            'meta_keywords' => implode(',', $post->tag_list)
        ]));

        $response->withCookie(cookie('recent', json_encode($recentIds), 60));

        return $response;

    } else if (in_array($value, ['lien-he', 'gioi-thieu'])) {
        $page = $value;

        $list =  [
            'san-pham'  => 'Sản phẩm',
            'mua-hang' => 'Mua hàng',
            'phu-kien' => 'Phụ kiện',
            'gioi-thieu' => 'Giới thiệu',
            'lien-he' => 'Liên hệ'
        ];

        return view('frontend.'.$value, compact('page'))->with([
            'meta_title' => 'Vinaquips | '.$list[$value],
            'meta_desc' => 'Cung cấp, lắp đặt, sửa chữa và bảo trì thiết bị khoa học kỹ thuật, '.$list[$value],
            'meta_keywords' => 'cân, máy ph, khuấy từ, bếp đun, cất quay, chân không, sắc ký, nghiền mẫu, sắc ký lỏng, hóa, thí nghiệm, y tế, máy khuấy từ, lắc, tủ ấm memmert, sấy, ấm lạnh, âm sâu, lưu mẫu, chân không, co2, so màu, sắc ký, khí, lỏng, khuấy, gia nhiệt, sinh học,  sinh hoá, hấp thụ, quang phổ, ftir, kính hiển vi, cô quay, đồng hoá, xử lý mẫu, '.$list[$value]
        ]);
    } else {
        $page = 'category';

        $category = \App\Category::where('slug', $value)->first();

        return view('frontend.category', compact(
            'category', 'page'
        ))->with([
            'meta_title' => $category->name,
            'meta_desc' => $category->desc,
            'meta_keywords' => $category->keywords
        ]);
    }
});
