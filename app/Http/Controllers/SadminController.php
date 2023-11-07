<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Kolektor;
use App\Models\User;
use Illuminate\Support\Facades\File;

class SadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('created_at', 'DESC')->get();
        
        return view('sadmin.index', compact('user'));
    }

    public function create()
    {
        return view('sadmin.create');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $data = User::where('name', 'like', "%" . $keyword . "%")->get();
        return view('sadmin.index', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ],
        [
            'name.required' => 'Nama Wajib Disisi ',
            'email.required' => 'Email Wajib Disisi ',
            'role.required' => 'Role Wajib Disisi ',
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,            
        ]);
 
        return redirect()->route('sadmin')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show(string $id)
    {
        // Cari kolektor berdasarkan nama
        $user = User::where('id', $id)->firstOrFail();
    
        return view('sadmin.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'User';
        $user = User::findOrFail($id);
        
        return view('sadmin.edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $user = User::find($id);
        //update role
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        

        return redirect()->route('sadmin')->with('success', 'Data Berhasil Dirubah');
        
    }


    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        
        $user->delete();
  
        return redirect()->route('sadmin')->with('success', 'Data Berhasil Dihapus');
    }

    public function dashboardkl()
{
    return view('kolektor.dashboardkl');
}
}
