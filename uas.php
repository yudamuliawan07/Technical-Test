<?php

function cariKombinasi($soal, $target, $indeks = 0, $kombinasi = [], &$hasil = []) {
    $total = 0;
    foreach ($kombinasi as $i) {
        $total += $soal[$i]; 
    }

    if ($total == $target) {
        $hasil[] = $kombinasi;
        return;
    }

    if ($total > $target || $indeks >= count($soal)) {
        return;
    }
    cariKombinasi($soal, $target, $indeks + 1, array_merge($kombinasi, [$indeks]), $hasil);
    cariKombinasi($soal, $target, $indeks + 1, $kombinasi, $hasil);
}

if (!isset($_POST['jumlah'])) {
?>
    <form method="post">
        <label>Masukkan jumlah pertanyaan (maksimal 10):</label><br>
        <input type="number" name="jumlah" min="1" max="10" required>
        <input type="submit" value="Lanjut">
    </form>
<?php
}

elseif (isset($_POST['jumlah']) && !isset($_POST['nilai']) ) {
    $jumlah = intval($_POST['jumlah']);
    ?>
        <form method="post">
            <input type="hidden" name="jumlah" value="<?= $jumlah ?>">
            <label>Masukkan nilai tiap pertanyaan (dipisah koma, sebanyak <?= $jumlah ?> nilai):</label><br>
            <input type="text" name="nilai" required placeholder="contoh: 10,15,20,..."><br><br>
            <label>Masukkan nilai total T yang diinginkan:</label><br>
            <input type="number" name="target" required><br><br>
            <input type="submit" value="Hitung">
        </form>
    <?php
}

elseif (isset($_POST['nilai']) && isset($_POST['target'])) {
    $nilai_input = explode(',', $_POST['nilai']);
    $jumlah_input = intval($_POST['jumlah']);
    $target = intval($_POST['target']);

    if (count($nilai_input) != $jumlah_input) {
        echo "❌ Jumlah nilai yang dimasukkan tidak sesuai dengan jumlah pertanyaan!";
        exit;
    }

    $soal_array = array_map('intval', $nilai_input);

    echo "<b>SOAL</b><br>Array<br>(<br>";
    foreach ($soal_array as $i => $poin) {
        echo "   [Pertanyaan " . ($i + 1) . "] => $poin<br>";
    }
    echo ")<br>";
    echo "dengan Nilai Total Soal (T) = $target ?<br><br>";

    $hasil_kombinasi = [];
    cariKombinasi($soal_array, $target, 0, [], $hasil_kombinasi);

    echo "<b>JAWABAN</b><br>";
    echo "Jumlah semua Kombinasi (K) = " . count($hasil_kombinasi) . "<br><br>";
    echo "Daftar Kombinasi:<br>Array<br>(<br>";

    foreach ($hasil_kombinasi as $idx => $kombinasi) {
        echo "[$idx] => Array<br> (<br>";
        foreach ($kombinasi as $k) {
            echo "[Pertanyaan " . ($k + 1) . "] => " . $soal_array[$k] . "<br>";
        }
        echo ")<br>";
    }
    echo ")<br><br>";

    echo "<a href=''>🔁 Ulangi dari awal</a>";
}
?>
