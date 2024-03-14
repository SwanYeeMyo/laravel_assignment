<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdateDataRequest;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        
        // dd($request->all());
        $imageName = time() . '.' .$request->image->getClientOriginalExtension();
        $request->image->storeAs('public/',$imageName);
        // dd($imageName);
            Article::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'context' => $request->context,
                'image' => $imageName,
                'excerpt' => $request->excerpt,

            ]);
            return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::where('id',$id)->first();
        return view('article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataRequest $request, string $id)
    {
        //
        $article = Article::find($id)->first();
        Article::where('id',$id)->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'image' => $article->image,
            'context' => $request->context,
            'excerpt' => $request->excerpt,

        ]);
        return redirect()->route('articles.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Article::where('id',$id)->delete();
        return redirect()->route('articles.index');
    }
}
