<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Aduan;
use App\Models\M_Kategori;
use App\Models\M_Siswa;
use Illuminate\Support\Str;


class AduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.siswa.aduan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = M_Kategori::all();
        return view('pages.siswa.aduan.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'NIS' => 'nullable|numeric',
            'kelas' => 'required',
            'id_kategori' => 'required|exists:kategori,id',
            'subjek' => 'required',
            'pesan' => 'required',
            'lampiran' => 'nullable|file|max:2048',
        ]);

        // simpan / ambil siswa
        $siswa = M_Siswa::firstOrCreate(
            ['NIS' => $request->NIS],
            [
                'nama'  => $request->nama,
                'kelas' => $request->kelas
            ]
        );

        // upload lampiran
        $file = null;
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran')->store('lampiran', 'public');
        }

        // generate nomor tiket
        $nomorTiket = 'ADUAN' . now()->format('Ymd') . rand(1000, 9999);

        // simpan aduan
        $aduan = M_Aduan::create([
            'nomor_aduan' => $nomorTiket,
            'id_kategori' => $request->id_kategori,
            'id_siswa'    => $siswa->id,
            'subjek'      => $request->subjek,
            'pesan'       => $request->pesan,
            'lampiran'    => $file,
            'status'      => 'menunggu'
        ]);

        // redirect ke halaman sukses
        return redirect()->route('aduan.sukses', $aduan->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request) {}

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

    public function sukses($id)
    {
        $aduan = M_Aduan::findOrFail($id);
        return view('pages.siswa.aduan.info', compact('aduan'));
    }

    public function lacak(Request $request)
    {
        $request->validate([
            'nomor_aduan' => 'required'
        ]);

        $aduan = M_Aduan::with(['kategori', 'siswa', 'umpanBalik.user'])
            ->where('nomor_aduan', $request->nomor_aduan)
            ->first();

        if (!$aduan) {
            return back()->with('error', 'Nomor tiket aduan tidak ditemukan');
        }

        // SATU HALAMAN DETAIL
        return view('pages.siswa.aduan.detail', compact('aduan'));
    }
}
