<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\http\Controllers\UserController;

Route::get('/', function () {
    $posts=[];
    if (Auth::check()) {
        $posts= auth()->user()->usersCoolPosts()->latest()->get();
        //$posts = Post::where('user_id',auth()->id())->get();
    }
    return view('home',['posts'=>$posts]);
});

Route::post('/register', [UserController::class, 'register']
);

Route::post('/logout', [UserController::class, 'logout']
);

Route::post('/login', [UserController::class, 'login']
);

//Blog post related routes
Route::post('/create-post', [PostController::class, 'createPost']
);

//Blog post edit
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']
);
Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']
);

//Blog post delete
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']
);


