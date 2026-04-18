<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;
use App\Models\Kategori;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\DB;


class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengaduan::query();

        $pengaduans = $query->paginate(10)->withQueryString();

        return view('admin.pengaduan.index', compact('pengaduans'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('siswa.pengaduan.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_laporan' => 'required|max:255',
            'kategori_id' => 'required',
            'lokasi' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path(), $namaFile);
            $fotoPath = $namaFile;
        }

        Pengaduan::create([
            'user_id' => Auth::id(),
            'kategori_id' => $request->kategori_id,
            'judul_laporan' => $request->judul_laporan,
            'lokasi' => $request->lokasi,
            'isi_laporan' => $request->isi_laporan,
            'tgl_pengaduan' => now(),
            'foto' => $fotoPath,
            'status' => 'menunggu'
        ]);

        return redirect()->route('siswa.pengaduan.create')
            ->with('success', 'Laporan berhasil dikirim');
    }

    public function edit($id)
    {
        $pengaduan = Pengaduan::with('kategori')->findOrFail($id);
        $kategori = Kategori::all();

        return view('siswa.pengaduan.edit', compact('pengaduan', 'kategori'));
    }

    public function process($id)
    {
        $pengaduan = Pengaduan::with('kategori')->findOrFail($id);
        $kategori = Kategori::all();

        return view('admin.pengaduan.edit', compact('pengaduan', 'kategori'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'judul_laporan' => 'required|max:255',
            'kategori_id' => 'required',
            'lokasi' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            if ($pengaduan->foto && file_exists(public_path($pengaduan->foto))) {
                unlink(public_path($pengaduan->foto));
            }

            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path(), $namaFile);
            $fotoPath = $namaFile;
        } else {
            $fotoPath = $pengaduan->foto;
        }

        $pengaduan->update([
            'kategori_id' => $request->kategori_id,
            'judul_laporan' => $request->judul_laporan,
            'lokasi' => $request->lokasi,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('siswa.pengaduan.histori')
            ->with('success', 'Laporan berhasil diperbarui');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        if ($pengaduan->foto && file_exists(public_path($pengaduan->foto))) {
            unlink(public_path($pengaduan->foto));
        }

        $pengaduan->delete();

        return back()->with('success', 'Laporan berhasil dihapus');
    }

    public function histori(Request $request)
    {
        $query = Pengaduan::with('kategori')
            ->where('user_id', Auth::id());

        $pengaduans = $query->latest()->paginate(10)->withQueryString();

        return view('siswa.pengaduan.histori', compact('pengaduans'));
    }

    public function feedback(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {

            Tanggapan::create([
                'pengaduan_id' => $id,
                'user_id' => Auth::id(),
                'tgl_tanggapan' => now(),
                'tanggapans' => $request->tanggapan,
                'status' => $request->status_tanggapan
            ]);

            Pengaduan::where('id', $id)->update([
                'status' => $request->status_tanggapan,
                'tgl_selesai' => $request->status_tanggapan == 'Selesai' ? now() : null
            ]);
        });

        return redirect()->route('admin.pengaduan.index')->with('success', 'Status & tanggapan berhasil diperbarui');
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::with([
            'tanggapans.user'
        ])->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('siswa.pengaduan.detail', compact('pengaduan'));
    }

    public function showAdmin($id)
    {
        $pengaduan = Pengaduan::with([
            'tanggapans.user'
        ])->findOrFail($id);

        return view('admin.pengaduan.detail', compact('pengaduan'));
    }
}