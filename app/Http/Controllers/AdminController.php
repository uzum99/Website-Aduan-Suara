<?php

namespace App\Http\Controllers;

use App\Models\M_Aduan;
use App\Models\M_Kategori;
use App\Models\M_Siswa;
use App\Models\M_UmpanBalik;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // ===============================
    // HALAMAN INDEX (LIST ADUAN)
    // ===============================
    public function index(Request $request)
{
    $aduan = M_Aduan::with(['kategori', 'siswa'])
        ->when($request->tanggal, function ($q) use ($request) {
            $q->whereDate('created_at', $request->tanggal);
        })
        ->when($request->bulan, function ($q) use ($request) {
            $q->whereMonth('created_at', $request->bulan)
              ->whereYear('created_at', date('Y'));
        })
        ->when($request->siswa, function ($q) use ($request) {
            $q->where('id_siswa', $request->siswa);
        })
        ->when($request->kategori, function ($q) use ($request) {
            $q->where('id_kategori', $request->kategori);
        })
        ->latest()
        ->get();

    $kategori = M_Kategori::all();
    $siswa    = M_Siswa::all();

    return view('pages.admin.aduan.index', compact('aduan', 'kategori', 'siswa'));
}

    
    public function show($id)
    {
        $aduan = M_Aduan::with([
            'kategori',
            'siswa',
            'umpanBalik.user'
        ])->findOrFail($id);

        return view('pages.admin.aduan.detail', compact('aduan'));
    }

    // ===============================
    // UPDATE STATUS ADUAN
    // ===============================
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,proses,selesai'
        ]);

        $aduan = M_Aduan::findOrFail($id);
        $aduan->status = $request->status;
        $aduan->save();

        return back()->with('success', 'Status aduan berhasil diperbarui');
    }

    // ===============================
    // SIMPAN FEEDBACK ADMIN
    // ===============================
    public function storeFeedback(Request $request, $id)
    {
        $request->validate([
            'feedback' => 'required'
        ]);

        M_UmpanBalik::create([
            'id_aduan' => $id,
            'id_user'  => auth()->id(), // admin login
            'feedback' => $request->feedback,
        ]);

        return back()->with('success', 'Feedback berhasil dikirim');
    }
}
