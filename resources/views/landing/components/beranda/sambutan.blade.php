<section class="py-16 bg-gray-50 relative overflow-hidden">
    <!-- Background Gradient Blobs -->
    <div
        class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-emerald-200/40 to-emerald-100/10 rounded-full blur-3xl -z-10 animate-pulse">
    </div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-gradient-to-tr from-blue-200/40 to-blue-100/10 rounded-full blur-3xl -z-10 animate-pulse"
        style="animation-delay: 2s;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div x-data="{ activeTab: window.location.hash ? window.location.hash.substring(1) : 'sambutan' }"
            x-init="$watch('activeTab', value => { window.location.hash = value })">

            <!-- Tab Navigation -->
            <div class="flex justify-center mb-10">
                <div class="inline-flex bg-white/80 backdrop-blur-sm rounded-full p-1 shadow-lg">
                    <button @click="activeTab = 'sambutan'"
                        :class="activeTab === 'sambutan' ? 'bg-gradient-to-r from-emerald-500 to-emerald-600 text-white shadow-md' : 'bg-transparent text-gray-600 hover:text-gray-800'"
                        class="px-6 py-3 rounded-full text-sm font-semibold flex items-center gap-2 transition-all duration-300">
                        <i class="fas fa-user-tie"></i> Sambutan
                    </button>
                    <button @click="activeTab = 'program'"
                        :class="activeTab === 'program' ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-md' : 'bg-transparent text-gray-600 hover:text-gray-800'"
                        class="px-6 py-3 rounded-full text-sm font-semibold flex items-center gap-2 transition-all duration-300">
                        <i class="fas fa-clipboard-list"></i> Program Puskesmas
                    </button>
                </div>
            </div>

            <!-- Tab Contents -->
            <div class="mt-12 space-y-12">
                <!-- Sambutan -->
                <div x-show="activeTab === 'sambutan'" x-transition
                    class="relative max-w-5xl mx-auto bg-gradient-to-br from-white/80 to-emerald-50/70 backdrop-blur-md border border-emerald-100/50 rounded-2xl shadow-xl overflow-hidden group transition-all duration-500 hover:shadow-2xl">
                
                    <!-- Decorative glow -->
                    <div
                        class="absolute inset-0 bg-gradient-to-tr from-emerald-100/20 via-transparent to-sky-100/20 opacity-60 pointer-events-none">
                    </div>
                
                    <div class="relative grid md:grid-cols-12 gap-8 p-8 lg:p-10">
                        <!-- Profile -->
                        <div class="md:col-span-4 flex flex-col items-center text-center" data-aos="fade-right">
                            <div class="relative mb-5">
                                <!-- Glowing Ring -->
                                <div
                                    class="absolute inset-0 w-36 h-36 bg-gradient-to-tr from-emerald-400/30 to-sky-400/30 rounded-full blur-xl animate-pulse-slow">
                                </div>
                                <!-- Profile Photo -->
                                <div
                                    class="relative w-32 h-32 rounded-full overflow-hidden ring-4 ring-white shadow-lg transform transition-transform duration-500 group-hover:scale-105">
                                    <img class="object-cover w-full h-full"
                                        src="{{ $kepalaPuskesmas && $kepalaPuskesmas->foto ? asset('storage/'.$kepalaPuskesmas->foto) : asset('images/default-profile.png') }}"
                                        alt="Kepala Puskesmas" loading="lazy">
                                </div>
                                <!-- Verified Badge -->
                                <div
                                    class="absolute -bottom-1 -right-1 w-7 h-7 bg-emerald-500 rounded-full flex items-center justify-center shadow-md border-2 border-white">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                            </div>
                
                            <h3 class="text-lg font-bold text-gray-900 mt-2">
                                {{ $kepalaPuskesmas ? $kepalaPuskesmas->nama_pegawai : 'Nama Kepala Puskesmas' }}
                            </h3>
                            <p class="text-sm font-medium text-emerald-700">
                                {{ $kepalaPuskesmas ? $kepalaPuskesmas->jabatan : 'Jabatan' }}
                            </p>
                
                            <div class="mt-4 w-16 h-1 bg-gradient-to-r from-emerald-500 to-sky-500 rounded-full"></div>
                        </div>
                
                        <!-- Sambutan Content -->
                        <div class="md:col-span-8 relative bg-white/80 backdrop-blur-md border border-gray-100/70 rounded-2xl p-6 lg:p-8 shadow-inner text-gray-700 leading-relaxed"
                            data-aos="fade-left">
                
                            <div class="absolute -top-3 -left-3 w-10 h-10 bg-emerald-100/40 rounded-full blur-md"></div>
                            <div class="absolute bottom-2 right-2 w-12 h-12 bg-sky-100/40 rounded-full blur-md"></div>
                
                            <div class="prose prose-emerald max-w-none">
                                <p class="font-medium text-gray-800">Assalamu'alaikum Wr. Wb.</p>
                                <p>Puji syukur kita panjatkan kehadirat Allah SWT atas limpahan rahmat dan karunia-Nya. Semoga kita
                                    senantiasa diberikan kesehatan dan kekuatan untuk meningkatkan mutu pelayanan kesehatan masyarakat.
                                </p>
                                <p>Sebagai Kepala Puskesmas Cikalapa, saya beserta seluruh jajaran berkomitmen untuk menghadirkan
                                    pelayanan yang <strong>cepat, transparan, dan mudah diakses</strong> melalui <strong>Puskesmas
                                        Digital</strong>.</p>
                                <p>Mari kita bersama-sama memanfaatkan platform ini untuk mewujudkan pelayanan kesehatan yang lebih baik
                                    bagi seluruh masyarakat.</p>
                                <p class="font-medium text-gray-800">Wassalamu'alaikum Wr. Wb.</p>
                            </div>
                        </div>
                    </div>
                
                    <!-- Custom Animations -->
                    <style>
                        @keyframes pulse-slow {
                
                            0%,
                            100% {
                                opacity: 0.8;
                                transform: scale(1);
                            }
                
                            50% {
                                opacity: 1;
                                transform: scale(1.05);
                            }
                        }
                
                        .animate-pulse-slow {
                            animation: pulse-slow 6s ease-in-out infinite;
                        }
                    </style>
                </div>

                <!-- Program -->
                <div x-show="activeTab === 'program'" x-transition class="max-w-6xl mx-auto space-y-8">

                    <!-- Program Descriptive Card -->
                    <div class="flex flex-col md:flex-row gap-6 items-center bg-white rounded-xl shadow-lg p-6">
                        <div
                            class="w-24 h-24 md:w-28 md:h-28 rounded-xl bg-gradient-to-tr from-blue-400 to-emerald-400 flex items-center justify-center shadow-lg animate-bounce">
                            <i class="fas fa-heartbeat text-white text-3xl"></i>
                        </div>
                        <p class="text-gray-700 text-center md:text-left flex-1">
                            Program dirancang untuk memperkuat upaya promotif, preventif, kuratif, dan rehabilitatif
                            demi masyarakat sehat dan berkualitas.
                        </p>
                    </div>

                    <!-- Sub Tabs -->
                    <div x-data="{ activeSubTab: 'prioritas' }">
                        <!-- Sub Tab Navigation -->
                        <div class="flex justify-center mb-6">
                            <div class="inline-flex bg-white/80 backdrop-blur-sm rounded-full p-1 shadow-md">
                                <button @click="activeSubTab = 'prioritas'"
                                    :class="activeSubTab === 'prioritas' ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-md' : 'bg-transparent text-gray-600 hover:text-gray-800'"
                                    class="px-4 py-2.5 rounded-full text-sm font-medium flex items-center gap-2 transition-all duration-300">
                                    <i class="fas fa-star"></i> Prioritas Nasional
                                </button>
                                <button @click="activeSubTab = 'programKerja'"
                                    :class="activeSubTab === 'programKerja' ? 'bg-gradient-to-r from-emerald-500 to-emerald-600 text-white shadow-md' : 'bg-transparent text-gray-600 hover:text-gray-800'"
                                    class="px-4 py-2.5 rounded-full text-sm font-medium flex items-center gap-2 transition-all duration-300">
                                    <i class="fas fa-tasks"></i> Program Kerja SPM
                                </button>
                            </div>
                        </div>

                        <!-- Sub Tab Content -->
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <!-- Program Prioritas -->
                            <div x-show="activeSubTab === 'prioritas'" x-transition class="space-y-3">
                                <ol class="list-decimal list-inside text-gray-700">
                                    @foreach($ppn as $item)
                                    <li class="py-2 border-b last:border-b-0">
                                        <strong>{{ $item->judul }}</strong> - {{ $item->deskripsi }}
                                    </li>
                                    @endforeach
                                </ol>
                            </div>

                            <!-- Program Kerja SPM -->
                            <div x-show="activeSubTab === 'programKerja'" x-transition
                                class="grid md:grid-cols-2 gap-6">
                                @foreach($spm as $item)
                                <div
                                    class="flex items-start p-5 bg-gray-50 rounded-xl shadow hover:shadow-lg transition">
                                    <div
                                        class="flex-shrink-0 w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center">
                                        <i class="fas fa-check text-emerald-600"></i>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="font-semibold text-emerald-700">{{ $item->judul }}</h4>
                                        <p class="text-sm text-gray-600">{{ $item->deskripsi }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>