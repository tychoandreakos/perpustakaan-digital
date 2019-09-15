<html>
<head>
<title>Laporan Buku Bulan {{ $month }}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Buku Pada Bulan {{ ucfirst($month) }} <br> DI Perpustakaan STMIK AMIK BANDUNG</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Judul Buku</th>
				<th>Edisi</th>
				<th>Tahun Terbit</th>
                <th>ISBN ISNN</th>
                <th>Pengarang</th>
                <th>GMD</th>
                <th>Penerbit</th>
                <th>Deskrisi Fisik</th>
                <th>Jumlah Salinan</th>
			</tr>
		</thead>
		<tbody>
            @foreach ($buku as $item)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ ucwords($item->judul) }}</td>
                <td>{{ ucwords($item->edisi) }}</td>
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
                <td>{{ ucwords($item->deskripsi_fisik) }}</td>
                <td>{{ $salinan }}</td>
                </tr>
            @endforeach
		</tbody>
	</table>
 
</body>
</html>