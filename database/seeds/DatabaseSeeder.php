<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Buku::class, 2)->create()->each(function($u) {
            $u->buku_transaksi()
                ->saveMany( factory(App\BukuTransaksi::class, 2)->make()
                );
        });
    }
}
