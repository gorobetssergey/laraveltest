<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Article $article)
    {
        return view('articles.index')->with([
            'articles' => $article->getAllData()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * categories given in CategoryServiceProvider
     */
    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $result = $article->createArticle($request->all());
        if($result['status'] === true){
            return redirect()->route('articles');
        }
        return response()->json($request, 404);
    }

    public function edit(Article $article)
    {
        return view('articles.edit',[
            'article' => $article,
            'selfCategories' => $article->categoryArticles->pluck('category_id')->all()
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $result = $article->updateArticle($request->all());
        if($result['status'] === true){
            return redirect()->route('articles');
        }
        return response()->json($request, 404);
    }
}
