# 📘 Program Strategi Pemilihan Pertanyaan Ujian (PHP Native)

Program ini membantu mahasiswa dalam memilih kombinasi pertanyaan ujian berdasarkan total nilai maksimal yang diperbolehkan. Dosen memberikan sejumlah soal dengan nilai maksimal masing-masing, dan mahasiswa diminta menjawab soal-soal dengan total poin.

---

## 🔧 Fitur Utama

- Input jumlah pertanyaan (maksimal 10)
- Input nilai poin tiap pertanyaan
- Input nilai target total poin (T)
- Menampilkan semua kombinasi soal yang nilai totalnya **sama dengan T**
- Dibuat menggunakan **PHP Native tanpa framework atau library eksternal**

---

## 🧪 Contoh Kasus

Misalnya diberikan:
- Nilai soal: `10,10,10,15,15`
- T = `30`

Maka akan dihasilkan dua kombinasi:
1. Soal 1, 2, 3 (10 + 10 + 10)
2. Soal 4, 5 (15 + 15)

---

## 🚀 Cara Menjalankan

1. download file uas.php.
2. Jalankan di server lokal seperti **XAMPP**, **Laragon**, atau **Apache bawaan Linux**.
3. Letakkan file di folder `htdocs` (jika pakai XAMPP).
4. Buka browser dan akses:
