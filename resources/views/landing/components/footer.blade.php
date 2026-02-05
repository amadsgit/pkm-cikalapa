<footer class="relative bg-gradient-to-br from-emerald-600 via-teal-600 to-sky-600 text-white">
    <!-- Back to top button -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <button id="back-to-top"
            class="absolute -top-5 right-8 bg-white/20 hover:bg-white/30 backdrop-blur-md text-white rounded-full p-3 shadow-lg transition-all duration-300 transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-white/50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </button>
    </div>

    <!-- Main footer content -->
    <div class="max-w-7xl mx-auto py-14 px-6 sm:px-8 lg:px-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Kolom 1: Tentang -->
            <div>
                <h3
                    class="text-lg font-semibold tracking-wider uppercase relative inline-block after:absolute after:w-full after:h-0.5 after:bg-gradient-to-r from-emerald-400 to-sky-400 after:bottom-0 after:left-0 pb-2">
                    Tentang Puskesmas
                </h3>
                <div class="mt-6">
                    <img src="{{ asset('storage/' . $profile->logo) }}" alt="Puskesmas Cikalapa"
                        class="h-16 w-auto mb-4 object-contain">
                    <p class="text-lg font-medium mb-2">Puskesmas Cikalapa</p>
                    <p class="text-sm text-emerald-50/90">
                        Memberikan pelayanan kesehatan masyarakat yang berkualitas, ramah, dan mudah diakses.
                    </p>

                    <div class="mt-4 space-y-3">
                        <p class="flex items-center group">
                            <span
                                class="flex items-center justify-center bg-white/20 text-white h-9 w-9 rounded-full mr-3 group-hover:bg-white/40 transition duration-300">
                                <i class="fas fa-phone-alt"></i>
                            </span>
                            <span class="group-hover:text-white transition duration-300">(0260) 4240665</span>
                        </p>
                        <p class="flex items-center group">
                            <span
                                class="flex items-center justify-center bg-white/20 text-white h-9 w-9 rounded-full mr-3 group-hover:bg-white/40 transition duration-300">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <span class="group-hover:text-white transition duration-300">
                                puskesmascikalapa@gmail.com
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Kolom 2: Akses Cepat -->
            <div>
                <h3
                    class="text-lg font-semibold tracking-wider uppercase relative inline-block after:absolute after:w-full after:h-0.5 after:bg-gradient-to-r from-emerald-400 to-sky-400 after:bottom-0 after:left-0 pb-2">
                    Akses Cepat
                </h3>
                <ul class="mt-6 space-y-3">
                    <li><a href="/" class="flex items-center hover:translate-x-1 transition-all duration-300">
                            <span class="w-2 h-2 bg-white rounded-full mr-2"></span> Beranda
                        </a></li>
                    <li><a href="{{ route('profil') }}" class="flex items-center hover:translate-x-1 transition-all duration-300">
                            <span class="w-2 h-2 bg-white rounded-full mr-2"></span> Profil Puskesmas
                        </a></li>
                    <li><a href="{{ route('informasi') }}" class="flex items-center hover:translate-x-1 transition-all duration-300">
                            <span class="w-2 h-2 bg-white rounded-full mr-2"></span> Informasi & Artikel Kesehatan
                        </a></li>
                    <li><a href="#" class="flex items-center hover:translate-x-1 transition-all duration-300">
                            <span class="w-2 h-2 bg-white rounded-full mr-2"></span> Agenda & Kegiatan
                        </a></li>
                    <li><a href="#" class="flex items-center hover:translate-x-1 transition-all duration-300">
                            <span class="w-2 h-2 bg-white rounded-full mr-2"></span> Kontak
                        </a></li>
                </ul>
            </div>

            <!-- Kolom 3: Layanan -->
            <div>
                <h3
                    class="text-lg font-semibold tracking-wider uppercase relative inline-block after:absolute after:w-full after:h-0.5 after:bg-gradient-to-r from-emerald-400 to-sky-400 after:bottom-0 after:left-0 pb-2">
                    Layanan Puskesmas
                </h3>
            
                <ul class="mt-6 space-y-3">
                    @forelse($klaster as $item)
                    <li>
                        <a href="#" class="flex items-center hover:translate-x-1 transition-all duration-300">
                            <span class="w-2 h-2 bg-white rounded-full mr-2"></span>
                            <span class="font-medium">{{ $item->nama }}</span>
                        </a>
                        <!-- Deskripsi (opsional, bisa toggle/tooltip) -->
                        {{-- <p class="text-gray-200 text-sm ml-5 mt-1">{{ $item->deskripsi }}</p> --}}
                    </li>
                    @empty
                    <li class="text-gray-400">Belum ada layanan yang tersedia.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <div class="mt-12 border-t border-white/20 pt-6 flex flex-col md:flex-row items-center justify-between">
            <p class="text-sm text-emerald-50">&copy; 2025 Puskesmas Cikalapa Kabupaten Subang. All Right Reserve. 
                powered: <a href="https://amdcom.vercel.app/" target="_blank">AMDCOM</a>
                build with <i class="fa fa-heart" style="color: red;"></i> 
                by <a href="https://amadsgit.github.io/mamad-ahmad-portofolio/" target="_blank">M Ahmad</a> </p>
            <div class="mt-4 md:mt-0 flex space-x-4">
                <a href="#" class="hover:text-sky-200 transition"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-sky-200 transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-sky-200 transition"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const backToTopButton = document.getElementById('back-to-top');
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopButton.classList.remove('opacity-0');
            backToTopButton.classList.add('opacity-100');
        } else {
            backToTopButton.classList.remove('opacity-100');
            backToTopButton.classList.add('opacity-0');
        }
    });
    backToTopButton.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});
</script>