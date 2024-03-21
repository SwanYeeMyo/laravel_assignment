<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdateDataRequest;
use App\Models\Article;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Gate::allows('article_list')) {
            abort(401);
        }
        
        $articles = Article::paginate(3);

        return view('article.index', compact('articles'));
    }
    public function search(Request $request)
    {
        // dd($request->all());
        $articles = Article::whereBetween('created_at',[$request->start_date . '00:00:00',$request->end_date . '23:59:59'])->paginate(1);
       
        return view('article.index', compact('articles'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('article_create')) {
            abort(401);
        }
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        if (!Gate::allows('article_store')) {
            abort(401);
        }
        // dd($request->all());
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('public/', $imageName);
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
        if (!Gate::allows('article_edit')) {
            abort(401);
        }
        $article = Article::where('id', $id)->first();
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataRequest $request, string $id)
    {
        //
        if (!Gate::allows('article_update')) {
            abort(401);
        }
        $article = Article::find($id)->first();
        Article::where('id', $id)->update([
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
        if (!Gate::allows('article_destory')) {
            abort(401);
        }
        Article::where('id', $id)->delete();
        return redirect()->route('articles.index');
    }
}
