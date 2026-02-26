<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class KaryaController extends Controller
{
    /**
     * Menampilkan halaman Karya & Portofolio.
     */
    public function index()
    {
        // Mengembalikan view 'karya.blade.php'
        return view('karya');
    }
}