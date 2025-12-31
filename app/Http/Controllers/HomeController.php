<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Gallery;
use App\Models\Youtube;
use App\Models\HomeSlider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($locale)
    {
        $column = $locale === 'en' ? 'slug_en' : 'slug_id';
        $slug = $locale === 'en' ? 'home' : 'beranda';

        // $sliders = HomeSlider::all();
        $galleries = Gallery::where('status', 'published')->get();
        // $news = News::where('status', 'published')->get();
        // $youtubes = Youtube::where('is_showable', true)->get(); 

        return view('welcome');
    }
}
