<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Kepada Sdr {{ ucwords($user->name) }},
    <br>
    <br>
Berdasarkan catatan peminjaman buku, diberitahukan bahwa buku yang Sdr {{ ucwords($user->name) }} pinjam telah melewati batas peminjaman selama <b>{{ $hari }} Hari</b>. Buku yang <b>wajib segera dikembalikan</b> berjudul <b>{{ ucwords($buku->judul) }}</b>. Adapun total pembayaran yang harus segera dibayarkan kepada petugas perpustakaan yaitu <b>RP. @currency($denda)</b>.
<br>
<br>
Terima Kasih Atas Kerjasamanya.
<br>
<br>
<b>Pustakawan STMIK AMIKBANDUNG</b>.
</body>
</html>