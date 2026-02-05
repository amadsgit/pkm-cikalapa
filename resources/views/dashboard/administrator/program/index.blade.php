@extends('layouts.dashboard')

@section('title', 'Capaian Program')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Manajemen Program Puskesmas</h1>
        <p class="text-gray-600">Indikator & Capaian Program Kesehatan</p>
    </div>

    <!-- Statistik Ringkas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white shadow rounded-lg p-5">
            <h2 class="text-sm font-medium text-gray-500">Jumlah Posyandu</h2>
            <p class="mt-2 text-2xl font-bold text-gray-800">12</p>
        </div>
        <div class="bg-white shadow rounded-lg p-5">
            <h2 class="text-sm font-medium text-gray-500">Cakupan Imunisasi</h2>
            <p class="mt-2 text-2xl font-bold text-gray-800">85%</p>
        </div>
        <div class="bg-white shadow rounded-lg p-5">
            <h2 class="text-sm font-medium text-gray-500">Kasus DBD</h2>
            <p class="mt-2 text-2xl font-bold text-red-600">15</p>
        </div>
        <div class="bg-white shadow rounded-lg p-5">
            <h2 class="text-sm font-medium text-gray-500">Program KB Aktif</h2>
            <p class="mt-2 text-2xl font-bold text-green-600">320</p>
        </div>
    </div>

    <!-- Grafik Capaian Program -->
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Capaian Program Kesehatan Bulanan</h2>
        <canvas id="programChart" class="w-full h-64"></canvas>
    </div>

    <!-- Tabel Indikator Program -->
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Indikator Program Kesehatan</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Program</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Target</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Capaian</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Persentase</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Imunisasi Balita</td>
                        <td class="px-6 py-4 whitespace-nowrap">200 anak</td>
                        <td class="px-6 py-4 whitespace-nowrap">170 anak</td>
                        <td class="px-6 py-4 whitespace-nowrap">85%</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Posyandu Aktif</td>
                        <td class="px-6 py-4 whitespace-nowrap">15 posyandu</td>
                        <td class="px-6 py-4 whitespace-nowrap">12 posyandu</td>
                        <td class="px-6 py-4 whitespace-nowrap">80%</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Program KB</td>
                        <td class="px-6 py-4 whitespace-nowrap">350 peserta</td>
                        <td class="px-6 py-4 whitespace-nowrap">320 peserta</td>
                        <td class="px-6 py-4 whitespace-nowrap">91%</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Pemeriksaan Kehamilan</td>
                        <td class="px-6 py-4 whitespace-nowrap">120 ibu hamil</td>
                        <td class="px-6 py-4 whitespace-nowrap">110 ibu hamil</td>
                        <td class="px-6 py-4 whitespace-nowrap">92%</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Pemeriksaan Balita</td>
                        <td class="px-6 py-4 whitespace-nowrap">180 anak</td>
                        <td class="px-6 py-4 whitespace-nowrap">160 anak</td>
                        <td class="px-6 py-4 whitespace-nowrap">89%</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Penyuluhan Gizi</td>
                        <td class="px-6 py-4 whitespace-nowrap">50 sesi</td>
                        <td class="px-6 py-4 whitespace-nowrap">45 sesi</td>
                        <td class="px-6 py-4 whitespace-nowrap">90%</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Fogging DBD</td>
                        <td class="px-6 py-4 whitespace-nowrap">20 RT</td>
                        <td class="px-6 py-4 whitespace-nowrap">18 RT</td>
                        <td class="px-6 py-4 whitespace-nowrap">90%</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Pemberian Vitamin A</td>
                        <td class="px-6 py-4 whitespace-nowrap">200 anak</td>
                        <td class="px-6 py-4 whitespace-nowrap">180 anak</td>
                        <td class="px-6 py-4 whitespace-nowrap">90%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('programChart').getContext('2d');
const programChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        datasets: [{
            label: 'Capaian Imunisasi',
            data: [70, 80, 75, 85, 90, 95],
            backgroundColor: 'rgba(59, 130, 246, 0.7)'
        },
        {
            label: 'Posyandu Aktif',
            data: [8, 10, 9, 12, 11, 12],
            backgroundColor: 'rgba(16, 185, 129, 0.7)'
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' },
            title: { display: false }
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>
@endpush