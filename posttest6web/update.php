<?php
include 'koneksi.php';
$pdo = pdo_connect_mysql();
$msg = '';


if (isset($_GET['id'])) {
    if (!empty($_POST)) {

        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $menu = isset($_POST['menu']) ? $_POST['menu'] : '';
        $nomortelpon = isset($_POST['nomortelpon']) ? $_POST['nomortelpon'] : '';
        $harga = isset($_POST['harga']) ? $_POST['harga'] : '';

        $stmt = $pdo->prepare('UPDATE pemesan SET id = ?, nama = ?, menu = ?, nomortelpon = ?, harga = ? WHERE id = ?');
        $stmt->execute([$id, $nama, $menu, $nomortelpon, $harga, $_GET['id']]);
        $msg = 'UPDATE BERHASIL';
    }

    $stmt = $pdo->prepare('SELECT * FROM pemesan WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$contact) {
        header('Location: read.php');
        exit(); // Pastikan untuk keluar setelah mengalihkan
    }
    
} else {
    exit('TIDAK ADA ID');
}
?>

<?=template_header('Update')?>

<style>

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
    max-width: 200px; /* Atur lebar maksimum untuk label */
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
        <h2>Ubah Pesanan</h2>
        <form action="update.php?id=<?=$contact['id']?>" method="post">
            <label for="id">NO PESANAN</label>
            <input type="text" name="id" value="<?=$contact['id']?>" id="id">
            <label for="nama">Nama</label>
            <input type="text" name="nama" value="<?=$contact['nama']?>" id="nama">
            <label for="menu">menu</label>
            <input type="text" name="menu" value="<?=$contact['menu']?>" id="menu">
            <label for="nomortelpon">No. Telpon</label>
            <input type="text" name="nomortelpon" value="<?=$contact['nomortelpon']?>" id="nomortelpon">
            <label for="harga">Jumlah Harga</label>
            <input type="text" name="harga" value="<?=$contact['harga']?>" id="harga">
            <input type="submit" value="Update">
        </form>


        <?php if ($msg): ?>
        <p><?=$msg?></p>
        <?php endif; ?>
    </div>
</div>

<?=template_footer()?>
