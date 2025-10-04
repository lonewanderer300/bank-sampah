<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
<h2>Profile Saya</h2>
<a href="<?= site_url('dashboard/edit_profile') ?>">Edit Profile</a> | 
<a href="<?= site_url('dashboard') ?>">Kembali ke Dashboard</a>

<?php if($biodata): ?>
    <p><b>Nama:</b> <?= $biodata->nama_nasabah ?></p>
    <p><b>No KTP:</b> <?= $biodata->no_ktp ?></p>
    <p><b>No HP:</b> <?= $biodata->nomer_hp ?></p>
    <p><b>Nama Bank:</b> <?= $biodata->nama_bank ?></p>
    <p><b>No Rekening:</b> <?= $biodata->no_rekening ?></p>
    <p><b>Alamat:</b> <?= $biodata->alamat ?>, RT <?= $biodata->rt ?>/RW <?= $biodata->rw ?>, 
    Kel. <?= $biodata->kelurahan ?>, Kec. <?= $biodata->kecamatan ?>,
    Kota <?= $biodata->kota ?>, Provinsi <?= $biodata->provinsi ?></p>
<?php else: ?>
    <p>Biodata belum diisi.</p>
<?php endif; ?>
</body>
</html>
