@include('admin.laporan.print.header')

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 11pt;
        }

    </style>
    <h6 class="text-center mb-4 font-weight-normal">Ringkasan Laporan Peminjaman Di Perpustakaan <br> STMIK AMIKBANDUNG
    </h6>

    <table class='table table-bordered'>
        <tbody>
            <tr>
                <td>Total Eksemplar Dipinjam (Per Hari)</td>
                <td class="text-center">{{ $eksemplar }}</td>
            </tr>
            <tr>
                <td>Total Eksemplar Dipinjam (Per Minggu)</td>
                <td class="text-center">{{ $buku }}</td>
            </tr>
            <tr>
                <td>Total Eksemplar Dipinjam (Per Bulan)</td>
                <td class="text-center">{{ $masuk }}</td>
            </tr>
            <tr>
                <td>Total Eksemplar Dipinjam (Per Tahun)</td>
                <td class="text-center">{{ $tahun }}</td>
            </tr>
            <tr>
                <td>Total Eksemplar Terlambat</td>
                <td class="text-center">{{ $eksemplar_dipinjam }}</td>
            </tr>
            <tr>
                <td>10 Judul Terpopuler</td>
                <td>
                    <ol>
                        @foreach ($popular as $p)
                        <li>{{ ucwords($p->judul) }}</li>
                        @endforeach
                    </ol>
                </td>
            </tr>
        </tbody>
    </table>
    <span style="font-size: 10pt">Dicetak pada: {{ $time }}</span>

</body>

</html>
