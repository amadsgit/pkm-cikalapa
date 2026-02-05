<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind CDN (hapus jika sudah pakai Tailwind via Vite) --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="text-center p-6 bg-white rounded-xl shadow-lg max-w-xl w-full">

        {{-- Gambar --}}
        <img src="{{ asset('under.png') }}" alt="Under Construction" class="mx-auto mb-6 w-120">

        {{-- Teks opsional --}}
        <h1 class="text-xl font-semibold text-gray-700 mb-4">
            Halaman Pendaftaran Belum Tersedia
        </h1>
        <p class="text-red-500">by M ahmad</p> <br>

        {{-- Tombol kembali --}}
        <a href="{{ url('/') }}"
            class="inline-block px-6 py-3 bg-teal-500 text-white rounded-lg hover:bg-teal-600 transition">
            ⬅ Kembali ke Beranda
        </a>

    </div>

</body>

</html>