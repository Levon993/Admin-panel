<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
Use App\Article;

class BlogController extends Controller
{
    public function category($slug){
        $category = Category::where('slug', $slug)->firstOrFail();

        return view('blog.category', [
            'category' => $category,
            'articles' => $category->articles()->where('published', 1)->paginate(12)
        ]);
    }

    public function article($slug){


    }
}
