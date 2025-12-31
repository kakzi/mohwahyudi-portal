<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio - Moh Wahyudi</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Language Dropdown Active State */
        .lang-option-active {
            @apply bg-teal-50 text-teal-700 font-bold;
        }

        /* Smooth Reveal Animation */
        .reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.7s ease-out;
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Dropdown Animation */
        #lang-dropdown-menu {
            transition: opacity 0.2s ease, transform 0.2s ease;
        }
    </style>
    <!-- Icons Library (Lucide) -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-white text-slate-900 font-['Plus_Jakarta_Sans']">

    <!-- NAVBAR -->
    <nav class="fixed w-full z-50 top-0 bg-white/80 backdrop-blur-xl border-b border-slate-100 transition-all duration-300 h-20 flex items-center" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="flex items-center justify-between">
                <div class="shrink-0 cursor-pointer group flex items-center gap-2">
                    {{-- <div class="w-8 h-8 bg-teal-600 rounded-lg flex items-center justify-center text-white transition-transform group-hover:rotate-12">
                        <i data-lucide="shield-check" class="w-5 h-5"></i>
                    </div> --}}
                    <span class="text-2xl font-black text-slate-700 tracking-tighter">
                        Yahqi<span class="text-amber-500">Publisher</span>
                    </span>
                </div>

                <!-- Desktop Menu (Icons Removed) -->
                <div class="hidden md:flex items-center space-x-6">
                    <div class="flex items-baseline space-x-1">
                        <a href="#home" class="px-4 py-2 rounded-full text-sm font-bold text-slate-600 hover:text-teal-600 transition-all">
                            <span data-t-id="Beranda" data-t-en="Home">Beranda</span>
                        </a>
                        <a href="#tentang" class="px-4 py-2 rounded-full text-sm font-bold text-slate-600 hover:text-teal-600 transition-all">
                            <span data-t-id="Tentang" data-t-en="About">Tentang</span>
                        </a>
                        <a href="#perjalanan" class="px-4 py-2 rounded-full text-sm font-bold text-slate-600 hover:text-teal-600 transition-all">
                            <span data-t-id="Perjalanan" data-t-en="Journey">Perjalanan</span>
                        </a>
                        <a href="#karya" class="px-4 py-2 rounded-full text-sm font-bold text-slate-600 hover:text-teal-600 transition-all">
                            <span data-t-id="Karya" data-t-en="Works">Karya</span>
                        </a>
                    </div>

                    

                    <a href="#kontak" class="bg-teal-600 hover:bg-slate-800 text-white px-6 py-2.5 rounded-full text-sm font-bold transition-all transform hover:scale-105 shadow-lg shadow-teal-200/50" data-t-id="Hubungi Saya" data-t-en="Contact Me">Hubungi Saya</a>

                    <!-- Language Dropdown -->
                    <div class="relative inline-block text-left">
                        <button id="lang-dropdown-btn" class="flex items-center gap-2 bg-slate-100 border border-slate-200 px-4 py-2 rounded-full text-xs font-black uppercase transition-all hover:bg-slate-200">
                            {{-- <i data-lucide="languages" class="w-4 h-4 text-slate-500"></i> --}}
                            <span id="current-lang-flag" class="text-lg">🇮🇩</span>
                            <span id="current-lang-label">ID</span>
                            <i data-lucide="chevron-down" class="w-3 h-3 text-slate-400"></i>
                        </button>
                        
                        <div id="lang-dropdown-menu" class="hidden absolute right-0 mt-2 w-44 bg-white border border-slate-100 rounded-2xl shadow-2xl p-2 z-60 origin-top-right transform scale-95 opacity-0">
                            <button onclick="changeLang('id')" class="lang-option w-full text-left px-4 py-3 rounded-xl text-xs font-bold transition-all hover:bg-slate-50 flex items-center justify-between" id="opt-id">
                                <span class="flex items-center gap-3">
                                    <span class="text-lg">🇮🇩</span>
                                    <span>Bahasa (ID)</span>
                                </span>
                                <i data-lucide="check" class="w-3 h-3 text-teal-600 hidden"></i>
                            </button>
                            <button onclick="changeLang('en')" class="lang-option w-full text-left px-4 py-3 rounded-xl text-xs font-bold transition-all hover:bg-slate-50 flex items-center justify-between" id="opt-en">
                                <span class="flex items-center gap-3">
                                    <span class="text-lg">🇺🇸</span>
                                    <span>English (EN)</span>
                                </span>
                                <i data-lucide="check" class="w-3 h-3 text-teal-600 hidden"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Mobile Toggle -->
                <div class="-mr-2 flex md:hidden items-center gap-4">
                    <button type="button" id="mobile-menu-btn" class="inline-flex items-center justify-center p-3 rounded-xl text-slate-500 hover:text-teal-600 hover:bg-slate-50 focus:outline-none transition-all">
                        <i data-lucide="menu" class="w-7 h-7" id="menu-icon"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu Panel (Icons Enabled Here Only) -->
        <div class="hidden fixed top-20 left-0 w-full bg-white border-t border-slate-100 shadow-2xl z-40 md:hidden" id="mobile-menu">
            <div class="px-6 pt-6 pb-10 space-y-4 max-h-[calc(100vh-5rem)] overflow-y-auto">
                <a href="#home" class="mobile-nav-link flex items-center gap-4 text-xl font-bold text-slate-700 p-3 rounded-2xl hover:bg-slate-50 transition-all">
                    <i data-lucide="home" class="w-6 h-6 text-teal-600"></i>
                    <span data-t-id="Beranda" data-t-en="Home">Beranda</span>
                </a>
                <a href="#tentang" class="mobile-nav-link flex items-center gap-4 text-xl font-bold text-slate-700 p-3 rounded-2xl hover:bg-slate-50 transition-all">
                    <i data-lucide="user" class="w-6 h-6 text-teal-600"></i>
                    <span data-t-id="Tentang" data-t-en="About">Tentang</span>
                </a>
                <a href="#perjalanan" class="mobile-nav-link flex items-center gap-4 text-xl font-bold text-slate-700 p-3 rounded-2xl hover:bg-slate-50 transition-all">
                    <i data-lucide="milestone" class="w-6 h-6 text-teal-600"></i>
                    <span data-t-id="Perjalanan" data-t-en="Journey">Perjalanan</span>
                </a>
                <a href="#karya" class="mobile-nav-link flex items-center gap-4 text-xl font-bold text-slate-700 p-3 rounded-2xl hover:bg-slate-50 transition-all">
                    <i data-lucide="layout-grid" class="w-6 h-6 text-teal-600"></i>
                    <span data-t-id="Karya" data-t-en="Works">Karya</span>
                </a>
                
                <!-- Mobile Language Selector -->
                <div class="py-4 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-sm font-bold text-slate-500 uppercase tracking-widest">Language</span>
                    <div class="flex bg-slate-100 p-1 rounded-xl border border-slate-200 scale-90">
                        <button onclick="changeLang('id')" id="m-lang-id" class="px-5 py-2 rounded-lg text-xs font-black uppercase transition-all flex items-center gap-2">
                            <span>🇮🇩</span> ID
                        </button>
                        <button onclick="changeLang('en')" id="m-lang-en" class="px-5 py-2 rounded-lg text-xs font-black uppercase transition-all flex items-center gap-2">
                            <span>🇺🇸</span> EN
                        </button>
                    </div>
                </div>

                <a href="#kontak" class="mobile-nav-link flex items-center justify-center gap-3 bg-teal-600 text-white px-6 py-5 rounded-2xl font-bold shadow-lg shadow-teal-200 active:scale-95 transition-all">
                    <i data-lucide="send" class="w-5 h-5"></i>
                    <span data-t-id="Hubungi Saya" data-t-en="Contact Me">Hubungi Saya</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section id="home" class="min-h-screen flex items-center pt-28 pb-12 relative overflow-hidden">
        <!-- Background Ornaments -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-50 rounded-full blur-[100px] -z-10 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-amber-50 rounded-full blur-[100px] -z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20 items-center">
                <!-- Text Content -->
                <div class="order-2 md:order-1 transition-all duration-700 transform">
                    <div class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-50 border border-emerald-100 text-emerald-700 text-xs font-bold uppercase tracking-wider mb-6">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 mr-2 animate-ping"></span>
                        Professional Portfolio
                    </div>
                    
                   <h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 mb-6 leading-[1.1]">
                        Moh
                        <span class="text-transparent bg-clip-text bg-linear-to-r from-teal-700 to-teal-500">
                            Wahyudi
                        </span>
                    </h1>
                    
                    <h2 class="text-xl md:text-2xl font-semibold text-slate-600 mb-6 leading-relaxed">
                        Founder Yahqi & CEO Holding Koperasi BMT NU Ngasem Group
                    </h2>

                    <p class="text-slate-500 text-lg mb-8 leading-relaxed max-w-lg border-l-4 border-amber-400 pl-6">
                        "Membangun dari niat, tumbuh bersama karya."<br>
                        Mengubah kepedulian menjadi gerakan nyata untuk memberdayakan ekonomi umat dan mendidik generasi masa depan.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#karya" class="group bg-slate-800 hover:bg-slate-900 text-white px-8 py-4 rounded-full font-bold transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center flex items-center justify-center">
                            Lihat Karya
                            <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="#tentang" class="group border-2 border-slate-200 hover:border-teal-500 text-slate-600 hover:text-teal-700 px-8 py-4 rounded-full font-bold transition-all text-center">
                            Tentang Saya
                        </a>
                    </div>
                </div>

                <!-- Image Section -->
                <div class="order-1 md:order-2 flex justify-center relative">
                    <div class="relative w-full max-w-md aspect-4/5">
                        <!-- Decorative Frame -->
                        <div class="absolute -inset-4 border-2 border-emerald-100 rounded-4xl transform rotate-3"></div>
                        <div class="absolute -inset-4 border-2 border-amber-100 rounded-4xl transform -rotate-3"></div>
                        
                        <!-- Main Image Container -->
                        <div class="absolute inset-0 bg-slate-100 rounded-3xl overflow-hidden shadow-2xl">
                            <img src="{{ asset('storage/images/profile.jpg') }}" alt="Moh Wahyudi" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700">
                        </div>

                        <!-- Floating Badge -->
                        <div class="absolute bottom-8 right-8 bg-white/95 backdrop-blur-md border border-slate-100 p-4 rounded-2xl shadow-2xl animate-bounce" style="animation-duration: 4s;">
                            <div class="flex items-center gap-3">
                                <div class="bg-amber-100 p-2 rounded-xl text-amber-600">
                                    <i data-lucide="award" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-500 font-bold uppercase">Pengalaman</p>
                                    <p class="text-lg font-extrabold text-slate-800">10+ Tahun</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TENTANG SAYA SECTION -->
    <section id="tentang" class="py-24 bg-slate-50 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Left: Stats -->
                <div class="lg:col-span-4 space-y-4">
                    <div class="bg-white border border-slate-100 p-8 rounded-3xl shadow-sm hover:shadow-md transition-shadow group">
                        <i data-lucide="users" class="w-10 h-10 text-emerald-600 mb-4 group-hover:scale-110 transition-transform"></i>
                        <h3 class="text-4xl font-extrabold text-slate-900 mb-1">15K+</h3>
                        <p class="text-slate-500 font-medium">Penerima Manfaat</p>
                    </div>
                    <div class="bg-white border border-slate-100 p-8 rounded-3xl shadow-sm hover:shadow-md transition-shadow group">
                        <i data-lucide="building-2" class="w-10 h-10 text-emerald-600 mb-4 group-hover:scale-110 transition-transform"></i>
                        <h3 class="text-4xl font-extrabold text-slate-900 mb-1">32</h3>
                        <p class="text-slate-500 font-medium">Cabang Koperasi</p>
                    </div>
                    <div class="bg-linear-to-r from-teal-500 to-teal-700 p-8 rounded-3xl text-white shadow-xl shadow-emerald-900/20">
                        <h3 class="text-2xl font-bold mb-2">Visi Utama</h3>
                        <p class="font-medium text-emerald-100">"Menyalakan budaya belajar dan menggerakkan ekonomi yang inklusif."</p>
                    </div>
                </div>

                <!-- Right: Content -->
                <div class="lg:col-span-8 lg:pl-8 flex flex-col justify-center">
                    <h2 class="text-emerald-600 font-bold tracking-widest uppercase text-sm mb-3">Tentang Saya</h2>
                    <h3 class="text-3xl md:text-5xl font-extrabold text-slate-900 mb-8 leading-tight">Dedikasi untuk Umat & Bangsa</h3>
                    
                    <div class="space-y-6 text-slate-600 text-lg leading-relaxed">
                        <p>
                            Saya <strong class="text-slate-900">Moh Wahyudi</strong>, seorang pemimpin visioner dengan pengalaman lebih dari satu dekade dalam mengelola organisasi nirlaba dan entitas bisnis berbasis syariah.
                        </p>
                        <p>
                            Melalui <span class="text-emerald-700 font-bold">Yayasan Yahqi</span> dan <span class="text-emerald-700 font-bold">BMT NU Ngasem Group</span>, saya berikhtiar menciptakan ekosistem di mana pendidikan dan ekonomi berjalan beriringan untuk kemandirian umat.
                        </p>
                    </div>

                    <div class="mt-10 grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center p-4 bg-white rounded-2xl border border-slate-100 shadow-sm hover:border-emerald-500 transition-colors group">
                            <i data-lucide="heart-handshake" class="w-8 h-8 text-amber-500 mx-auto mb-2 group-hover:scale-110 transition-transform"></i>
                            <span class="text-sm font-bold text-slate-700">Sosial</span>
                        </div>
                        <div class="text-center p-4 bg-white rounded-2xl border border-slate-100 shadow-sm hover:border-emerald-500 transition-colors group">
                            <i data-lucide="trending-up" class="w-8 h-8 text-amber-500 mx-auto mb-2 group-hover:scale-110 transition-transform"></i>
                            <span class="text-sm font-bold text-slate-700">Ekonomi</span>
                        </div>
                        <div class="text-center p-4 bg-white rounded-2xl border border-slate-100 shadow-sm hover:border-emerald-500 transition-colors group">
                            <i data-lucide="book-open" class="w-8 h-8 text-amber-500 mx-auto mb-2 group-hover:scale-110 transition-transform"></i>
                            <span class="text-sm font-bold text-slate-700">Edukasi</span>
                        </div>
                        <div class="text-center p-4 bg-white rounded-2xl border border-slate-100 shadow-sm hover:border-emerald-500 transition-colors group">
                            <i data-lucide="mic-2" class="w-8 h-8 text-amber-500 mx-auto mb-2 group-hover:scale-110 transition-transform"></i>
                            <span class="text-sm font-bold text-slate-700">Dakwah</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PERJALANAN SECTION -->
    <section id="perjalanan" class="py-24 bg-white relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-emerald-600 font-bold uppercase tracking-widest text-sm mb-3">Milestones</h2>
                <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900">Jejak Langkah Perjuangan</h3>
            </div>
            
            <div class="relative border-l-4 border-slate-100 ml-6 space-y-12">
                <!-- Milestone 1 -->
                <div class="relative pl-10">
                    <div class="absolute -left-6.5 top-0 w-10 h-10 rounded-full bg-teal-600 border-4 border-white shadow-lg flex items-center justify-center text-white z-10 transition-transform hover:scale-110">
                        <i data-lucide="sprout" class="w-5 h-5"></i>
                    </div>
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-xl transition-all duration-300">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4">
                            <span class="bg-emerald-50 text-emerald-700 font-bold px-4 py-1.5 rounded-full text-xs border border-emerald-100">2006</span>
                            <span class="text-slate-400 text-xs font-bold uppercase tracking-tighter mt-2 md:mt-0">Langkah Awal</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Mendirikan LPDU</h3>
                        <p class="text-slate-600 leading-relaxed mb-4">Menginisiasi Lembaga Pengelola Dana Umat untuk menyejahterakan guru ngaji dan santunan rutin yatim piatu di pedesaan.</p>
                        <ul class="space-y-2">
                            <li class="flex items-center text-sm text-slate-500"><i data-lucide="check" class="w-4 h-4 mr-2 text-teal-500"></i> Kesejahteraan Guru Ngaji</li>
                            <li class="flex items-center text-sm text-slate-500"><i data-lucide="check" class="w-4 h-4 mr-2 text-teal-500"></i> Dana Sosial Terstruktur</li>
                        </ul>
                    </div>
                </div>

                <!-- Milestone 2 -->
                <div class="relative pl-10">
                    <div class="absolute -left-6.5 top-0 w-10 h-10 rounded-full bg-amber-500 border-4 border-white shadow-lg flex items-center justify-center text-white z-10 transition-transform hover:scale-110">
                        <i data-lucide="book-open" class="w-5 h-5"></i>
                    </div>
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-xl transition-all duration-300">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4">
                            <span class="bg-amber-50 text-amber-700 font-bold px-4 py-1.5 rounded-full text-xs border border-amber-100">2007</span>
                            <span class="text-slate-400 text-xs font-bold uppercase tracking-tighter mt-2 md:mt-0">Fokus Pendidikan</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Pendidikan Guru TPQ (PGTPQ)</h3>
                        <p class="text-slate-600 leading-relaxed mb-4">Menyelenggarakan pendidikan intensif satu tahun gratis bagi calon pendidik generasi Qurani.</p>
                        <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                            <p class="text-sm text-slate-500 italic">"Investasi terbaik adalah membekali para pendidik umat."</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-16">
                <a href="#" class="inline-flex items-center gap-2 px-8 py-4 bg-slate-800 text-white rounded-full font-bold hover:bg-slate-900 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    Profil Lengkap <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- KARYA SECTION -->
    <section id="karya" class="py-24 bg-slate-50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12">
                <div class="max-w-xl">
                    <h2 class="text-emerald-600 font-bold uppercase tracking-widest text-sm mb-3">Unit Usaha & Sosial</h2>
                    <h3 class="text-3xl md:text-5xl font-extrabold text-slate-900">Buah Karya Nyata</h3>
                </div>
                <p class="text-slate-500 mt-4 md:mt-0 max-w-sm md:text-right">
                    Inisiatif strategis yang terus tumbuh memberikan dampak ekonomi dan sosial bagi umat.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Karya 1 -->
                <div class="group relative rounded-4xl overflow-hidden shadow-lg h-112.5">
                    <img src="{{ asset('storage/images/yahqi.jpg') }}" alt="Yayasan Yahqi" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000">
                    <div class="absolute inset-0 bg-linear-to-t from-slate-950 via-slate-900/40 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-8 w-full">
                        <div class="w-12 h-12 bg-amber-500 rounded-2xl flex items-center justify-center mb-4 text-white shadow-lg">
                            <i data-lucide="heart" class="w-6 h-6"></i>
                        </div>
                        <h4 class="text-2xl font-bold text-white mb-2">Yayasan Yahqi</h4>
                        <p class="text-slate-200 text-sm line-clamp-2">Pusat pergerakan sosial dan pendidikan, berfokus pada pemberdayaan masyarakat Bojonegoro.</p>
                    </div>
                </div>

                <!-- Karya 2 -->
                <div class="group relative rounded-4xl overflow-hidden shadow-lg h-112.5">
                    <img src="{{ asset('storage/images/bmt.jpg') }}" alt="BMT NU" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000">
                    <div class="absolute inset-0 bg-linear-to-t from-slate-950 via-slate-900/40 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-8 w-full">
                        <div class="w-12 h-12 bg-amber-500 rounded-2xl flex items-center justify-center mb-4 text-white shadow-lg">
                            <i data-lucide="briefcase" class="w-6 h-6"></i>
                        </div>
                        <h4 class="text-2xl font-bold text-white mb-2">KSPPS BMT NU</h4>
                        <p class="text-slate-200 text-sm line-clamp-2">Ekosistem ekonomi syariah inklusif yang kini telah berkembang menjadi 32 kantor cabang.</p>
                    </div>
                </div>

                <!-- Karya 3 -->
                <div class="group relative rounded-4xl overflow-hidden shadow-lg h-112.5">
                    <img src="{{ asset('storage/images/swalayan.jpg') }}" alt="Swalayan NU" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000">
                    <div class="absolute inset-0 bg-linear-to-t from-slate-950 via-slate-900/40 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-8 w-full">
                        <div class="w-12 h-12 bg-amber-500 rounded-2xl flex items-center justify-center mb-4 text-white shadow-lg">
                            <i data-lucide="shopping-cart" class="w-6 h-6"></i>
                        </div>
                        <h4 class="text-2xl font-bold text-white mb-2">Swalayan NU</h4>
                        <p class="text-slate-200 text-sm line-clamp-2">Ritel modern berbasis komunitas jam'iyah untuk memenuhi kebutuhan pokok secara mandiri.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KONTAK SECTION -->
    <section id="kontak" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-emerald-600 font-bold uppercase tracking-widest text-sm mb-3">Kontak</h2>
                <h3 class="text-3xl md:text-5xl font-extrabold text-slate-900">Hubungi Saya</h3>
                <p class="text-slate-500 mt-4 max-w-xl mx-auto">Silakan tinggalkan pesan untuk peluang kolaborasi atau diskusi strategis.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <!-- Info Column -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-slate-50 p-8 rounded-4xl border border-slate-100">
                        <h3 class="text-xl font-bold text-slate-800 mb-6 border-b border-slate-200 pb-4">Informasi Kontak</h3>
                        <div class="space-y-6">
                            <div class="flex items-start group">
                                <div class="bg-white p-3 rounded-xl shadow-sm mr-4 group-hover:bg-emerald-50 transition-colors">
                                    <i data-lucide="map-pin" class="w-6 h-6 text-emerald-600"></i>
                                </div>
                                <div><h4 class="text-sm font-bold text-slate-900">Kantor Utama</h4><p class="text-slate-500 text-sm">Ngasem, Bojonegoro, Jatim</p></div>
                            </div>
                            <div class="flex items-start group">
                                <div class="bg-white p-3 rounded-xl shadow-sm mr-4 group-hover:bg-emerald-50 transition-colors">
                                    <i data-lucide="mail" class="w-6 h-6 text-emerald-600"></i>
                                </div>
                                <div><h4 class="text-sm font-bold text-slate-900">Email</h4><p class="text-slate-500 text-sm">info@yahqipublisher.com</p></div>
                            </div>
                        </div>
                    </div>
                    <!-- Map Box (Lebih Kecil & di bawah Info) -->
                    <div class="w-full h-64 bg-gray-200 rounded-3xl overflow-hidden shadow-sm border border-gray-100">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.612485142049!2d111.7286!3d-7.1546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7779aaaaaaaaaa%3A0xaaaaaaa!2sBMT+NU+Ngasem!5e0!3m2!1sid!2sid!4v1234567890" 
                            width="100%" 
                            height="100%" 
                            style="border:0; filter: grayscale(20%);" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="lg:col-span-2">
                    <div class="bg-white p-8 md:p-10 rounded-4xl shadow-2xl shadow-slate-200/50 border border-slate-100 h-full">
                        <form action="#" method="POST" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                                    <input type="text" class="w-full px-4 py-4 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:border-emerald-500 outline-none transition-all" placeholder="Masukkan nama...">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Email Aktif</label>
                                    <input type="email" class="w-full px-4 py-4 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:border-emerald-500 outline-none transition-all" placeholder="email@contoh.com">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Pesan</label>
                                <textarea rows="6" class="w-full px-4 py-4 rounded-xl bg-slate-50 border border-slate-200 focus:bg-white focus:border-emerald-500 outline-none transition-all" placeholder="Apa yang bisa saya bantu?"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-linear-to-r from-teal-500 to-teal-700 hover:bg-slate-800 text-white font-bold py-5 rounded-xl transition-all shadow-xl transform hover:-translate-y-1 flex items-center justify-center gap-3">
                                Kirim Sekarang <i data-lucide="send" class="w-5 h-5"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-slate-950 text-white pt-20 pb-10 overflow-hidden relative">
        {{-- <div class="absolute inset-0 opacity-5 pointer-events-none">
            <div class="absolute top-0 right-0 w-96 h-96 bg-teal-500 rounded-full blur-[120px]"></div>
        </div> --}}
