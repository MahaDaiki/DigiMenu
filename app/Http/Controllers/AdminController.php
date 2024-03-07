<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Owner;
use App\Models\Sub_Admin;
use App\Models\Opperateur;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\OperateurRequest;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(5); 
        //dd($users);
        return view('admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.AddOperator');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OperateurRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        
        //$userID = $user->id;
        

       // $operateur = Opperateur::create([
            //'user_id' => $userID,
            //'restaurant_id' => $restaurantId
        //]);
        
            $user->assignRole('opperateur');
        return redirect()->route('Admin')->with('success', 'Operateur créé avec succès!');
    }
    



    public function createSubadmin()
    {
        return view('admin.Addsub_admin');
    }

    public function AddSubAdmin(OperateurRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
            $test = $user->assignRole('sub_admin');
            //dd($user);
        return redirect()->route('Admin')->with('success', 'Sub Admin créé avec succès!');
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
        $DeletUser = User::findOrFail($id);
        //dd(  $DeletUser->delete());
        $DeletUser->delete();
    
        return redirect()->route('Admin')->with('success', 'delete opperateur');
    }
}
