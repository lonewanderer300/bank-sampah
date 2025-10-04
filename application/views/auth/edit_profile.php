<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Biodata</h2>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('dashboard/edit_profile'); ?>">
        <div class="form-group mb-3">
            <label for="nama_nasabah">Nama Nasabah</label>
            <input type="text" class="form-control" id="nama_nasabah" name="nama_nasabah"
                   value="<?= isset($biodata->nama_nasabah) ? $biodata->nama_nasabah : '' ?>" readonly>
        </div>

        <div class="form-group mb-3">
            <label for="no_ktp">No KTP</label>
            <input type="text" class="form-control" id="no_ktp" name="no_ktp"
                   value="<?= isset($biodata->no_ktp) ? $biodata->no_ktp : '' ?>" readonly>
        </div>

        <div class="form-group mb-3">
            <label for="nomer_hp">Nomor HP</label>
            <input type="text" class="form-control" id="nomer_hp" name="nomer_hp"
                   value="<?= isset($biodata->nomer_hp) ? $biodata->nomer_hp : '' ?>">
        </div>

        <div class="form-group mb-3">
            <label for="nama_bank">Nama Bank</label>
            <input type="text" class="form-control" id="nama_bank" name="nama_bank"
                   value="<?= isset($biodata->nama_bank) ? $biodata->nama_bank : '' ?>">
        </div>

        <div class="form-group mb-3">
            <label for="no_rekening">No Rekening</label>
            <input type="text" class="form-control" id="no_rekening" name="no_rekening"
                   value="<?= isset($biodata->no_rekening) ? $biodata->no_rekening : '' ?>">
        </div>

        <div class="form-group mb-3">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat"
                   value="<?= isset($biodata->alamat) ? $biodata->alamat : '' ?>">
        </div>

        <div class="row">
            <div class="col-md-2 mb-3">
                <label for="rt">RT</label>
                <input type="text" class="form-control" id="rt" name="rt"
                       value="<?= isset($biodata->rt) ? $biodata->rt : '' ?>">
            </div>
            <div class="col-md-2 mb-3">
                <label for="rw">RW</label>
                <input type="text" class="form-control" id="rw" name="rw"
                       value="<?= isset($biodata->rw) ? $biodata->rw : '' ?>">
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="kelurahan">Kelurahan</label>
            <input type="text" class="form-control" id="kelurahan" name="kelurahan"
                   value="<?= isset($biodata->kelurahan) ? $biodata->kelurahan : '' ?>">
        </div>

        <div class="form-group mb-3">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                   value="<?= isset($biodata->kecamatan) ? $biodata->kecamatan : '' ?>">
        </div>

        <div class="form-group mb-3">
            <label for="kota">Kota</label>
            <input type="text" class="form-control" id="kota" name="kota"
                   value="<?= isset($biodata->kota) ? $biodata->kota : '' ?>">
        </div>

        <div class="form-group mb-3">
            <label for="provinsi">Provinsi</label>
            <input type="text" class="form-control" id="provinsi" name="provinsi"
                   value="<?= isset($biodata->provinsi) ? $biodata->provinsi : '' ?>">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="<?= site_url('dashboard/profile'); ?>" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