<div class="absolute inset-0 opacity-5 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0 100 C 20 0 50 0 100 100 Z" fill="white" />
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 mb-16 border-b border-white/10 pb-16">
                <!-- Brand -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="flex items-center space-x-3">
                        {{-- <div class="w-10 h-10 bg-amber-500 rounded-xl flex items-center justify-center text-slate-900">
                            <i data-lucide="book-open" class="w-6 h-6"></i>
                        </div> --}}
                        <span class="text-2xl font-extrabold tracking-tight">Yahqi<span class="text-amber-500">Publisher</span></span>
                    </div>
                    <p class="text-slate-400 leading-relaxed max-w-md text-lg">
                        Membangun peradaban melalui literasi dan pemberdayaan ekonomi umat yang berkelanjutan.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-12 h-12 rounded-xl bg-white/5 flex items-center justify-center hover:bg-teal-600 transition-all"><i data-lucide="instagram"></i></a>
                        <a href="#" class="w-12 h-12 rounded-xl bg-white/5 flex items-center justify-center hover:bg-teal-600 transition-all"><i data-lucide="facebook"></i></a>
                        <a href="#" class="w-12 h-12 rounded-xl bg-white/5 flex items-center justify-center hover:bg-teal-600 transition-all"><i data-lucide="youtube"></i></a>
                    </div>
                </div>

                <!-- Nav -->
                <div>
                    <h4 class="text-lg font-bold mb-8 text-amber-500 uppercase tracking-widest">Navigasi</h4>
                    <ul class="space-y-4 text-slate-400">
                        <li><a href="#home" class="hover:text-teal-400 transition-colors">Beranda</a></li>
                        <li><a href="#tentang" class="hover:text-teal-400 transition-colors">Tentang Saya</a></li>
                        <li><a href="#karya" class="hover:text-teal-400 transition-colors">Portofolio</a></li>
                        <li><a href="#kontak" class="hover:text-teal-400 transition-colors">Kontak</a></li>
                    </ul>
                </div>

                <!-- Info -->
                <div>
                    <h4 class="text-lg font-bold mb-8 text-amber-500 uppercase tracking-widest">Kontak</h4>
                    <p class="text-slate-400 text-sm mb-4 leading-relaxed">
                        KSPPS BMT NU Ngasem,<br>Bojonegoro, Jawa Timur
                    </p>
                    <a href="mailto:info@yahqipublisher.com" class="text-teal-400 font-bold hover:underline">info@yahqipublisher.com</a>
                </div>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center text-slate-500 text-sm">
                <p>&copy; <span id="year"></span> Moh Wahyudi. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition-colors">Privacy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms</a>
                </div>
            </div>
        </div>
    </footer>

   <!-- LOGIC -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Init Lucide
            lucide.createIcons();

            // 1. Language Dropdown Toggle Logic
            const langBtn = document.getElementById('lang-dropdown-btn');
            const langMenu = document.getElementById('lang-dropdown-menu');

            if (langBtn && langMenu) {
                langBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const isHidden = langMenu.classList.contains('hidden');
                    if (isHidden) {
                        langMenu.classList.remove('hidden');
                        setTimeout(() => {
                            langMenu.classList.remove('opacity-0', 'scale-95');
                        }, 10);
                    } else {
                        langMenu.classList.add('opacity-0', 'scale-95');
                        setTimeout(() => langMenu.classList.add('hidden'), 200);
                    }
                });

                document.addEventListener('click', () => {
                    langMenu.classList.add('opacity-0', 'scale-95');
                    setTimeout(() => langMenu.classList.add('hidden'), 200);
                });
            }

            // 2. Mobile Menu Logic (Improved and Fixed state)
            const mobileBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('menu-icon');

            const updateMenuIcon = (isOpen) => {
                if (!menuIcon) return;
                // Change the attribute and refresh icons
                menuIcon.setAttribute('data-lucide', isOpen ? 'x' : 'menu');
                lucide.createIcons();
            };

            const toggleMobileMenu = (forceClose = false) => {
                const isCurrentlyHidden = mobileMenu.classList.contains('hidden');
                
                if (forceClose || !isCurrentlyHidden) {
                    // Action: Close
                    mobileMenu.classList.add('hidden');
                    updateMenuIcon(false);
                } else {
                    // Action: Open
                    mobileMenu.classList.remove('hidden');
                    updateMenuIcon(true);
                }
            };

            if (mobileBtn && mobileMenu) {
                mobileBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    toggleMobileMenu();
                });

                // Auto-close menu when link is clicked
                const mobileLinks = document.querySelectorAll('.mobile-nav-link');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        toggleMobileMenu(true);
                        //  updateMenuIcon(false);
                    });
                });

                // Close menu when clicking outside
                document.addEventListener('click', (e) => {
                    if (!mobileMenu.contains(e.target) && !mobileBtn.contains(e.target)) {
                        if (!mobileMenu.classList.contains('hidden')) {
                            toggleMobileMenu(true);
                            updateMenuIcon(true);
                        }
                    }
                });
            }

            // 3. Navbar Scroll Effect (Shadow only, height constant)
            window.addEventListener('scroll', () => {
                const nav = document.getElementById('navbar');
                if (window.scrollY > 50) {
                    nav.classList.add('shadow-xl');
                } else {
                    nav.classList.remove('shadow-xl');
                }
            });

            // 4. Reveal Animation on Scroll
            const reveals = document.querySelectorAll('.reveal');
            const revealOnScroll = () => {
                reveals.forEach(el => {
                    const top = el.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;
                    if (top < windowHeight - 100) {
                        el.classList.add('active');
                    }
                });
            };
            window.addEventListener('scroll', revealOnScroll);
            revealOnScroll();

            // 5. Translation Logic
            let currentLang = localStorage.getItem('lang') || 'id';

            const updateTranslation = () => {
                const translatable = document.querySelectorAll('[data-t-id], [data-t-en]');
                translatable.forEach(el => {
                    const text = currentLang === 'en' ? el.getAttribute('data-t-en') : el.getAttribute('data-t-id');
                    if (text) el.textContent = text;
                });

                // Update Desktop Dropdown UI Label & Flag
                const label = document.getElementById('current-lang-label');
                const flag = document.getElementById('current-lang-flag');
                if (label) label.textContent = currentLang.toUpperCase();
                if (flag) flag.textContent = currentLang === 'en' ? '🇺🇸' : '🇮🇩';
                
                // Update Desktop Options Checkmark
                document.querySelectorAll('.lang-option').forEach(opt => {
                    const lang = opt.id.replace('opt-', '');
                    const isTarget = lang === currentLang;
                    opt.classList.toggle('lang-option-active', isTarget);
                    const check = opt.querySelector('i');
                    if (check) check.classList.toggle('hidden', !isTarget);
                });

                // Update Mobile Toggle Buttons
                const mID = document.getElementById('m-lang-id');
                const mEN = document.getElementById('m-lang-en');
                if (mID && mEN) {
                    mID.classList.toggle('bg-teal-600', currentLang === 'id');
                    mID.classList.toggle('text-white', currentLang === 'id');
                    mID.classList.toggle('text-slate-400', currentLang !== 'id');
                    mEN.classList.toggle('bg-teal-600', currentLang === 'en');
                    mEN.classList.toggle('text-white', currentLang === 'en');
                    mEN.classList.toggle('text-slate-400', currentLang !== 'en');
                }
            };

            window.changeLang = (lang) => {
                currentLang = lang;
                localStorage.setItem('lang', lang);
                updateTranslation();
                if (langMenu) {
                    langMenu.classList.add('opacity-0', 'scale-95');
                    setTimeout(() => langMenu.classList.add('hidden'), 200);
                }
            };

            updateTranslation(); // Initial Load

            // 6. Footer Year
            const yearEl = document.getElementById('year');
            if (yearEl) yearEl.textContent = new Date().getFullYear();
        });
    </script>
</body>
</html>