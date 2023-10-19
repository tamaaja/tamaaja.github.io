<?php
include 'koneksi.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (!empty($_POST)) {
    $id = isset($_POST['id']) ? $_POST['id'] : NULL; // Menghapus pengecekan yang tidak diperlukan
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $menu = isset($_POST['menu']) ? $_POST['menu'] : '';
    $nomortelpon = isset($_POST['nomortelpon']) ? $_POST['nomortelpon'] : '';
    $harga = isset($_POST['harga']) ? $_POST['harga'] : '';

    $stmt = $pdo->prepare('INSERT INTO pemesan (id, nama, menu, nomortelpon, harga) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id, $nama, $menu, $nomortelpon, $harga]);
    $msg = 'Pesanan berhasil dibuat!';
}
?>

<?=template_header('Create')?>

<style>
    /* Styling for the form */
    .content {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .update form {
        display: flex;
        flex-direction: column;
        max-width: 400px;
        margin: 0 auto;
    }

    .update form label {
        font-weight: bold;
    }

    .update form input {
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #cccccc;
    }

    .update form input[type="submit"] {
        background-color: #000;
        border: 0;
        font-weight: bold;
        font-size: 14px;
        color: #FFA500; /* Warna Emas */
        cursor: pointer;
        width: 100%;
        padding: 10px;
        margin-top: 15px;
    }

    .update form input[type="submit"]:hover {
        background-color: #FFA500; /* Warna Emas */
    }
</style>

<div class="content">
    <div class="update">
        <h2>Tambah Pesanan</h2>
        <form action="create.php" method="post">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama">
            <label for="menu">Menu</label> <!-- Mengubah "menu" menjadi "Menu" sesuai dengan nama kolom -->
            <input type="text" name="menu" id="menu">
            <label for="nomortelpon">No. Telp</label>
            <input type="text" name="nomortelpon" id="nomortelpon">
            <label for="harga">Jumlah Harga</label>
            <input type="text" name="harga" id="harga">
            <input type="submit" value="Create">
        </form>
        <?php if ($msg): ?>
        <p><?=$msg?></p>
        <?php endif; ?>
    </div>
</div>

<?=template_footer()?>
