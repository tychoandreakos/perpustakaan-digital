<?php

namespace App\Mail;

use App\PinjamTransaksi;
use App\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $pinjam = PinjamTransaksi::find($request->id);
        $user = $pinjam->user()->first();
        $buku = $pinjam->buku()->first();
        $denda = $this->denda($pinjam);
        $hari = $this->hari($pinjam);
        return $this->view('send', compact('user' ,'pinjam', 'buku', 'denda', 'hari'))->to($user->email)->subject('Pengembalian Buku')->from('fullstackdev04@gmail.com', 'Perpustakaan STMIK AMIKBANDUNG');
    }

    private function hari($pinjam)
    {
        $fdate = $pinjam->tanggal_habis_pinjam;
        $tdate = Carbon::now();
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        return $interval->format('%a');
    }

    private function denda($pinjam)
    {
        $user = User::find($pinjam->user()->first()->id);

        $fdate = $pinjam->tanggal_habis_pinjam;
        $tdate = Carbon::now();
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        $denda = $user->anggota_transaksi->tipe_anggota->first()->denda;

        return $days * $denda;
    }
}
