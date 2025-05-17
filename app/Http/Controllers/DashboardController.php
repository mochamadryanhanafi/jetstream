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
            return view('dashboard.user');
        }
    }

    public function admin()
    {
        $user = auth()->user();

        // Cek role manual
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized.');
        }

        return view('dashboard.admin');
    }

    public function petugas()
    {
        $user = auth()->user();

        // Cek role manual
        if ($user->role !== 'petugas') {
            abort(403, 'Unauthorized.');
        }

        return view('dashboard.petugas');
    }
}
