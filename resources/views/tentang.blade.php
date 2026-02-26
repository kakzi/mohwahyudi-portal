<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Saya - Moh Wahyudi</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
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
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-white text-slate-900 font-['Plus_Jakarta_Sans'] flex flex-col min-h-screen">

    <nav class="fixed w-full z-50 top-0 bg-white/80 backdrop-blur-xl border-b border-slate-100 transition-all duration-300 h-20 flex items-center" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="flex items-center justify-between">
                <div class="shrink-0 cursor-pointer group flex items-center gap-2" onclick="window.location.href='{{ route('home.index', ['locale' => app()->getLocale()]) }}'">
                    <span class="text-2xl font-black text-slate-700 tracking-tighter">
                        Yahqi<span class="text-amber-500">Publisher</span>
                    </span>
                </div>

                <div class="hidden md:flex items-center space-x-6">
                    <div class="flex items-baseline space-x-1">
                        <a href="{{ route('home.index', ['locale' => app()->getLocale()]) }}" 
                           class="px-4 py-2 rounded-full text-sm font-bold text-slate-600 hover:text-teal-600 transition-all">
                            <span>Beranda</span>
                        </a>

                        <a href="{{ route('tentang.index', ['locale' => app()->getLocale()]) }}#tentang" 
                           class="px-4 py-2 rounded-full text-sm font-bold text-teal-600 bg-teal-50 transition-all">
                            <span>Tentang</span>
                        </a>

                        <a href="{{ route('perjalanan.index', ['locale' => app()->getLocale()]) }}#perjalanan" 
                           class="px-4 py-2 rounded-full text-sm font-bold text-slate-600 hover:text-teal-600 transition-all">
                            <span>Perjalanan</span>
                        </a>

                        <a href="{{ route('karya.index', ['locale' => app()->getLocale()]) }}" 
                           class="px-4 py-2 rounded-full text-sm font-bold text-slate-600 hover:text-teal-600 transition-all">
                            <span>Karya</span>
                        </a>
                    </div>

                    <a href="{{ route('home.index', ['locale' => app()->getLocale()]) }}#kontak" class="bg-teal-600 hover:bg-slate-800 text-white px-6 py-2.5 rounded-full text-sm font-bold transition-all transform hover:scale-105 shadow-lg shadow-teal-200/50">Hubungi Saya</a>

                    <div class="relative inline-block text-left">
                        <button id="lang-dropdown-btn" class="flex items-center gap-2 bg-slate-100 text-slate-700 border border-slate-200 px-4 py-2 rounded-full text-xs font-bold shadow-sm transition-all hover:bg-slate-200 hover:shadow-md focus:ring-2 focus:ring-slate-300 focus:outline-none">
                            <span id="current-lang-label" class="tracking-wide">{{ app()->getLocale() == 'id' ? 'Bahasa' : 'English' }}</span>
                            <i data-lucide="chevron-down" class="w-3.5 h-3.5 text-slate-400"></i>
                        </button>
                        
                        <div id="lang-dropdown-menu" class="hidden absolute right-0 mt-2 w-32 bg-white border border-slate-100 rounded-2xl shadow-xl p-1.5 z-60 origin-top-right transform scale-95 opacity-0 transition-all duration-200">
                            <a href="{{ route('lang.switch', 'id') }}" class="w-full text-left px-3 py-2.5 rounded-xl text-xs font-bold transition-all hover:bg-slate-50 flex items-center justify-between {{ app()->getLocale() == 'id' ? 'bg-teal-50 text-teal-700 hover:bg-teal-100' : 'text-slate-600' }}">
                                <span>Indonesia</span>
                                @if(app()->getLocale() == 'id') <i data-lucide="check" class="w-4 h-4 text-teal-600"></i> @endif
                            </a>
                            <a href="{{ route('lang.switch', 'en') }}" class="w-full text-left px-3 py-2.5 rounded-xl text-xs font-bold transition-all hover:bg-slate-50 flex items-center justify-between {{ app()->getLocale() == 'en' ? 'bg-teal-50 text-teal-700 hover:bg-teal-100' : 'text-slate-600' }}">
                                <span>English</span>
                                @if(app()->getLocale() == 'en') <i data-lucide="check" class="w-4 h-4 text-teal-600"></i> @endif
                            </a>
                        </div>
                    </div>
                </div>

                <div class="-mr-2 flex md:hidden items-center gap-4">
                    <button type="button" id="mobile-menu-btn" class="inline-flex items-center justify-center p-3 rounded-xl text-slate-500 hover:text-teal-600 hover:bg-slate-50 focus:outline-none transition-all">
                        <i data-lucide="menu" class="w-7 h-7" id="menu-icon"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="hidden fixed top-20 left-0 w-full bg-white border-t border-slate-100 shadow-2xl z-40 md:hidden" id="mobile-menu">
            <div class="px-6 pt-6 pb-10 space-y-4 max-h-[calc(100vh-5rem)] overflow-y-auto no-scrollbar">
                <a href="{{ route('home.index', ['locale' => app()->getLocale()]) }}" class="mobile-nav-link flex items-center gap-4 text-xl font-bold text-slate-700 p-3 rounded-2xl hover:bg-slate-50 transition-all">
                    <i data-lucide="home" class="w-6 h-6 text-teal-600"></i> <span>Beranda</span>
                </a>
                <a href="{{ route('karya.index', ['locale' => app()->getLocale()]) }}" class="mobile-nav-link flex items-center gap-4 text-xl font-bold text-teal-700 bg-teal-50 p-3 rounded-2xl transition-all">
                    <i data-lucide="layout-grid" class="w-6 h-6 text-teal-600"></i> <span>Karya</span>
                </a>
                
                <div class="py-4 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-sm font-bold text-slate-500 uppercase tracking-widest">Language</span>
                    <div class="flex bg-slate-100 p-1 rounded-xl border border-slate-200 scale-90">
                        <a href="{{ route('lang.switch', 'id') }}" class="px-5 py-2 rounded-lg text-xs font-black uppercase transition-all {{ app()->getLocale() == 'id' ? 'bg-white shadow-sm text-teal-700' : 'text-slate-500' }}">🇮🇩 ID</a>
                        <a href="{{ route('lang.switch', 'en') }}" class="px-5 py-2 rounded-lg text-xs font-black uppercase transition-all {{ app()->getLocale() == 'en' ? 'bg-white shadow-sm text-teal-700' : 'text-slate-500' }}">🇺🇸 EN</a>
                    </div>
                </div>

                <a href="{{ route('home.index', ['locale' => app()->getLocale()]) }}#kontak" class="mobile-nav-link flex items-center justify-center gap-3 bg-teal-600 text-white px-6 py-5 rounded-2xl font-bold shadow-lg shadow-teal-200 active:scale-95 transition-all">
                    <i data-lucide="send" class="w-5 h-5"></i> <span>Hubungi Saya</span>
                </a>
            </div>
        </div>
    </nav>

    <main class="flex-grow pt-20"> <section id="tentang" class="py-24 bg-slate-50 relative min-h-screen flex items-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
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

    </main>

    <!-- footer-->
    <footer class="bg-slate-950 text-white pt-20 pb-10 overflow-hidden relative">
        <div class="absolute inset-0 opacity-5 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0 100 C 20 0 50 0 100 100 Z" fill="white" />
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 mb-16 border-b border-white/10 pb-16">
                <div class="lg:col-span-2 space-y-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-amber-500 rounded-xl flex items-center justify-center text-slate-900">
                            <i data-lucide="book-open" class="w-6 h-6"></i>
                        </div>
                        <span class="text-2xl font-extrabold tracking-tight">Yahqi<span class="text-amber-500">Publisher</span></span>
                    </div>
                    <p class="text-slate-400 leading-relaxed max-w-md text-lg">
                        Membangun peradaban melalui literasi dan pemberdayaan ekonomi umat yang berkelanjutan.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-12 h-12 rounded-xl bg-white/5 flex items-center justify-center hover:bg-teal-600 transition-all"><i data-lucide="instagram"></i></a>
                        <a href="#" class="w-12 h-12 rounded-xl bg-white/5 flex items-center justify-center hover:bg-teal-600 transition-all"><i data-lucide="facebook"></i></a>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-8 text-amber-500 uppercase tracking-widest">Navigasi</h4>
                    <ul class="space-y-4 text-slate-400">
                        <li><a href="{{ route('home.index', ['locale' => app()->getLocale()]) }}" class="hover:text-teal-400 transition-colors">Beranda</a></li>
                        <li><a href="{{ route('karya.index', ['locale' => app()->getLocale()]) }}" class="hover:text-teal-400 transition-colors">Portofolio</a></li>
                        <li><a href="{{ route('home.index', ['locale' => app()->getLocale()]) }}#kontak" class="hover:text-teal-400 transition-colors">Kontak</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-8 text-amber-500 uppercase tracking-widest">Kontak</h4>
                    <p class="text-slate-400 text-sm mb-4 leading-relaxed">
                        KSPPS BMT NU Ngasem,<br>Bojonegoro, Jawa Timur
                    </p>
                    <a href="mailto:info@yahqipublisher.com" class="text-teal-400 font-bold hover:underline">info@yahqipublisher.com</a>
                </div>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center text-slate-500 text-sm">
                <p>&copy; {{ date('Y') }} Moh Wahyudi. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition-colors">Privacy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>