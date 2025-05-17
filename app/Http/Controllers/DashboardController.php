<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Redirect ke dashboard sesuai role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.dashboard');
        } else {
            // Jika bukan admin/petugas, tampilkan dashboard user biasa
            return view('dashboard.user');
        }
    }

    public function admin()
{
    $user = auth()->user();

    if ($user->role !== 'admin') {
        abort(403, 'Unauthorized.');
    }

    // Data dummy atau bisa diganti query dari database
    $totalDraft = 5;
    $totalApproved = 12;
    $totalSent = 20;
    $totalProjectNew = 3;
    $totalProjectRunning = 8;
    $totalProjectDone = 15;

    return view('dashboard.admin', compact(
        'totalDraft',
        'totalApproved',
        'totalSent',
        'totalProjectNew',
        'totalProjectRunning',
        'totalProjectDone'
    ));
}

    public function petugas()
    {
        $user = auth()->user();

        if ($user->role !== 'petugas') {
            abort(403, 'Unauthorized.');
        }

// Data dummy atau bisa diganti query dari database
    $totalDraft = 5;
    $totalApproved = 12;
    $totalSent = 20;
    $totalProjectNew = 3;
    $totalProjectRunning = 8;
    $totalProjectDone = 15;

    return view('dashboard.petugas', compact(
        'totalDraft',
        'totalApproved',
        'totalSent',
        'totalProjectNew',
        'totalProjectRunning',
        'totalProjectDone'
    ));
    }

}
