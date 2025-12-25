<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of news articles.
     */
    public function index(): View
    {
        $articles = Article::published()
            ->latest('published_at')
            ->paginate(9);

        return view('public.news.index', compact('articles'));
    }

    /**
     * Display the specified news article.
     */
    public function show(Article $article): View
    {
        // Only show published articles
        if ($article->status !== 'published') {
            abort(404);
        }

        $relatedArticles = Article::published()
            ->where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.news.show', compact('article', 'relatedArticles'));
    }
}
