<header x-data="{
        openUser: false,
        openLogout: false
    }" class="backdrop-blur-md bg-gradient-to-r from-teal-100/70 via-emerald-100/60 to-teal-200/60
           border-b border-teal-300/50 px-6 py-3 flex justify-between items-center
           shadow-md sticky top-0 z-40">

    <!-- KIRI -->
    <div class="hidden sm:flex flex-col">
        {{-- <span class="text-sm text-gray-600">
            👋 Hai, <strong>{{ Auth::user()->nama }}</strong>
        </span> --}}
        <div id="local-time" class="text-sm font-semibold text-emerald-700 bg-white/40 px-3 py-1 rounded-lg mt-1 w-fit">
        </div>
    </div>

    <!-- KANAN -->
    <div class="relative">
        <button @click="openUser = !openUser" class="flex items-center gap-3 rounded-lg hover:bg-white/40 px-2 py-1">

            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nama) }}&background=10B981&color=fff"
                class="w-9 h-9 rounded-full border-2 border-white shadow">

            <div class="hidden sm:block text-left">
                <p class="text-sm font-semibold text-gray-700">
                    {{ Auth::user()->nama }}
                </p>
                <p class="text-xs text-gray-500">
                    {{ Auth::user()->role_name }}
                </p>
            </div>

            <i class="ph ph-caret-down text-teal-700"></i>
        </button>

        <!-- DROPDOWN -->
        <div x-show="openUser" @click.away="openUser = false" x-transition
            class="absolute right-0 mt-3 w-52 bg-white rounded-xl shadow-lg py-2 z-50">
            <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-emerald-100"> <i class="ph ph-user"></i> Profil Saya </a>
            <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-emerald-100"> <i class="ph ph-gear"></i> Pengaturan </a>
            <button @click="openUser = false; openLogout = true"
                class="flex items-center gap-2 w-full px-4 py-2 text-red-600 hover:bg-red-100">
                <i class="ph ph-sign-out"></i> Keluar
            </button>
        </div>
    </div>

    <!-- 🔥 TELEPORT MODAL KE BODY -->
    <template x-teleport="body">
        <div x-show="openLogout" x-transition
            class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/50"
            @click.self="openLogout = false">

            <div class="bg-white rounded-xl shadow-xl w-full max-w-sm p-6">
                <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Keluar</h2>
                <p class="text-sm text-gray-600 mt-2">
                    Apakah Anda yakin ingin keluar dari sistem?
                </p>

                <div class="flex justify-end gap-3 mt-6">
                    <button @click="openLogout = false"
                        class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-gray-100">
                        Batal
                    </button>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            Ya, Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </template>
</header>

<script>
    function updateTime() {
        const now = new Date();
        document.getElementById('local-time').textContent =
            now.toLocaleTimeString('id-ID');
    }
    setInterval(updateTime, 1000);
    updateTime();
</script>