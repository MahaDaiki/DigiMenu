<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Category;
use App\Models\Menus;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $categories = Category::all(); 
        $menu = Menus::findOrFail($id); 
        $articles = $menu->articles()->orderBy('Category_id')->get();
     return view('MenuManage',compact( 'articles','menu','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request, $menu_id)
    {
        $validatedData = $request->validate([
            'Title' => 'required|string|max:255',
            'Content' => 'required|string',
            'Price' => 'required|numeric',
            'Category_id' => 'required',
        ]);

        $validatedData['menu_id'] = $menu_id;
        

        $article = Articles::create($validatedData);

    //   dd($validatedData);
        return redirect()->back()->with('success', 'Article added successfully');
    }

    
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($articleId)
{
    $articles = Articles::findOrFail($articleId);


    return view('edit_modal', compact('articles'));
}

public function update(Request $request, $articleId)
{
    $validatedData = $request->validate([
        'Title' => 'required|string|max:255',
        'Content' => 'required|string',
        'Price' => 'required|numeric',
        'Category_id' => 'required',
    ]);

    $article = Articles::findOrFail($articleId);
    $article->update($validatedData);

    return redirect()->back()->with('success', 'Article updated successfully');
}

public function delete($articleId)
{
    $article = Articles::findOrFail($articleId);

    return view('delete_modal', compact('article'));
}

public function destroy($articleId)
{
    $article = Articles::findOrFail($articleId);
    $article->delete();

    return redirect()->back()->with('success', 'Article deleted successfully');
}
}
