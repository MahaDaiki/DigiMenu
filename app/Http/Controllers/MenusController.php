<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Menus;
use App\Models\Restaurants;
use BaconQrCode\Encoder\QrCode;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
   
     public function showCreateMenuForm()
     {
         return view('menus.create_menu_form');
     }
 
     /**
      * Store a newly created menu in storage.
      */
     public function createMenu(Request $request)
     {
         $validatedData = $request->validate([
             'title' => 'required|string',
         ]);
 
         $restaurant = Restaurants::where('id', auth()->user()->restaurant_id)->first();
 
         // Create a new menu
         $menu = new Menus([
             'title' => $validatedData['title'],
         ]);
 
         // Save the menu to get an ID
         $restaurant->menus()->save($menu);
 
         // Generate QR code with the menu ID
         $qrCode = QrCode::size(200)->generate(route('menus.show', ['id' => $menu->id]));
 
         // Update the menu with the QR code
         $menu->update([
             'QRCode' => $qrCode,
         ]);
 
         return view('menus.show_menu')->with(['menu' => $menu, 'qrCode' => $qrCode]);
     }
 
     /**
      * Show the form for creating a new article.
      */
     public function showCreateArticleForm($menuId)
     {
         $menu = Menus::find($menuId);
 
         return view('menus.create_article_form')->with('menu', $menu);
     }
 
     /**
      * Store a newly created article in storage.
      */
     public function createArticle(Request $request, $menuId)
     {
         $validatedData = $request->validate([
             'Title' => 'required|string',
             'Content' => 'required|string',
             'Price' => 'required|numeric',
             'Category_id' => 'required|exists:categories,id',
         ]);
 
         $menu = Menus::where('id', $menuId)
             ->where('restaurant_id', auth()->user()->restaurant_id)
             ->first();
 
         if (!$menu) {
             return view('menus.menu_not_found')->with('menuId', $menuId);
         }
 
         // Create a new article
         $article = new Articles([
             'Title' => $validatedData['Title'],
             'Content' => $validatedData['Content'],
             'Price' => $validatedData['Price'],
             'Category_id' => $validatedData['Category_id'],
         ]);
 
         $menu->articles()->save($article);
 
         return view('menus.article_created')->with('article', $article);
     }
      
    

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
