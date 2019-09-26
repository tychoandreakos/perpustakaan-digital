@include('admin.laporan.print.header')

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 11pt;
        }
    </style>
    <h6 class="text-center mb-4 font-weight-normal">Laporan Buku Baru Pada Bulan {{ ucfirst($month) }} <br> DI Perpustakaan
        STMIK AMIK BANDUNG</h6>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Tahun Terbit</th>
                <th>ISBN ISNN</th>
                <th>Pengarang</th>
                <th>GMD</th>
                <th>Penerbit</th>
                {{-- <th>Deskrisi Fisik</th> --}}
                <th>Jumlah Salinan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buku as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ ucwords($item->judul) }}</td>
                <td>{{ ucwords($item->tahun_terbit) }}</td>
                <td>{{ ucwords($item->isbn_isnn) }}</td>
                <td>
                    @php
                    $i = 0;
                    $tr = [];
                    @endphp
                    @foreach ($item->buku_transaksi as $p)
                    @php
                    $tr[$i++] = $p->pengarang->nama_pengarang

                    @endphp
                    @endforeach

                    @php
                    print_r(join(', ', $tr));
                    @endphp
                </td>
                <td>
                    @php
                    $i = 0;
                    $tr = [];
                    @endphp
                    @foreach ($item->bibliobigrafi[0]->gmd_transaksi as $p)
                    @php
                    $tr[$i++] = $p->gmd->nama_gmd

                    @endphp
                    @endforeach

                    @php
                    print_r(join(', ', $tr));
                    @endphp
                </td>
                <td>{{ $item->buku_transaksi[0]->penerbit->nama_penerbit }}</td>
                {{-- <td>{{ ucwords($item->deskripsi_fisik) }}</td> --}}
                <td>{{ $salinan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>