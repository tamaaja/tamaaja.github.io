<?php
include 'koneksi.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id'])) {

    $stmt = $pdo->prepare('SELECT * FROM pemesan WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('DATA PESANAN TIDAK ADA');
    }

    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {

            $stmt = $pdo->prepare('DELETE FROM pemesan WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'PESANAN TELAH DIHAPUS';
        } else {

            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('INDEKS TIDAK ADA');
}
?>


<?=template_header('Delete')?>

<div class="content delete">
	<h2>CANCEL PESANAN</h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>ANDA INGIN MENGHAPUS PESANAN ?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$contact['id']?>&confirm=yes">Yes</a>
        <a href="delete.php?id=<?=$contact['id']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>