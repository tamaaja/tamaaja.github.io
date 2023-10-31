<?php
include 'koneksi.php';
?>

<?=template_header('Home')?>

<style>
    /* Styling for the content */
    .content {
        background-color: #000;
        color: #FFD700; /* Warna Emas */
        text-align: center;
        padding: 50px;
    }

    .content h2 {
        font-size: 36px;
    }

    .content p {
        font-size: 18px;
    }
</style>

<div class="content">
    <h2>Selamat Datang di Restoran Kami!</h2>
    <p>Nikmati beragam menu lezat yang kami tawarkan dengan sentuhan khas restoran kami.</p>
</div>

<?=template_footer()?>
