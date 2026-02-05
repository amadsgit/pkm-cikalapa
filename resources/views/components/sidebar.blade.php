<aside :class="{ '-translate-x-full': !sidebarOpen }"
    class="bg-gradient-to-b from-teal-200 via-teal-400 to-teal-500 text-white shadow-xl fixed inset-y-0 left-0 transform md:relative md:translate-x-0 transition-all duration-300 ease-in-out z-50 flex flex-col w-50">

    <!-- Logo -->
    <div class="p-6 flex items-center bg-teal-500 border-b border-sky-100">
        <img src="{{ asset('images/logosubang.png') }}" alt="Logo" class="w-9 h-9 mr-2">
        <h1 class="font-bold text-white tracking-wide leading-tight">PKM CIKALAPA</h1>
    </div>

    <!-- Scrollable Menu -->
    <div class="flex-1 overflow-y-auto py-4">
        <nav class="space-y-2 text-sm font-medium">

            <!-- Label -->
            <p class="px-6 text-xs font-semibold text-black uppercase tracking-wider">Home</p>

            <!-- DASHBOARD -->
            @if(Auth::user()->hasRole(['administrator']))
            <a href="{{ route('dashboard.admin') }}" class="flex items-center gap-3 px-6 py-3 rounded-lg transition
                      {{ request()->routeIs('dashboard.admin') 
                          ? 'bg-white text-sky-600 font-semibold shadow-sm' 
                          : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                <i class="ph ph-gauge text-lg"></i>
                <span>Dashboard</span>
            </a>
            @endif

            @if(Auth::user()->hasRole(['author']))
            <a href="{{ route('dashboard.author') }}" class="flex items-center gap-3 px-6 py-3 rounded-lg transition
                      {{ request()->routeIs('dashboard.author') 
                          ? 'bg-white text-sky-600 font-semibold shadow-sm' 
                          : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                <i class="ph ph-gauge text-lg"></i>
                <span>Dashboard</span>
            </a>
            @endif

            <!-- Label -->
            <p class="px-6 mt-4 text-xs font-semibold text-black uppercase tracking-wider">Portal Web Puskesmas</p>

            @if(Auth::user()->hasRole(['administrator']))
            <!-- Tentang Puskesmas -->
            <details class="group" {{ request()->routeIs('admin.profilePuskesmas*') ||
                request()->routeIs('admin.geografisPuskesmas*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-6 py-3 cursor-pointer rounded-lg transition
                    {{ request()->routeIs('admin.profilePuskesmas*') || request()->routeIs('admin.geografisPuskesmas*') 
                        ? 'bg-white text-sky-600 font-semibold shadow-sm' 
                        : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                    <i class="ph ph-hospital text-lg"></i>
                    <span>Tentang Puskesmas</span>
                    <i class="ml-auto ph ph-caret-down transition group-open:rotate-180"></i>
                </summary>
            
                <div class="pl-12 mt-1 space-y-1">
                    <!-- Profil Puskesmas -->
                    <a href="{{ route('admin.profilePuskesmas') }}" class="block py-2 rounded-lg px-3 transition
                        {{ request()->routeIs('admin.profilePuskesmas*') 
                            ? 'bg-emerald-100 text-sky-600 font-semibold shadow-sm' 
                            : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                        <i class="ph ph-hospital text-[15px]"></i> Profile Puskesmas
                    </a>
            
                    <!-- Batas Wilayah -->
                    <a href="{{ route('admin.geografisPuskesmas') }}" class="block py-2 rounded-lg px-3 transition 
                        {{ request()->routeIs('admin.geografisPuskesmas*') 
                            ? 'bg-emerald-100 text-sky-600 font-semibold shadow-sm' 
                            : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                        <i class="ph ph-map-pin text-[15px]"></i> Geografis Puskesmas
                    </a>
                </div>
            </details>
            @endif

            @if(Auth::user()->hasRole(['administrator', 'author']))
            <!-- Informasi Publik -->
            <details class="group" {{ request()->routeIs('informasiPublik*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-6 py-3 cursor-pointer rounded-lg transition
                                    {{ request()->routeIs('informasiPublik*')
                                        ? 'bg-white text-sky-600 font-semibold shadow-sm' 
                                        : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                    <i class="ph ph-newspaper text-lg"></i>
                    <span>Informasi Publik</span>
                    <i class="ml-auto ph ph-caret-down transition group-open:rotate-180"></i>
                </summary>
                <div class="pl-12 mt-1 space-y-1">
                    <a href="{{ route('informasiPublik.index') }}" class="block py-2 rounded-lg px-3 transition 
                                    {{ request()->routeIs('informasiPublik.index*') 
                                        ? 'bg-emerald-100 text-sky-600 font-semibold shadow-sm' 
                                        : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                        <i class="ph ph-pencil text-[15px]"></i> Berita & Informasi
                    </a>
                    <a href="#" class="block py-2 rounded-lg px-3 transition 
                                    {{ request()->routeIs('informasiPublik.kategori*') 
                                        ? 'bg-emerald-100 text-sky-600 font-semibold shadow-sm' 
                                        : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                        <i class="ph ph-tag text-[15px]"></i> Kategori Informasi
                    </a>
                </div>
            </details>
            <!-- Agenda Kegiatan -->
            <details class="group" {{ request()->routeIs('agendaKegiatan*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-6 py-3 cursor-pointer rounded-lg transition
                                    {{ request()->routeIs('agendaKegiatan*')
                                        ? 'bg-white text-sky-600 font-semibold shadow-sm' 
                                        : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                    <i class="ph ph-newspaper text-lg"></i>
                    <span>Agenda Kegiatan</span>
                    <i class="ml-auto ph ph-caret-down transition group-open:rotate-180"></i>
                </summary>
                <div class="pl-12 mt-1 space-y-1">
                    <a href="{{ route('agendaKegiatan.index') }}" class="block py-2 rounded-lg px-3 transition 
                                    {{ request()->routeIs('agendaKegiatan.index*') 
                                        ? 'bg-emerald-100 text-sky-600 font-semibold shadow-sm' 
                                        : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                        <i class="ph ph-pencil text-[15px]"></i> Agenda Kegiatan
                    </a>
                    <a href="#" class="block py-2 rounded-lg px-3 transition 
                                    {{ request()->routeIs('agendaKegiatan.kategori*') 
                                        ? 'bg-emerald-100 text-sky-600 font-semibold shadow-sm' 
                                        : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                        <i class="ph ph-tag text-[15px]"></i> Kategori Kegiatan
                    </a>
                </div>
            </details>
            @endif

            @if(Auth::user()->hasRole(['administrator']))
            <!-- Layanan Publik -->
            {{-- <details class="group">
                <summary
                    class="flex items-center gap-3 px-6 py-3 cursor-pointer rounded-lg text-gray-700 hover:bg-sky-50 hover:text-sky-600 transition">
                    <i class="ph ph-users-three text-lg"></i>
                    <span>Layanan Publik</span>
                    <i class="ml-auto ph ph-caret-down transition group-open:rotate-180"></i>
                </summary>
                <div class="pl-12 mt-1 space-y-1">
                    <a href="pengaduan" class="block py-2 hover:text-sky-600">🗣️ Kelola Pengaduan</a>
                    <a href="layanan-puskesmas" class="block py-2 hover:text-sky-600">📋 Informasi Layanan</a>
                </div>
            </details> --}}

            <!-- Label -->
            <p class="px-6 mt-4 text-xs font-semibold text-black uppercase tracking-wider">Manajemen Puskesmas</p>

            <!-- Master Data -->
            {{-- <details class="group">
                <summary
                    class="flex items-center gap-3 px-6 py-3 cursor-pointer rounded-lg text-gray-700 hover:bg-sky-50 hover:text-sky-600 transition">
                    <i class="ph ph-database text-lg"></i>
                    <span>Master Data</span>
                    <i class="ml-auto ph ph-caret-down transition group-open:rotate-180"></i>
                </summary>
            </details> --}}

            <!-- Ketatausahaan -->
            
            <details class="group" {{ request()->routeIs('admin.ketatausahaan.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-6 py-3 cursor-pointer rounded-lg transition
                           {{ request()->routeIs('admin.ketatausahaan.*') 
                               ? 'bg-white text-sky-600 font-semibold shadow-sm' 
                               : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                    <i class="ph ph-identification-badge text-lg"></i>
                    <span>Ketatausahaan</span>
                    <i class="ml-auto ph ph-caret-down transition group-open:rotate-180"></i>
                </summary>
                <div class="pl-12 mt-1 space-y-1">
                    <a href="{{ route('admin.ketatausahaan.pegawai') }}" class="block py-2 rounded-lg px-3 transition
                              {{ request()->routeIs('admin.ketatausahaan.pegawai') 
                                  ? 'bg-emerald-100 text-sky-600 font-semibold shadow-sm' 
                                  : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                        🧑‍💼 Data Kepegawaian
                    </a>
                </div>
            </details>

            <!-- Label -->
            <p class="px-6 mt-4 text-xs font-semibold text-black uppercase tracking-wider">Administrasi Sistem</p>

            <!-- Pengaturan Akun -->
            <details class="group" {{ request()->routeIs('roles.*') || request()->routeIs('users.*') ? 'open' : '' }}>
                <summary class="flex items-center gap-3 px-6 py-3 cursor-pointer rounded-lg transition
                    {{ request()->routeIs('roles.*') || request()->routeIs('users.*') 
                        ? 'bg-white text-sky-600 font-semibold shadow-sm' 
                        : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                    <i class="ph ph-gear text-lg"></i>
                    <span>Pengaturan User</span>
                    <i class="ml-auto ph ph-caret-down transition group-open:rotate-180"></i>
                </summary>
            
                <div class="pl-12 mt-1 space-y-1">
                    <!-- Role -->
                    <a href="{{ route('roles.index') }}" class="block py-2 rounded-lg px-3 transition
                        {{ request()->routeIs('roles.*') 
                            ? 'bg-emerald-100 text-sky-600 font-semibold shadow-sm' 
                            : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                        🛡️ Role
                    </a>
            
                    <!-- User -->
                    <a href="{{ route('users.index') }}" class="block py-2 rounded-lg px-3 transition
                        {{ request()->routeIs('users.*') 
                            ? 'bg-emerald-100 text-sky-600 font-semibold shadow-sm' 
                            : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                        👤 User
                    </a>
                </div>
            </details>

            <!-- Label -->
            <p class="px-6 mt-4 text-xs font-semibold text-black uppercase tracking-wider">Email Client</p>

            <!-- Email -->
            <details class="group">
                <summary
                    class="flex items-center gap-3 px-6 py-3 cursor-pointer rounded-lg text-gray-700 hover:bg-sky-50 hover:text-sky-600 transition">
                    <i class="ph ph-envelope-simple text-lg"></i>
                    <span>Email</span>
                    <i class="ml-auto ph ph-caret-down transition group-open:rotate-180"></i>
                </summary>
                <div class="pl-12 mt-1 space-y-1">
                    <a href="#" class="block py-2 hover:text-sky-600">✍️ Compose</a>
                    <a href="#" class="block py-2 hover:text-sky-600">📖 Read</a>
                    <a href="#" class="block py-2 hover:text-sky-600">📥 Inbox</a>
                </div>
            </details>
            @endif
        </nav>
    </div>
</aside>