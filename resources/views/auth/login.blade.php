
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Puskesmas Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center 
    bg-gradient-to-br from-emerald-100 via-sky-100 to-teal-200">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

        <!-- Logo -->
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/logopkm.png') }}" alt="Logo Puskesmas" class="w-20 h-20">
        </div>

        <h1 class="text-2xl font-bold text-center text-teal-700">Puskesmas Digital</h1>
        {{-- <h2 class="font-bold text-center text-teal-500">UPTD Puskesmas Cikalapa</h2> --}}
        <p class="text-center text-gray-500 text-sm mt-1 mb-6">Silakan login untuk melanjutkan</p>

        @if ($errors->any())
        <div class="mb-4 rounded-lg bg-red-100 border border-red-300 text-red-700 px-4 py-3 text-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Tab Switcher -->
        <div class="flex mb-6 border-b border-gray-200">
            <button onclick="switchTab('pegawai')" id="tab-pegawai"
                class="w-1/2 py-2 text-center font-medium text-teal-700 border-b-2 border-teal-600">
                Pegawai
            </button>
            <button onclick="switchTab('pengunjung')" id="tab-pengunjung"
                class="w-1/2 py-2 text-center font-medium text-gray-500 hover:text-teal-700">
                Pengunjung
            </button>
        </div>

        <!-- Form Pegawai -->
        <form id="form-pegawai" action="{{ route('login.pegawai') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                <input type="text" name="nip" id="nip" placeholder="Masukkan NIP" required
                    class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan Password" required
                    class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500">
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-gradient-to-r from-emerald-500 via-sky-500 to-teal-600 
                       hover:from-emerald-600 hover:via-sky-600 hover:to-teal-700
                       text-white font-semibold rounded-lg shadow-lg transition">
                Login sebagai Pegawai
            </button>
        </form>

        <!-- Form Pengunjung -->
        <form id="form-pengunjung" action="{{ route('login.pengunjung') }}" method="POST" class="space-y-4 hidden">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan Email" required
                    class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500">
            </div>
            <div>
                <label for="password2" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password2" placeholder="Masukkan Password" required
                    class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-teal-500 focus:border-teal-500">
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-gradient-to-r from-emerald-500 via-sky-500 to-teal-600 
                       hover:from-emerald-600 hover:via-sky-600 hover:to-teal-700
                       text-white font-semibold rounded-lg shadow-lg transition">
                Login sebagai Pengunjung
            </button>
        </form>

        <!-- Link tambahan -->
        <div class="mt-6 flex justify-between text-sm">
            <a href="{{ url('/') }}" class="text-teal-600 hover:text-teal-800 font-medium">← Kembali ke Beranda</a>
            <a href="#" class="text-teal-600 hover:text-teal-800 font-medium">Lupa
                Password?</a>
            {{-- <a href="{{ route('password.request') }}" class="text-teal-600 hover:text-teal-800 font-medium">Lupa
                Password?</a> --}}
        </div>
    </div>

    <script>
        function switchTab(tab) {
            let pegawaiForm = document.getElementById('form-pegawai');
            let pengunjungForm = document.getElementById('form-pengunjung');
            let tabPegawai = document.getElementById('tab-pegawai');
            let tabPengunjung = document.getElementById('tab-pengunjung');

            if (tab === 'pegawai') {
                pegawaiForm.classList.remove('hidden');
                pengunjungForm.classList.add('hidden');
                tabPegawai.classList.add('text-teal-700', 'border-b-2', 'border-teal-600');
                tabPengunjung.classList.remove('text-teal-700', 'border-b-2', 'border-teal-600');
                tabPengunjung.classList.add('text-gray-500');
            } else {
                pengunjungForm.classList.remove('hidden');
                pegawaiForm.classList.add('hidden');
                tabPengunjung.classList.add('text-teal-700', 'border-b-2', 'border-teal-600');
                tabPegawai.classList.remove('text-teal-700', 'border-b-2', 'border-teal-600');
                tabPegawai.classList.add('text-gray-500');
            }
        }
    </script>
</body>

</html>