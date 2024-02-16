<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (Request $request) {
    $view_examples=array(
      'Infinite Scroll'=>'/posts',
        'Laravel Pagination'=>'/posts/paginated',
    );
    if(!session()->has('selected_view')) {
        session(['selected_view' => '/posts']);
    }


    return view('htmx',compact('view_examples'));
});

//infinity scroll
Route::get('/posts', function (\Illuminate\Http\Request $request) {
    sleep(1);
    session(['selected_view' => '/posts']);
    if($request->has('q')) {
        session(['q' => $request->q]);
    }
    $posts = \App\Models\Post::when(session()->has('q'), function ($query) use ($request) {
        $query->where('title', 'like', '%'.session('q').'%');
    })->paginate(6);
    return view('posts-infinite-scroll', compact('posts'));
});

//Laravel's pagination with htmx
Route::get('/posts/paginated', function (\Illuminate\Http\Request $request) {

    if($request->has('q')) {
        session(['q' => $request->q]);
    }
    session(['selected_view' => '/posts/paginated']);

    $posts = \App\Models\Post::when(session()->has('q'), function ($query) use ($request) {
        $query->where('title', 'like', '%'.session('q').'%');
    })->paginate(3);

    return view('posts-paginated', compact('posts'));
});


require __DIR__.'/auth.php';
