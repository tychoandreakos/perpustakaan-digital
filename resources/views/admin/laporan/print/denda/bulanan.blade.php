@include('admin.laporan.print.header')

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 11pt;
        }

    </style>

    <h6 class="text-center mb-4 font-weight-normal">{{ $title }}</h6>

    <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID / NPM</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">Kode Eksemplar</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Hari Terlambat</th>
                    <th scope="col">Jumlah Bayar</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal Bayar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($denda as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->user_id }}</td>
                    <td>{{ ucwords($item->user->name) }}</td>
                    <td>{{ $item->pinjam_transaksi->bibliobigrafi->pola_eksemplar }}</td>
                    <td>{{ $item->buku->judul }}</td>
                    <td class="text-danger">
                        {{app(App\Http\Controllers\Admin\DendaController::class)->hari($item->pinjam_transaksi->tanggal_habis_pinjam , $item->created_at) . ' Hari' }}
                    </td>
                    <td>{{ $item->jumlah_bayar }}</td>
                    <td>
                        <span class="badge badge-pill badge-success">Lunas</span>
                    </td>
                    <td>{{ $item->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    

    <table class='table table-bordered'>
        <tbody>
            <tr>
                <td>Total Anggota Terlambat / Didenda</td>
            <td class="text-center">{{ $denda->count() }} Anggota</td>
            </tr>
            <tr>
                <td>Total Uang Terkumpul</td>
            <td class="text-center text-success">
                
                @php
                    $arr = [];
                  foreach ($jumlah_bayar as $item) {
                      foreach ($item as $bayar) {
                          $some = explode(" ", $bayar);
                          $sanitize = filter_var($some[1], FILTER_SANITIZE_NUMBER_INT);
                          $arr[] = $sanitize;
                      }
                  }  
                  $hasil_rupiah = "Rp " . number_format(array_sum($arr),0,',','.');
	                echo $hasil_rupiah;
                @endphp
            </td>
            </tr>
        </tbody>
    </table>
    <span style="font-size: 10pt">Dicetak pada: {{ $time }}</span>
</body>

</html>
