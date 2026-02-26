<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karya - Moh Wahyudi | YahqiPublisher</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* Language Dropdown Active State */
        .lang-option-active { @apply bg-teal-50 text-teal-700 font-bold; }

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

        /* Utility for Aspect Ratio / Heights */
        .h-112\.5 { height: 28.125rem; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-white text-slate-900 font-['Plus_Jakarta_Sans']">

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
                           class="px-4 py-2 rounded-full text-sm font-bold text-slate-600 hover:text-teal-600 transition-all">
                            <span>Tentang</span>
                        </a>

                        <a href="{{ route('perjalanan.index', ['locale' => app()->getLocale()]) }}#perjalanan" 
                           class="px-4 py-2 rounded-full text-sm font-bold text-slate-600 hover:text-teal-600 transition-all">
                            <span>Perjalanan</span>
                        </a>

                        <a href="{{ route('karya.index', ['locale' => app()->getLocale()]) }}" 
                           class="px-4 py-2 rounded-full text-sm font-bold text-teal-600 bg-teal-50 transition-all">
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
    <main class="pt-20">
        <section class="min-h-[40vh] flex items-center pt-20 pb-12 relative overflow-hidden bg-slate-50">
            <div class="absolute top-0 right-0 w-96 h-96 bg-amber-100/40 rounded-full blur-[100px] -z-10 translate-x-1/3 -translate-y-1/3"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-emerald-100/40 rounded-full blur-[80px] -z-10 -translate-x-1/3 translate-y-1/3"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="text-center max-w-3xl mx-auto reveal">
                    <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-white border border-slate-200 text-amber-600 text-xs font-bold uppercase tracking-wider mb-8 shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-amber-500 mr-2 animate-pulse"></span>
                        Portofolio & Unit Bisnis
                    </div>
                    <h1 class="text-4xl md:text-6xl font-extrabold text-slate-900 mb-6 leading-tight tracking-tight">
                        Dedikasi dalam <br class="hidden md:block" /> <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-amber-500">Karya Nyata</span>
                    </h1>
                    <p class="text-slate-500 text-lg md:text-xl leading-relaxed max-w-2xl mx-auto">
                        Menampilkan berbagai inisiatif strategis di bidang ekonomi syariah, pendidikan, dan sosial yang telah dibangun untuk kemaslahatan umat.
                    </p>
                </div>
            </div>
        </section>

        <section id="karya" class="pb-24 pt-12 bg-slate-50 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6 reveal">
                    <div>
                        <h2 class="text-amber-600 font-bold uppercase tracking-widest text-sm mb-2">Unit Usaha & Sosial</h2>
                        <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900">Buah Karya Nyata</h3>
                    </div>
                    <div class="h-px bg-slate-200 flex-grow mx-8 hidden md:block mb-4"></div>
                </div>
                 <!-- karya 1 -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"> 
                        <div class="reveal group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-amber-500/10 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full">
                            <div class="relative h-64 overflow-hidden bg-slate-100">
                                <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                                <img src="{{ asset('images/yahqi.jpg') }}" alt="Yayasan Yahqi" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                                <div class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur text-amber-600 p-2.5 rounded-2xl shadow-sm">
                                    <i data-lucide="heart" class="w-5 h-5"></i>
                                </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-amber-600 transition-colors">YAHQI ( YAYASAN HAFIZH QUR'AN INDONESIA )</h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4">
                                Pusat pergerakan sosial dan pendidikan yang berfokus pada pemberdayaan santri dengan kemampuan leadership, entrepreneurship, public speaking, dan teknologi.
                            </p>
                            <div class="mt-auto pt-6 border-t border-slate-50">
                                <a href="https://yahqi.com/" target="_blank" class="inline-flex w-full items-center justify-center gap-2 px-5 py-3 bg-slate-50 hover:bg-amber-500 text-slate-700 hover:text-white rounded-xl text-sm font-bold transition-all duration-300 group-hover:shadow-lg group-hover:shadow-amber-500/25">
                                    <span>Kunjungi Website</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                
                <!-- karya 2 -->
                    <div class="reveal group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-emerald-500/10 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full delay-100">
                        <div class="relative h-64 overflow-hidden bg-slate-100">
                            <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                            <img src="{{ asset('images/bmt.jpg') }}" alt="BMT NU" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            <div class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur text-emerald-600 p-2.5 rounded-2xl shadow-sm">
                                <i data-lucide="briefcase" class="w-5 h-5"></i>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-emerald-600 transition-colors">Holding Koperasi BMT NU NGASEM GROUP</h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4">Holding Koperasi Pertama di Indonesia yang mengelola beragam unit bisnis secara terintegrasi dan profesional.</p>
                            <div class="mt-auto pt-6 border-t border-slate-50">
                                <a href="https://www.bmtnungasemgroup.com/direksi/show" target="_blank" class="inline-flex w-full items-center justify-center gap-2 px-5 py-3 bg-slate-50 hover:bg-amber-500 text-slate-700 hover:text-white rounded-xl text-sm font-bold transition-all duration-300 group-hover:shadow-lg group-hover:shadow-amber-500/25">
                                    <span>Kunjungi Website</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                <!-- karya 3 -->
                    <div class="reveal group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-emerald-500/10 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full delay-100">
                        <div class="relative h-64 overflow-hidden bg-slate-100">
                            <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                            <img src="{{ asset('images/kspps.jpg') }}" alt="BMT NU" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            <div class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur text-blue-600 p-2.5 rounded-2xl shadow-sm">
                                <i data-lucide="briefcase" class="w-5 h-5"></i>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">KSPP SYARIAH BMT NU</h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4">
                                Ekosistem ekonomi syariah inklusif yang melayani umat untuk menghindari riba dan membangun kemandirian ekonomi. Kini telah berkembang pesat menjadi 32 kantor cabang.
                            </p>
                            <div class="mt-auto pt-6 border-t border-slate-50">
                                <a href="https://www.bmtnungasem.com/id" target="_blank" class="inline-flex w-full items-center justify-center gap-2 px-5 py-3 bg-slate-50 hover:bg-amber-500 text-slate-700 hover:text-white rounded-xl text-sm font-bold transition-all duration-300 group-hover:shadow-lg group-hover:shadow-amber-500/25">
                                    <span>Kunjungi Website</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-7">
                 <!-- karya 4 -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"> 
                        <div class="reveal group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-amber-500/10 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full">
                            <div class="relative h-64 overflow-hidden bg-slate-100">
                                <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                                <img src="{{ asset('images/airnuberkah.jpg') }}" alt="Air Nu Berkah" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                                <div class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur text-amber-600 p-2.5 rounded-2xl shadow-sm">
                                    <i data-lucide="heart" class="w-5 h-5"></i>
                                </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-amber-600 transition-colors">AIR NU BERKAH</h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4">
                                AIR NU Berkah adalah air minum berkualitas, higienis, dan halal yang menghadirkan kesegaran serta keberkahan dalam setiap tetesnya.
                            </p>
                            <div class="mt-auto pt-6 border-t border-slate-50">
                                <a href="https://www.airnuberkah.com/" target="_blank" class="inline-flex w-full items-center justify-center gap-2 px-5 py-3 bg-slate-50 hover:bg-amber-500 text-slate-700 hover:text-white rounded-xl text-sm font-bold transition-all duration-300 group-hover:shadow-lg group-hover:shadow-amber-500/25">
                                    <span>Kunjungi Website</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                
                <!-- karya 5 -->
                    <div class="reveal group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-emerald-500/10 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full delay-100">
                        <div class="relative h-64 overflow-hidden bg-slate-100">
                            <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                            <img src="{{ asset('images/swalayan.jpg') }}" alt="Swalayan" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            <div class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur text-emerald-600 p-2.5 rounded-2xl shadow-sm">
                                <i data-lucide="briefcase" class="w-5 h-5"></i>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-emerald-600 transition-colors">Toko Swalayan NU</h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4">Toko Swalayan NU tidak hanya menjadi tempat berbelanja, tetapi juga wadah pemberdayaan ekonomi warga Nahdliyin</p>
                           <div class="mt-auto pt-6 border-t border-slate-50">
                                <a href="" target="_blank" class="inline-flex w-full items-center justify-center gap-2 px-5 py-3 bg-slate-50 hover:bg-amber-500 text-slate-700 hover:text-white rounded-xl text-sm font-bold transition-all duration-300 group-hover:shadow-lg group-hover:shadow-amber-500/25">
                                    <span>Kunjungi Media Sosial</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                <!-- karya 6 -->
                    <div class="reveal group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-emerald-500/10 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full delay-100">
                        <div class="relative h-64 overflow-hidden bg-slate-100">
                            <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                            <img src="{{ asset('images/bmt.jpg') }}" alt="BMT NU" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            <div class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur text-blue-600 p-2.5 rounded-2xl shadow-sm">
                                <i data-lucide="briefcase" class="w-5 h-5"></i>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">BMT NU Ngasem Tour and Travel</h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4">
                                BMT NU Ngasem Tour and Travel melayani berbagai jenis perjalanan, seperti wisata religi (ziarah wali), wisata baik dalam negeri atau ke luar negeri, hingga layanan umroh dan haji plus.  
                            <div class="mt-auto pt-6 border-t border-slate-50">
                                <a href="https://www.instagram.com/bmtnungasem_tourandtravel/" target="_blank" class="inline-flex w-full items-center justify-center gap-2 px-5 py-3 bg-slate-50 hover:bg-amber-500 text-slate-700 hover:text-white rounded-xl text-sm font-bold transition-all duration-300 group-hover:shadow-lg group-hover:shadow-amber-500/25">
                                    <span>Kunjungi Media Sosial</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                 <!-- karya 7 -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"> 
                        <div class="reveal group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-amber-500/10 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full">
                            <div class="relative h-64 overflow-hidden bg-slate-100">
                                <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                                <img src="{{ asset('images/nunart.jpeg') }}" alt="NUN ART" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                                <div class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur text-amber-600 p-2.5 rounded-2xl shadow-sm">
                                    <i data-lucide="heart" class="w-5 h-5"></i>
                                </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-amber-600 transition-colors">NUN Art Digital Printing </h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4">Unit ini melayani berbagai kebutuhan cetak seperti pembuatan banner, brosur, undangan, cetak foto, pembuatan stempel, 
                                penjilidan buku. </p>
                            <div class="mt-auto pt-6 border-t border-slate-50">
                                <a href="https://www.instagram.com/nun_art_digitalprinting?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="inline-flex w-full items-center justify-center gap-2 px-5 py-3 bg-slate-50 hover:bg-amber-500 text-slate-700 hover:text-white rounded-xl text-sm font-bold transition-all duration-300 group-hover:shadow-lg group-hover:shadow-amber-500/25">
                                    <span>Kunjungi Media Sosial</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                
                <!-- karya 8 -->
                    <div class="reveal group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-emerald-500/10 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full delay-100">
                        <div class="relative h-64 overflow-hidden bg-slate-100">
                            <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                            <img src="{{ asset('images/playground.jpg') }}" alt="Mom & Kids Playground " class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            <div class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur text-emerald-600 p-2.5 rounded-2xl shadow-sm">
                                <i data-lucide="briefcase" class="w-5 h-5"></i>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-emerald-600 transition-colors">Mom & Kids Playground </h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4">Tempat ini menjadi alternatif hiburan sehat sekaligus mendukung tumbuh kembang anak-anak dengan pendekatan ramah anak dan bernuansa islami. </p>
                            <div class="mt-auto pt-6 border-t border-slate-50">
                                <a href="https://www.instagram.com/momandkids_bmtnungasem/" target="_blank" class="inline-flex w-full items-center justify-center gap-2 px-5 py-3 bg-slate-50 hover:bg-amber-500 text-slate-700 hover:text-white rounded-xl text-sm font-bold transition-all duration-300 group-hover:shadow-lg group-hover:shadow-amber-500/25">
                                    <span>Kunjungi Media Sosial</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                <!-- karya 9 -->
                    <div class="reveal group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-emerald-500/10 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full delay-100">
                        <div class="relative h-64 overflow-hidden bg-slate-100">
                            <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                            <img src="{{ asset('images/hotel.jpg') }}" alt="Guesthouse NU " class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            <div class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur text-blue-600 p-2.5 rounded-2xl shadow-sm">
                                <i data-lucide="briefcase" class="w-5 h-5"></i>
                            </div>
                        </div>
                        
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">Guesthouse NU </h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4">Bagi tamu yang berkunjung ke Ngasem dan ingin menginap, Guesthouse NU hadir sebagai pilihan yang nyaman dan terjangkau</p>
                            <div class="mt-auto pt-6 border-t border-slate-50">
                                <a href="https://www.instagram.com/guesthouse.nu/" target="_blank" class="inline-flex w-full items-center justify-center gap-2 px-5 py-3 bg-slate-50 hover:bg-amber-500 text-slate-700 hover:text-white rounded-xl text-sm font-bold transition-all duration-300 group-hover:shadow-lg group-hover:shadow-amber-500/25">
                                    <span>Kunjungi Media Sosial</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-7">
                 <!-- karya 10 -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"> 
                        <div class="reveal group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-amber-500/10 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full">
                            <div class="relative h-64 overflow-hidden bg-slate-100">
                                <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                                <img src="{{ asset('images/ballrom.png') }}" alt="Air Nu Berkah" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                                <div class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur text-amber-600 p-2.5 rounded-2xl shadow-sm">
                                    <i data-lucide="heart" class="w-5 h-5"></i>
                                </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-amber-600 transition-colors">Ballroom KH. Hasyim Asy'ari</h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4">Ballroom megah dan identik dengan warna biru, itulah nuansa yang 
ada di ruangan tersebut. Ballroom ini dapat menampung hingga 
1.000 orang. </p>
                            <div class="mt-auto pt-6 border-t border-slate-50">
                                <a href="https://www.instagram.com/ballroomnungasem/" target="_blank" class="inline-flex w-full items-center justify-center gap-2 px-5 py-3 bg-slate-50 hover:bg-amber-500 text-slate-700 hover:text-white rounded-xl text-sm font-bold transition-all duration-300 group-hover:shadow-lg group-hover:shadow-amber-500/25">
                                    <span>Kunjungi Website</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                
                <!-- karya 11 -->
                    <div class="reveal group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-emerald-500/10 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full delay-100">
                        <div class="relative h-64 overflow-hidden bg-slate-100">
                            <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                            <img src="{{ asset('images/barber.png') }}" alt="Swalayan" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            <div class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur text-emerald-600 p-2.5 rounded-2xl shadow-sm">
                                <i data-lucide="briefcase" class="w-5 h-5"></i>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-emerald-600 transition-colors">Barbershop</h4>
                                <p>Untuk layanan kebugaran dan perawatan tubuh, koperasi jasa 
                                BMT NU Ngasem juga menghadirkan Keren Barbershop dengan konsep modern namun tetap syar’i.</p>
                           <div class="mt-auto pt-6 border-t border-slate-50">
                                <a href="https://www.instagram.com/keren.barbershop/" target="_blank" class="inline-flex w-full items-center justify-center gap-2 px-5 py-3 bg-slate-50 hover:bg-amber-500 text-slate-700 hover:text-white rounded-xl text-sm font-bold transition-all duration-300 group-hover:shadow-lg group-hover:shadow-amber-500/25">
                                    <span>Kunjungi Website</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                <!-- karya 12 -->
                    <div class="reveal group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-emerald-500/10 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full delay-100">
                        <div class="relative h-64 overflow-hidden bg-slate-100">
                            <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                            <img src="{{ asset('images/gym.jpg') }}" alt="BMT NU" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            <div class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur text-blue-600 p-2.5 rounded-2xl shadow-sm">
                                <i data-lucide="briefcase" class="w-5 h-5"></i>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">SBC Gym</h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4">
                                SBC Gym yang berada di dalam komplek Gedung Pusat Penggerak Ekonomi. Pusat 
                            kebugaran ini dilengkapi dengan alat-alat modern dan instruktur 
                            yang berpengalaman </p>  
                            <div class="mt-auto pt-6 border-t border-slate-50">
                                <a href="https://www.instagram.com/sbcgym_bmtnungasem/" target="_blank" class="inline-flex w-full items-center justify-center gap-2 px-5 py-3 bg-slate-50 hover:bg-amber-500 text-slate-700 hover:text-white rounded-xl text-sm font-bold transition-all duration-300 group-hover:shadow-lg group-hover:shadow-amber-500/25">
                                    <span>Kunjungi Media Sosial</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                 <!-- karya 13 -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"> 
                        <div class="reveal group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-amber-500/10 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full">
                            <div class="relative h-64 overflow-hidden bg-slate-100">
                                <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                                <img src="{{ asset('images/rc.jpg') }}" alt="NUN ART" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                                <div class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur text-amber-600 p-2.5 rounded-2xl shadow-sm">
                                    <i data-lucide="heart" class="w-5 h-5"></i>
                                </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-amber-600 transition-colors">Rumah Cantik </h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4">Bagi kalangan perempuan, Rumah Cantik di BMT NU Ngasem 
                                    bisa menjadi pilihan untuk mendapatkan layanan perawatan wajah 
                                    dan tubuh secara halal dan profesional. </p>
                            <div class="mt-auto pt-6 border-t border-slate-50">
                                <a href="https://www.instagram.com/rumahcantik.bmtnungasem/" target="_blank" class="inline-flex w-full items-center justify-center gap-2 px-5 py-3 bg-slate-50 hover:bg-amber-500 text-slate-700 hover:text-white rounded-xl text-sm font-bold transition-all duration-300 group-hover:shadow-lg group-hover:shadow-amber-500/25">
                                    <span>Kunjungi Media Sosial</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                
                <!-- karya 14 -->
                    <div class="reveal group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-emerald-500/10 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full delay-100">
                        <div class="relative h-64 overflow-hidden bg-slate-100">
                            <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                            <img src="{{ asset('images/baitulmall.png') }}" alt="Baitul mal " class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            <div class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur text-emerald-600 p-2.5 rounded-2xl shadow-sm">
                                <i data-lucide="briefcase" class="w-5 h-5"></i>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-emerald-600 transition-colors">Baitul Mal </h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4"> Unit usaha inilah yang berperan besar dalam menggerakkan roda kepedulian kepada 
                                umat, terutama dalam konteks pemberdayaan masyarakat dan penyaluran dana sosial keagamaan seperti zakat, infak, sedekah, 
                                dan wakaf.  </p>
                            <div class="mt-auto pt-6 border-t border-slate-50">
                                <a href="https://www.instagram.com/baitul_maal_bmtnu_ngasem/?hl=en" target="_blank" class="inline-flex w-full items-center justify-center gap-2 px-5 py-3 bg-slate-50 hover:bg-amber-500 text-slate-700 hover:text-white rounded-xl text-sm font-bold transition-all duration-300 group-hover:shadow-lg group-hover:shadow-amber-500/25">
                                    <span>Kunjungi Media Sosial</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                <!-- karya 15 -->
                    <div class="reveal group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-emerald-500/10 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full delay-100">
                        <div class="relative h-64 overflow-hidden bg-slate-100">
                            <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                            <img src="{{ asset('images/institute.png') }}" alt="institute" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            <div class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur text-blue-600 p-2.5 rounded-2xl shadow-sm">
                                <i data-lucide="briefcase" class="w-5 h-5"></i>
                            </div>
                        </div>
                        
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-blue-600 transition-colors">BMT NU Ngasem Institute </h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4">
                            Lembaga ini didirikan dengan tujuan utama untuk memberikan 
                            pelayanan pemberdayaan kepada masyarakat, khususnya dalam 
                            meningkatkan kapasitas pelaku usaha mikro, kecil, dan menengah 
                            (UMKM), baik dari kalangan anggota BMT NU Ngasem maupun 
                            masyarakat umum. </p>
                                <div class="mt-auto pt-6 border-t border-slate-50">
                                <a href="https://www.instagram.com/bmtnu_institute/?hl=en" target="_blank" class="inline-flex w-full items-center justify-center gap-2 px-5 py-3 bg-slate-50 hover:bg-amber-500 text-slate-700 hover:text-white rounded-xl text-sm font-bold transition-all duration-300 group-hover:shadow-lg group-hover:shadow-amber-500/25">
                                    <span>Kunjungi Media Sosial</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-7">

                 <!-- karya 16 -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"> 
                        <div class="reveal group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-amber-500/10 hover:-translate-y-2 transition-all duration-300 flex flex-col h-full">
                            <div class="relative h-64 overflow-hidden bg-slate-100">
                                <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                                <img src="{{ asset('images/pijat.png') }}" alt="pijat" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                                <div class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur text-amber-600 p-2.5 rounded-2xl shadow-sm">
                                    <i data-lucide="heart" class="w-5 h-5"></i>
                                </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-amber-600 transition-colors">Pijat Ajib & Ajaib</h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-4">
                               layanan pijat refleksi cocok bagi mereka yang membutuhkan relaksasi dan penyegaran 
                                tubuh setelah lelah beraktivitas.
                            </p>
                            <div class="mt-auto pt-6 border-t border-slate-50">
                                <a href="https://www.airnuberkah.com/" target="_blank" class="inline-flex w-full items-center justify-center gap-2 px-5 py-3 bg-slate-50 hover:bg-amber-500 text-slate-700 hover:text-white rounded-xl text-sm font-bold transition-all duration-300 group-hover:shadow-lg group-hover:shadow-amber-500/25">
                                    <span>Kunjungi Media Sosial</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
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
        // Init Lucide Icons
        lucide.createIcons();

        // Navbar Scroll Effect
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('navbar');
            if (window.scrollY > 20) {
                nav.classList.add('bg-white/95', 'shadow-md');
            } else {
                nav.classList.remove('bg-white/95', 'shadow-md');
            }
        });

        // Dropdown Logic
        const dropdownBtn = document.getElementById('lang-dropdown-btn');
        const dropdownMenu = document.getElementById('lang-dropdown-menu');

        if(dropdownBtn && dropdownMenu) {
            dropdownBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const isHidden = dropdownMenu.classList.contains('hidden');
                if(isHidden) {
                    dropdownMenu.classList.remove('hidden');
                    setTimeout(() => {
                        dropdownMenu.classList.remove('opacity-0', 'scale-95');
                    }, 10);
                } else {
                    dropdownMenu.classList.add('opacity-0', 'scale-95');
                    setTimeout(() => dropdownMenu.classList.add('hidden'), 200);
                }
            });

            document.addEventListener('click', () => {
                dropdownMenu.classList.add('opacity-0', 'scale-95');
                setTimeout(() => dropdownMenu.classList.add('hidden'), 200);
            });
        }

        // Mobile Menu Logic
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');

        if(mobileBtn && mobileMenu) {
            mobileBtn.addEventListener('click', () => {
                const isHidden = mobileMenu.classList.contains('hidden');
                mobileMenu.classList.toggle('hidden');
                menuIcon.setAttribute('data-lucide', isHidden ? 'x' : 'menu');
                lucide.createIcons();
            });
        }

        // Intersection Observer for Reveal Animation
        const observerOptions = { threshold: 0.1 };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    </script>
</body>
</html>