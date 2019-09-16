@include('admin.laporan.print.header')

<body>
   <style type="text/css">
		table tr td,
		table tr th{
			font-size: 11pt;
		}
	</style>
        <h6 class="text-center mb-4 font-weight-normal">Ringkasan Statistik Koleksi Perpustakaan <br> STMIK AMIKBANDUNG</h6>

    <table class='table table-bordered'>
        <tbody>
            <tr>
                <td>Total Judul</td>
                <td class="text-center">{{ $buku }}</td>
            </tr>
            <tr>
                <td>Total Eksemplar / Salinan</td>
                <td class="text-center">{{ $eksemplar }}</td>
            </tr>
            <tr>
                <td>Total Eksemplar Dipinjam</td>
                <td class="text-center">{{ $eksemplar_dipinjam }}</td>
            </tr>
            <tr>
                <td>Total Buku Baru Bulan Ini</td>
                <td class="text-center">{{ $masuk }}</td>
            </tr>
            <tr>
                <td>10 Buku Baru Yang Terakhir Masuk</td>
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