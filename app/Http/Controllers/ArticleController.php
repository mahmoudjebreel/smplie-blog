<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'], ['except' => 'show']);
    }
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with(['category','tags'])->orderBy('id', 'desc')->paginate(2);
        return view('backend.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags       = Tag::all();
        return view('backend.articles.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {

        $file_name = $this->saveImage($request->image,'images/article');

        $article = new Article();
        $article->title              = $request->title;
        $article->full_text          = $request->full_text;
        $article->category_id        = $request->category_id;
        $article->image              = $file_name;
        $article->save();
        $selectedTags = $request->input('tags');
        $article->tags()->sync($selectedTags);

        return redirect ()->route('articles.index')->with( 'message', 'Article added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $article = Article::find($id);
        return view('backend.articles.show',compact('category','article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article    = Article::findOrFail($id);
        $categories = Category::all();
        $tags       = Tag::all();
        $selectedTags = $article->tags->pluck('id')->toArray();

        return view('backend.articles.edit',compact('article','categories','tags','selectedTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {

        $file_name = $this->saveImage($request->image,'images/article');

        $article = Article::findOrFail($id);
        $article->title              = $request->title;
        $article->full_text          = $request->full_text;
        $article->category_id        = $request->category_id;
        $article->image              = $file_name;
        $article->save();
        $selectedTags = $request->input('tags');
        $article->tags()->sync($selectedTags);

        return redirect ()->route('articles.index')->with( 'message', 'Article Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::destroy($id);
        return redirect ()->route('articles.index')->with( 'message', 'Article Deleted successfully!');

    }
}
