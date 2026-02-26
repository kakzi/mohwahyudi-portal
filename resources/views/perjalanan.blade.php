<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jejak Langkah - Moh Wahyudi</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .reveal { opacity: 0; transform: translateY(30px); transition: all 0.8s ease-out; }
        .reveal.active { opacity: 1; transform: translateY(0); }
        .timeline-line { height: calc(100% - 20px); }
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
                           class="px-4 py-2 rounded-full text-sm font-bold text-teal-600 bg-teal-50 transition-all">
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

    <section class="pt-32 pb-20 bg-linear-to-b from-white to-slate-50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
            <span class="inline-block px-4 py-1.5 mb-4 text-xs font-extrabold tracking-widest text-teal-700 uppercase bg-teal-50 rounded-full border border-teal-100">Biografi & Milestones</span>
            <h1 class="text-4xl md:text-6xl font-black text-slate-900 mb-6 tracking-tight">Jejak Langkah <span class="text-teal-600">Perjuangan</span></h1>
            <p class="text-slate-500 max-w-2xl mx-auto text-lg leading-relaxed">Dari keluarga sederhana di Pasuruan hingga membangun kemandirian ekonomi umat di Bojonegoro.</p>
        </div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full opacity-10 pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-teal-400 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-10 right-10 w-72 h-72 bg-amber-400 rounded-full blur-[120px]"></div>
        </div>
    </section>

    <section class="pb-32 bg-slate-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6">
            <div class="relative">
                <div class="absolute left-4 md:left-1/2 transform md:-translate-x-1/2 w-1 bg-slate-200 timeline-line rounded-full"></div>

                <div class="space-y-16">
                    
                    <div class="relative flex flex-col md:flex-row items-center reveal">
                        <div class="flex justify-start md:justify-end w-full md:w-1/2 md:pr-12 pl-12 md:pl-0">
                            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 text-left md:text-right transition-all hover:shadow-md">
                                <span class="text-teal-600 font-black text-xl">1974</span>
                                <h3 class="text-xl font-extrabold text-slate-800 mt-2">Kelahiran & Akar Keluarga</h3>
                                <p class="text-slate-500 mt-3 text-sm leading-relaxed">Lahir pada 24 November 1974 di Desa Sengkan, Pasuruan. Tumbuh di tengah keluarga sederhana dari pasangan Bapak Da'i (buruh pabrik) dan Ibu Siti Aminah.</p>
                            </div>
                        </div>
                        <div class="absolute left-0 md:left-1/2 transform md:-translate-x-1/2 w-10 h-10 rounded-full bg-teal-600 border-4 border-white shadow-xl flex items-center justify-center text-white z-10">
                            <i data-lucide="baby" class="w-5 h-5"></i>
                        </div>
                        <div class="hidden md:block w-1/2"></div>
                    </div>

                    <div class="relative flex flex-col md:flex-row items-center reveal">
                        <div class="hidden md:block w-1/2"></div>
                        <div class="absolute left-0 md:left-1/2 transform md:-translate-x-1/2 w-10 h-10 rounded-full bg-amber-500 border-4 border-white shadow-xl flex items-center justify-center text-white z-10">
                            <i data-lucide="book-marked" class="w-5 h-5"></i>
                        </div>
                        <div class="flex justify-start w-full md:w-1/2 md:pl-12 pl-12">
                            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 transition-all hover:shadow-md">
                                <span class="text-amber-500 font-black text-xl">1987</span>
                                <h3 class="text-xl font-extrabold text-slate-800 mt-2">Menghafal Al-Quran</h3>
                                <p class="text-slate-500 mt-3 text-sm leading-relaxed">Mulai menghafal Al-Quran sejak kelas 4 SD di bawah bimbingan KH. Dzulhilmi Ghozali Al-Hafiz di Pondok Pesantren Al Mas’udi.</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative flex flex-col md:flex-row items-center reveal">
                        <div class="flex justify-start md:justify-end w-full md:w-1/2 md:pr-12 pl-12 md:pl-0">
                            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 text-left md:text-right transition-all hover:shadow-md">
                                <span class="text-blue-600 font-black text-xl">1996</span>
                                <h3 class="text-xl font-extrabold text-slate-800 mt-2">Pendidikan Tinggi</h3>
                                <p class="text-slate-500 mt-3 text-sm leading-relaxed">Melanjutkan kuliah di IAIN Sunan Ampel Surabaya (Fakultas Syariah). Aktif memperdalam Bahasa Arab di Madrasatul Alsun.</p>
                            </div>
                        </div>
                        <div class="absolute left-0 md:left-1/2 transform md:-translate-x-1/2 w-10 h-10 rounded-full bg-blue-600 border-4 border-white shadow-xl flex items-center justify-center text-white z-10">
                            <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                        </div>
                        <div class="hidden md:block w-1/2"></div>
                    </div>

                    <div class="relative flex flex-col md:flex-row items-center reveal">
                        <div class="hidden md:block w-1/2"></div>
                        <div class="absolute left-0 md:left-1/2 transform md:-translate-x-1/2 w-10 h-10 rounded-full bg-emerald-500 border-4 border-white shadow-xl flex items-center justify-center text-white z-10">
                            <i data-lucide="heart-handshake" class="w-5 h-5"></i>
                        </div>
                        <div class="flex justify-start w-full md:w-1/2 md:pl-12 pl-12">
                            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 transition-all hover:shadow-md">
                                <span class="text-emerald-600 font-black text-xl">2006 - 2007</span>
                                <h3 class="text-xl font-extrabold text-slate-800 mt-2">Dedikasi Sosial & Edukasi</h3>
                                <p class="text-slate-500 mt-3 text-sm leading-relaxed">Mendirikan <b>LPDU</b> untuk kesejahteraan guru ngaji dan <b>PGTPQ</b> gratis selama satu tahun untuk mencetak pengajar Qurani berkualitas.</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative flex flex-col md:flex-row items-center reveal">
                        <div class="flex justify-start md:justify-end w-full md:w-1/2 md:pr-12 pl-12 md:pl-0">
                            <div class="bg-teal-600 p-6 rounded-3xl shadow-xl text-left md:text-right transform hover:scale-105 transition-transform text-white">
                                <span class="text-teal-200 font-black text-xl">2012</span>
                                <h3 class="text-xl font-extrabold mt-2">Lahirnya BMT NU Ngasem</h3>
                                <p class="text-teal-50 mt-3 text-sm leading-relaxed">Resmi berdiri dengan 67 anggota dan modal 67 juta. Menjadi tonggak kemandirian ekonomi MWC NU Ngasem.</p>
                            </div>
                        </div>
                        <div class="absolute left-0 md:left-1/2 transform md:-translate-x-1/2 w-12 h-12 rounded-full bg-white border-4 border-teal-600 shadow-xl flex items-center justify-center text-teal-600 z-10">
                            <i data-lucide="trending-up" class="w-6 h-6"></i>
                        </div>
                        <div class="hidden md:block w-1/2"></div>
                    </div>

                    <div class="relative flex flex-col md:flex-row items-center reveal">
                        <div class="hidden md:block w-1/2"></div>
                        <div class="absolute left-0 md:left-1/2 transform md:-translate-x-1/2 w-10 h-10 rounded-full bg-amber-600 border-4 border-white shadow-xl flex items-center justify-center text-white z-10">
                            <i data-lucide="home" class="w-5 h-5"></i>
                        </div>
                        <div class="flex justify-start w-full md:w-1/2 md:pl-12 pl-12">
                            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 transition-all hover:shadow-md">
                                <span class="text-amber-600 font-black text-xl">2016</span>
                                <h3 class="text-xl font-extrabold text-slate-800 mt-2">Yayasan Hafiz Quran Indonesia</h3>
                                <p class="text-slate-500 mt-3 text-sm leading-relaxed">Mendirikan <b>YAHQI</b> yang menaungi Pesantren Hafizh Quran, IHS, Toko Santri, hingga 9 Bahasa Internasional.</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative flex flex-col md:flex-row items-center reveal">
                        <div class="flex justify-start md:justify-end w-full md:w-1/2 md:pr-12 pl-12 md:pl-0">
                            <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 text-left md:text-right transition-all hover:shadow-md">
                                <span class="text-slate-900 font-black text-xl">2025</span>
                                <h3 class="text-xl font-extrabold text-slate-800 mt-2">Gedung Penggerak Ekonomi</h3>
                                <p class="text-slate-500 mt-3 text-sm leading-relaxed">Peresmian Gedung Pusat BMT NU Ngasem seluas 4000m² oleh Sekretaris Kementerian Koperasi sebagai pusat Holding Koperasi.</p>
                            </div>
                        </div>
                        <div class="absolute left-0 md:left-1/2 transform md:-translate-x-1/2 w-10 h-10 rounded-full bg-slate-800 border-4 border-white shadow-xl flex items-center justify-center text-white z-10">
                            <i data-lucide="building-2" class="w-5 h-5"></i>
                        </div>
                        <div class="hidden md:block w-1/2"></div>
                    </div>

                    <div class="relative flex flex-col md:flex-row items-center reveal">
                        <div class="hidden md:block w-1/2"></div>
                        <div class="absolute left-0 md:left-1/2 transform md:-translate-x-1/2 w-14 h-14 rounded-full bg-linear-to-r from-amber-400 to-amber-600 border-4 border-white shadow-2xl flex items-center justify-center text-white z-10 animate-pulse">
                            <i data-lucide="rocket" class="w-7 h-7"></i>
                        </div>
                        <div class="flex justify-start w-full md:w-1/2 md:pl-12 pl-12">
                            <div class="bg-white p-8 rounded-4xl border-2 border-amber-100 shadow-2xl shadow-amber-100/50">
                                <span class="text-amber-600 font-black text-xl">2028 & Seterusnya</span>
                                <h3 class="text-2xl font-black text-slate-900 mt-2">Target 1 Triliun Aset</h3>
                                <p class="text-slate-600 mt-4 leading-relaxed font-medium">Target besar memiliki lebih dari <b>100 cabang</b> dengan aset melebihi <b>1 Triliun Rupiah</b> demi pemberdayaan nyata warga Nahdliyin.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

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
        
        // Observer for scroll animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.reveal').forEach((el) => observer.observe(el));
    </script>
</body>
</html>