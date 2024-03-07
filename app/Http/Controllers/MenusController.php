<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Menus;
use App\Models\Restaurants;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    //  public function index()
    //  {
    //      return view('restaurant-menus');
    //  }
    /**
     * Show the form for creating a new resource.
     */
   
     public function display(Restaurants $restaurant) {
        $restaurant;
    
        $restaurantId = $restaurant->id;
        
        $menus = Menus::where('restaurant_id', $restaurantId)->get();
        
        $articles = [];
    foreach ($menus as $menu) {
        $articles[$menu->id] = $menu->articles()->orderBy('Category_id')->get();
    }
  
        return view('restaurant-menus', compact('restaurant', 'articles', 'menus'));
    }
    
 
     /**
      * Store a newly created menu in storage.
      */
      public function createMenu(Request $request)
      {
          $validatedData = $request->validate([
              'title' => 'required|string',
          ]);
          $restaurantId = auth()->user()->owner->restaurant_id;
          $menu = new Menus([
              'title' => $validatedData['title'],
              'restaurant_id' => $restaurantId,
          ]);
          $menu->save();
      
          $qrCode = QrCode::size(200)->generate(route('count', $menu->id));
          
          $menu->update(['QRCode' => $qrCode]);
          return redirect('owner_dashboard')->with('success', 'Menu created successfully.');
      }

      public function count($id){
        $menu = Menus::find($id);
        $menu->number_of_scans =  $menu->number_of_scans + 1 ;
        $menu->save();
         return route('owner.dashboard', ['id' => $menu->id]);

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
