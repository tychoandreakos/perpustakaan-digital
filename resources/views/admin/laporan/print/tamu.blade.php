@include('admin.laporan.print.header')

<body>
   <style type="text/css">
		table tr td,
		table tr th{
			font-size: 11pt;
		}
	</style>
        <h6 class="text-center mb-4 font-weight-normal">Ringkasan Statistik Buku Tamu Perpustakaan <br> STMIK AMIKBANDUNG Pada Bulan {{ $month }}</h6>

    <table class='table table-bordered'>
        <tbody>
            <tr>
                <td>Total Tamu Minggu Ini</td>
                <td class="text-center">{{ $buku }}</td>
            </tr>
            <tr>
                <td>Total Tamu Bulan Ini</td>
                <td class="text-center">{{ $eksemplar }}</td>
            </tr>
            <tr>
                <td>Total Tamu Tahun Ini</td>
                <td class="text-center">{{ $eksemplar_dipinjam }}</td>
            </tr>
            <tr>
                <td>10 Daftar Tamu Yang Sering Berkunjung</td>
                <td>
                    <ol>
                        @foreach ($popular as $p)
							<li>{{ ucwords($p->name) }} ({{ $p->buku_tamu_count }} Kali)</li>
						@endforeach
                    </ol>
                </td>
            </tr>
        </tbody>
	</table>
	<span style="font-size: 10pt">Dicetak pada: {{ $time }}</span>

</body>

</html>