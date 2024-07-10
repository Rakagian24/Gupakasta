<?php

if (!function_exists('formatRupiah')) {
    function formatRupiah($angka)
    {
        // Menghapus karakter non-numerik dari string
        $angka = preg_replace("/[^0-9]/", "", $angka);

        // Mengkonversi string menjadi float
        $angka = (float) $angka;

        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}
