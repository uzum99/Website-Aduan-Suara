<?php

namespace App\Http\Controllers;

use App\Models\M_Aduan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $totalAduan = M_Aduan::count();
        $aduanSelesai = M_Aduan::where('status', 'selesai')->count();
        $aduanDiproses = M_Aduan::where('status', 'diproses')->count();
        $aduanMenunggu = M_Aduan::where('status', 'menunggu')->count();

        return view('pages.admin.dashboard', compact(
            'totalAduan',
            'aduanSelesai',
            'aduanDiproses',
            'aduanMenunggu'
        ));
    }
}
