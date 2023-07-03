<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlesController extends Controller
{
    protected String $contentPath = 'content/articles/';

    public function index()
    {
        //
    }

    public function show(Article $article)
    {
        //
    }
}
