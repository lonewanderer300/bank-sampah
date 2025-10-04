<h3>Bank Sampah Saya</h3>
<table border="1">
    <tr>
        <th>Nama Bank Sampah</th>
        <th>Tanggal Daftar</th>
    </tr>
    <?php if (!empty($my_banks)) : ?>
        <?php foreach ($my_banks as $bank): ?>
            <tr>
                <td><?php echo $bank->nama_bank_sampah; ?></td>
                <td><?php echo $bank->tanggal_daftar; ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="2">Belum terdaftar di bank sampah manapun</td>
        </tr>
    <?php endif; ?>
</table>

<hr>

<h3>Pilih Bank Sampah</h3>

<form method="post" action="<?= site_url('auth/add_bank_sampah'); ?>">
    <div>
        <label>Bank Sampah</label>
        <select name="id_bank_sampah" class="form-control" required>
            <option value="">-- Pilih Bank Sampah --</option>
            <?php foreach($bank_sampah as $b): ?>
                <option value="<?= $b->id_bank_sampah ?>">
                    <?= $b->kemantren ?> - <?= $b->kelurahan ?> - <?= $b->nama_bank_sampah ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>

<hr>

<h3>Bank Sampah Saya</h3>
<table class="table">
    <thead>
        <tr>
            <th>Nama Bank Sampah</th>
            <th>Tanggal Daftar</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($my_banks)): ?>
            <?php foreach($my_banks as $m): ?>
                <tr>
                    <td><?= $m->nama_bank_sampah ?></td>
                    <td><?= $m->tanggal_daftar ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="2">Belum ada bank sampah terdaftar</td></tr>
        <?php endif; ?>
    </tbody>
</table>

