<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PerjalananController extends Controller
{
    /**
     * Menampilkan halaman Karya perjalanan.
     */
    public function index()
    {
        // Mengembalikan view 'perjalanan.blade.php'
        return view('perjalanan');
    }
}