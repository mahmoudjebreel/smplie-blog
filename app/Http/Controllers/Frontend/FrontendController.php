<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function showHome()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $articles = Article::with('category','tags')->paginate(2);
        return view('frontend.index',compact('categories','tags','articles'));
    }

    public function showArticleDetails($id)
    {
        $article = Article::find($id);
        $categories = Category::where('name')->get();
        return view('frontend.article', ['categories' => $categories, 'article' => $article]);
    }


}
