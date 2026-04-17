<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        $users = $query->latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'nip_nis' => 'required|max:18|unique:users',
            'kelas' => 'nullable|max:50',
            'role' => 'required|in:admin,siswa',
            'password' => 'required|min:6',
        ]);

        User::create([
            'nama' => $request->nama,
            'nip_nis' => $request->nip_nis,
            'kelas' => $request->kelas,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'nip_nis' => 'required|max:18|unique:users,nip_nis,' . $id,
            'kelas' => 'nullable|max:50',
            'role' => 'required|in:admin,siswa',
            'password' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($id);

        $data = [
            'nama' => $request->nama,
            'nip_nis' => $request->nip_nis,
            'kelas' => $request->kelas,
            'role' => $request->role,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')
            ->with('success', 'User berhasil diupdate');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User berhasil dihapus');
    }
}