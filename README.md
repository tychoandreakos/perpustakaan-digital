# Perpustakaan DIGITAL

## Tools Yang Digunakan
1. Laravel 5.9+
2. VueJs 2+
3. VSCode
4. JQuery
5. Bootstrap 4
6. SASS
7. Github
8. Laragon

## Usulan Sistem Yang Dirancang
Sistem ini memiliki kemampuan yang powerfull dalam menampilkan data - data buku, data buku akan ditampilkan secara cepat karena memanfaatkan teknologi **DOM**. Sistem dirancang dalam 2 versi, versi pertama untuk **ADMIN** dan versi kedua untuk **USER** / **Anggota**. Tiap - tiap aktor memiliki tampilan dan fungsinya masing - masing. **Admin** dapat mengelola data buku dan transaksi peminjaman sedang **Anggota** dapat melihat dan membaca buku perpustakaan secara _digital_.

## Instalasi Sistem
Untuk melakukan instalasi sistem diharapkan telah menginstal github dan juga telah mengintall composer. Github diperlukan untuk mendownload _repository_ sistem ini sedangkan composer diperlukan untuk mendownload _framework **Laravel**_.

1. Buka cmd dengan menekan tombol **WIN+R** lalu inputkan **cmd** dan tekan enter, untuk linux tekan tombol **CTRL+ALT+T** untuk membuka **Terminal**.
2. Lakukan **CD** (_change directory_) untuk mengubah alamat folder yang nantinya akan jadi tempat penyimpanan sistem _digital library_ ini.
3. Jika sudah, ketikan "**git clone https://github.com/tychoandreakos/perpustakaan-stmik-amik-bandung.git**_".
4. Tunggu proses instalasi berakhir, selanjutnya masih didalam **terminal** atau **cmd**. Ketikkan **composer install** & **npm install** tunggu hingga proses instalasi selesai untuk setiap masing - masing perintah.
5. Jika sudah selesai, maka copy _file_ yang bernama **.env.example** pastekan di halaman yang sama lalu ubah namanya menjadi **.env**. Untuk linux hanya perlu mengetikkan perintah **cp .env.example .env**.
6. Selanjutnya ketikkan **php artisan serve key:generate**.
7. Jika sukses maka akan muncul tulisan **_successful generate key bla... bla..._**.
8. Lalu nyalakan **xampp** dan buat database namanya **laravel**, jika sudah ketikkan **php artisan migrate** .
9. Jika berhasil ketikkan perintah **php artisan serve** dan akan muncul _response_ _**htttp://localhost:8000/**_.
10. Selamat sistem telah berhasil **diinstal** :).

## Screenshoot Interface

#### Halaman User
<a href="https://ibb.co/mNpRw1s"><img src="https://i.ibb.co/PDkrn3p/image.png" alt="image" border="0"></a><br />


<a href="https://ibb.co/HV1nHTH"><img src="https://i.ibb.co/wR3Mzhz/image.png" alt="image" border="0"></a><br/>

#### Halaman Admin
<a href="https://ibb.co/xJjnNzC"><img src="https://i.ibb.co/yWyzrgf/image.png" alt="image" border="0"></a><br/>
