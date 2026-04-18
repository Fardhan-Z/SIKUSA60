<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Kategori::query();
        $kategori = $query->latest()->paginate(10);

        return view ('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|max:100',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return back()->with('succes', 'Ketagori Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|max:100',
        ]);

        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return back()->with('succes', 'Ketagori Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        $kategori->delete();
        return back()->with('succes', 'Ketagori Berhasil Dihapus');
    }
}
