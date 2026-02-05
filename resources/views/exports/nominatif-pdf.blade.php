<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Nominatif Pegawai</title>
    <style>
        @page {
            margin: 30px 30px 30px 30px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0px;
            font-size: 11px;
            justify-content: center;
        }

        table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        table-layout: fixed;
        word-wrap: break-word;
        font-size: 11px;
        }

        th, td {
        border: 1px solid #484747;
        padding: 4px;
        text-align: center;
        vertical-align: middle;
        font-size: 11px;
        }

        thead tr:nth-child(1),
        thead tr:nth-child(2) {
            border: none;
        }

        /* tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        } */

        /* tbody tr:hover {
            background-color: #f1f1f1;
        } */

        .no-border {
            border: none !important;
        }

        .center {
            text-align: center;
        }

        img.kop {
            width: 74%;
            max-width: 75%;
            height: 150px;
        }

        h1.title {
            margin: 10px 0;
        }

        .ttd {
            width: 100%;
            margin-top: 40px;
        }

        .ttd .right {
            float: right;
            text-align: center;
            margin-right: 40px;
        }

        /* footer {
            position: fixed;
            bottom: 10px;
            left: 0;
            right: 0;
            text-align: right;
            font-size: 10px;
            color: #666;
        } */
    </style>
</head>

<body>
    <table>
        <thead>
            <tr class="no-border"> 
                <th colspan="16" class="no-border center p-0">
                    <img src="{{ public_path('images/kopsurat.png') }}" alt="Kop Surat" class="kop" width="100px">
                </th>
            </tr>
            <tr class="no-border">
                <th colspan="16" class="no-border center">
                    <h2 class="title">DAFTAR NOMINATIF PEGAWAI UPTD PUSKESMAS CIKALAPA</h2>
                    <h2 class="title">KABUPATEN SUBANG</h2>
                </th>
            </tr>
            <tr style="background-color: #f8f9fa;">
                <th style="width: 15px; max-width: 15px; font-size: 11px; white-space: nowrap; overflow: hidden;">No</th>
                <th style="min-width: 150px;">Nama Pegawai</th>
                <th style="width: 100px;">NIP</th>
                <th style="width: 130px;">Tempat, tanggal lahir</th>
                <th style="width: 80px;">Jenis Kelamin</th>
                <th style="width: 120px;">Jabatan</th>
                <th style="width: 80px;">Pangkat/Gol</th>
                <th style="width: 100px;">TMT Jabatan</th>
                <th style="width: 100px;">TMT Pangkat/Gol</th>
                <th style="width: 120px;">Status Kepegawaian</th>
                <th style="width: 120px;">Masa Kerja</th>
                <th style="width: 100px;">STR s.d.</th>
                <th style="width: 100px;">SIP s.d.</th>
                <th style="width: 120px;">Pendidikan</th>
                <th style="width: 90px;">HP</th>
                <th style="width: 200px;">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nominatifPegawai as $index => $data)
            <tr>
                <td style="width: 15px; max-width: 15px; font-size: 11px; white-space: nowrap; overflow: hidden;">{{ $loop->iteration }}</td>
                <td>{{ $data->nama_pegawai }}</td>
                <td>{{ $data->nip }}</td>
                <td>{{ $data->tempat_lahir }}, {{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                <td>{{ $data->jenis_kelamin }}</td>
                <td>{{ $data->jabatan }}</td>
                <td>{{ $data->pangkat }} / {{ $data->golongan }}</td>
                <td>
                    @if ($data->tmt_sk_jabatan)
                        {{ \Carbon\Carbon::parse($data->tmt_sk_jabatan)->format('d/m/Y') }}
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>
                    @if ($data->tmt_sk_pangkat_golongan)
                        {{ \Carbon\Carbon::parse($data->tmt_sk_pangkat_golongan)->format('d/m/Y') }}
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>{{ $data->status_kepegawaian }}</td>
                <td>
                    @if ($data->tgl_mulai_kerja)
                        @php
                        $awal = \Carbon\Carbon::parse($data->tgl_mulai_kerja);
                        $sekarang = \Carbon\Carbon::now();
                    
                        $tahun = $awal->diffInYears($sekarang);
                        $bulan = $awal->copy()->addYears($tahun)->diffInMonths($sekarang);
                        @endphp
                    
                        {{ $tahun }} thn {{ $bulan }} bln
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>
                    @if ($data->tgl_akhir_str)
                        {{ \Carbon\Carbon::parse($data->tgl_akhir_str)->format('d/m/Y') }}
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>
                    @if ($data->tgl_akhir_sip)
                        {{ \Carbon\Carbon::parse($data->tgl_akhir_sip)->format('d/m/Y') }}
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>{{ $data->pendidikan_terakhir }} {{ $data->jurusan }}</td>
                <td>{{ $data->hp }}</td>
                <td>{{ $data->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="ttd">
        <div class="right">
            <p>Subang, {{ now()->format('d F Y') }}</p>
            <p>Kepala UPTD Puskesmas Cikalapa</p>
            <br><br><br>
            <p style="text-decoration: underline; font-weight: bold;">{{ optional($kepalaPuskesmas)->nama_pegawai ?? '-' }}</p>
            <p>NIP. {{ optional($kepalaPuskesmas)->nip ?? '-' }}</p>
        </div>
    </div>
</body>

</html>