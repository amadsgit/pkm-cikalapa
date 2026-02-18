<!DOCTYPE html>
<html lang="id">

<head>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logopkm.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logopkm.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logopkm.png') }}">
    <!-- Preconnect -->
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="zZbL2OOZi9K5g3Wful7tb8TkzLW15IvErdPHgnTk">

    <!-- SEO Tags -->
    <title>UPTD Puskesmas Cikalapa</title>
    <meta name="description"
        content="Website Resmi Puskesmas Cikalapa - Informasi dan layanan kesehatan masyarakat dalam genggaman">
    <meta name="keywords"
        content="puskesmas digital, layanan kesehatan, Puskesmas Cikalapa, layanan masyarakat, posyandu, posbindu">
    <meta name="author" content="Puskesmas Cikalapa">
    <meta name="theme-color" content="#047857">

    <!-- Fonts - Upgraded with modern combinations -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Scripts & Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('css/landing/landingpage.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    {{-- <link href="{{ asset('css/landing/aos.css') }}" rel="stylesheet"> --}}
    <script src="{{ asset('js/landing/landingpage.js') }}" defer></script>
    <!-- CSS Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="{{ asset('js/landing/aos.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @stack('style')
</head>

<body class="font-sans antialiased bg-gray-50">
    <!-- Subtle background pattern using SVG instead of image -->
    <div class="fixed inset-0 -z-10 bg-dots-pattern opacity-10"></div>

    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        @include('landing.components.header')

        <!-- Main Content Area with improved spacing -->
        <main class="flex-grow bg-white">
            @yield('content')
        </main>
        
    </div>
    @stack('script')
    <!-- Tombol Buka Statistik -->
    <button id="openStatWidget"
        class="fixed top-1/3 left-0 bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-r-xl shadow-lg flex items-center gap-2 transition-all duration-300 z-40">
        <i class="fa-solid fa-chart-line"></i>
        <span class="hidden md:inline"></span>
    </button>
    
    <!-- Tombol Buka Disabilitas -->
    <button id="openAccessWidget"
        class="fixed top-1/2 left-0 bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-r-xl shadow-lg flex items-center gap-2 transition-all duration-300 z-40">
        <i class="fa-solid fa-universal-access"></i>
        <span class="hidden md:inline"></span>
    </button>
    
    <!-- Widget Statistik Pengunjung -->
    <div id="statWidget"
        class="fixed top-1/3 left-0 transform -translate-x-full bg-white shadow-xl rounded-r-2xl w-72 transition-transform duration-300 ease-in-out z-50 border border-gray-200">
        <div class="p-5">
            <h2 class="text-green-700 font-semibold text-lg mb-4 flex items-center gap-2 border-b pb-2">
                <i class="fa-solid fa-chart-line"></i>
                Statistik Pengunjung
            </h2>
            <ul class="text-gray-700 text-sm space-y-3">
                <li class="flex justify-between">
                    <span>Total Kunjungan:</span>
                    <span class="font-medium">-</span>
                </li>
                <li class="flex justify-between">
                    <span>Hari Ini:</span>
                    <span class="font-medium">-</span>
                </li>
                <li class="flex justify-between">
                    <span>Minggu Ini:</span>
                    <span class="font-medium">-</span>
                </li>
                <li class="flex justify-between">
                    <span>Bulan Ini:</span>
                    <span class="font-medium">-</span>
                </li>
                <li class="flex justify-between">
                    <span>Online Saat Ini:</span>
                    <span class="font-medium text-green-600">-</span>
                </li>
            </ul>
        </div>
        <!-- Tombol Tutup -->
        <button id="closeStatWidget"
            class="absolute -right-0 top-1/2 transform -translate-y-1/2 bg-red-500 hover:bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md">
            <i class="fa-solid fa-xmark text-xs"></i>
        </button>
    </div>
    
    <!-- Widget Fitur Disabilitas -->
    <div id="accessWidget"
        class="fixed top-1/2 left-0 transform -translate-x-full bg-white shadow-xl rounded-r-2xl w-72 transition-transform duration-300 ease-in-out z-50 border border-gray-200">
        <div class="p-5">
            <h3 class="text-blue-700 font-semibold text-lg mb-4 flex items-center gap-2 border-b pb-2">
                <i class="fa-solid fa-universal-access"></i>
                Fitur Disabilitas
            </h3>
            <div class="flex flex-wrap gap-2 text-sm">
                <button id="btnIncreaseFont"
                    class="px-3 py-1.5 bg-green-500 hover:bg-green-600 text-white rounded-lg shadow-sm transition">A+</button>
                <button id="btnDecreaseFont"
                    class="px-3 py-1.5 bg-green-500 hover:bg-green-600 text-white rounded-lg shadow-sm transition">A-</button>
                <button id="btnHighContrast"
                    class="px-3 py-1.5 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg shadow-sm transition">Kontras</button>
                <button id="btnReadPage"
                    class="px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow-sm transition">🔊 Baca
                    Halaman</button>
            </div>
        </div>
        <button id="closeAccessWidget"
            class="absolute -right-0 top-1/2 transform -translate-y-1/2 bg-red-500 hover:bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md">
            <i class="fa-solid fa-xmark text-xs"></i>
        </button>
    </div>
    
    <!-- Script -->
    <script>
        const statWidget = document.getElementById('statWidget');
        const accessWidget = document.getElementById('accessWidget');
        const openStat = document.getElementById('openStatWidget');
        const openAccess = document.getElementById('openAccessWidget');
        const closeStat = document.getElementById('closeStatWidget');
        const closeAccess = document.getElementById('closeAccessWidget');
    
        // === Animasi Widget Statistik ===
        openStat.addEventListener('click', () => {
            statWidget.classList.remove('-translate-x-full');
            statWidget.classList.add('translate-x-0');
            openStat.classList.add('-translate-x-full', 'opacity-0');
            setTimeout(() => openStat.style.display = 'none', 300);
        });
    
        closeStat.addEventListener('click', () => {
            statWidget.classList.remove('translate-x-0');
            statWidget.classList.add('-translate-x-full');
            setTimeout(() => {
                openStat.style.display = 'flex';
                openStat.classList.remove('-translate-x-full', 'opacity-0');
            }, 300);
        });
    
        // === Animasi Widget Disabilitas ===
        openAccess.addEventListener('click', () => {
            accessWidget.classList.remove('-translate-x-full');
            accessWidget.classList.add('translate-x-0');
            openAccess.classList.add('-translate-x-full', 'opacity-0');
            setTimeout(() => openAccess.style.display = 'none', 300);
        });
    
        closeAccess.addEventListener('click', () => {
            accessWidget.classList.remove('translate-x-0');
            accessWidget.classList.add('-translate-x-full');
            setTimeout(() => {
                openAccess.style.display = 'flex';
                openAccess.classList.remove('-translate-x-full', 'opacity-0');
            }, 300);
        });
    
        // === Fitur Disabilitas ===
        let currentFontSize = 100;
        const body = document.body;
    
        // Perbesar teks
        document.getElementById('btnIncreaseFont').addEventListener('click', () => {
            currentFontSize += 10;
            body.style.fontSize = currentFontSize + '%';
        });
    
        // Perkecil teks
        document.getElementById('btnDecreaseFont').addEventListener('click', () => {
            if (currentFontSize > 70) {
                currentFontSize -= 10;
                body.style.fontSize = currentFontSize + '%';
            }
        });
    
        // Mode kontras tinggi
        let isHighContrast = false;
        document.getElementById('btnHighContrast').addEventListener('click', () => {
            isHighContrast = !isHighContrast;
            document.documentElement.classList.toggle('contrast-mode', isHighContrast);
        });
    
        // === Text to Speech ===
        const btnRead = document.getElementById('btnReadPage');
        btnRead.addEventListener('click', () => {
            const text = document.body.innerText;
            const speech = new SpeechSynthesisUtterance(text);
            speech.lang = 'id-ID';
            window.speechSynthesis.cancel(); // hentikan yang sedang bicara
            window.speechSynthesis.speak(speech);
        });
    
    
        window.addEventListener('load', () => {
            // Ambil path URL, contoh: "/", "/layanan", "/profil"
            const path = window.location.pathname;
        
            // Jika path hanya "/" (halaman utama), maka jalankan suara
            if (path === '/' || path === '') {
                const welcome = new SpeechSynthesisUtterance("Selamat datang di platform Puskesmas Digital UPTD Puskesmas Cikalapa");
                welcome.lang = 'id-ID';
                setTimeout(() => window.speechSynthesis.speak(welcome), 800);
            }
        });
    </script>
    
    <!-- Gaya tambahan untuk kontras tinggi -->
    <style>
        .contrast-mode {
            background-color: #000 !important;
            color: #fff !important;
        }
    
        .contrast-mode a {
            color: #ffeb3b !important;
        }
    
        .contrast-mode img {
            filter: brightness(0.8) contrast(1.2);
        }
    
        #statWidget,
        #accessWidget {
            backdrop-filter: blur(12px);
        }
    </style>

    <!-- Widget Hotline WhatsApp -->
        <!-- Widget Hotline WhatsApp -->
        <div class="fixed bottom-6 right-6 flex items-center gap-3 z-50">
        
            <!-- Text typing -->
            <div
                class="bg-white px-4 py-2 rounded-lg shadow-lg text-sm font-semibold text-gray-700 overflow-hidden whitespace-nowrap">
                <span id="typing-text"></span>
                <span class="typing-cursor">|</span>
            </div>
        
            <!-- Button WhatsApp -->
            <a href="https://wa.me/6282116869141?text=Halo%20Puskesmas%20Cikalapa%2C%20saya%20ingin%20bertanya%20tentang%20layanan%20kesehatan."
                target="_blank"
                class="relative bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg flex items-center justify-center w-14 h-14 transition-all duration-300 ease-in-out"
                title="Hubungi Kami di WhatsApp">
        
                <i class="fab fa-whatsapp text-3xl"></i>
            </a>
        </div>
        
        <!-- Efek animasi berdenyut (opsional, biar menarik perhatian) -->
        <style>
            /* Cursor kedip */
            .typing-cursor {
                animation: blink 1s infinite;
            }
        
            @keyframes blink {
        
                0%,
                50%,
                100% {
                    opacity: 1;
                }
        
                25%,
                75% {
                    opacity: 0;
                }
            }
        
            /* Pulse Ring */
            .pulse-ring {
                position: absolute;
                width: 3.5rem;
                height: 3.5rem;
                border: 2px solid #22c55e;
                border-radius: 50%;
                animation: pulse 1.5s infinite;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: -1;
            }
        
            @keyframes pulse {
                0% {
                    transform: translate(-50%, -50%) scale(0.9);
                    opacity: 0.7;
                }
        
                70% {
                    transform: translate(-50%, -50%) scale(1.4);
                    opacity: 0;
                }
        
                100% {
                    transform: translate(-50%, -50%) scale(0.9);
                    opacity: 0;
                }
            }
        </style>
        
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Pulse ring
                const whatsappBtn = document.querySelector('a[href*="wa.me"]');
                const pulseRing = document.createElement('span');
                pulseRing.classList.add('pulse-ring');
                whatsappBtn.appendChild(pulseRing);
        
                // Typing animation
                const text = "Hubungi kami di WhatsApp..";
                const typingText = document.getElementById("typing-text");
        
                let index = 0;
                let isDeleting = false;
        
                function typeEffect() {
                    if (!isDeleting) {
                        typingText.textContent = text.substring(0, index + 1);
                        index++;
                        if (index === text.length) {
                            setTimeout(() => isDeleting = true, 1500);
                        }
                    } else {
                        typingText.textContent = text.substring(0, index - 1);
                        index--;
                        if (index === 0) {
                            isDeleting = false;
                        }
                    }
                    setTimeout(typeEffect, isDeleting ? 50 : 100);
                }
        
                typeEffect();
            });
        </script>
</body>

</html>