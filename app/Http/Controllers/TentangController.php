<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TentangController extends Controller
{
    /**
     * Menampilkan halaman tentang.
     */
    public function index()
    {
        // Mengembalikan view 'tentang.blade.php'
        return view('tentang');
    }
}