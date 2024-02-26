<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Opperateur;
use Illuminate\Http\Request;
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
        
        $validatedData = $request->validated();
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);
        //dd($user);
        $operateur = Opperateur::create([
            'user_id' => $user->id,
        ]);
        //dd($operateur);
        return redirect()->route('Admin')->with('success', 'Opperatuer cree avec success!');
        
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
        $operateur = Operateur::findOrFail($id);
        $operateur->delete();
    
        return redirect()->route('Admin')->with('success', 'delete opperateur');
    }
}
