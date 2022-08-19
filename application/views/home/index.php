<div class="container">
    <h3>Daftar Rapat <?= $this->session->userdata('pppomn_nama') ?></h3>
    <?php if($this->session->flashdata('pesan')) : ?>
        <div class="alert alert-<?= $this->session->flashdata('warna') ;?> alert-dismissible fade show mt-2" role="alert">
            <?= $this->session->flashdata('pesan'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <a href="<?= MYURL.'home/tambah' ;?>" class="btn btn-primary mb-3 mt-3">Tambah Data</a>
    <div class="table-responsive">
        <table class="table table-sm table-border text-center" id="tabel" border=1>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Rapat</th>
                    <th>Lokasi</th>
                    <th>ID Meeting</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1 ; ?>
                <?php foreach($data as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['judul'] ?></td>
                        <td><?= $row['tempat'] ?></td>
                        <td><?= $row['tgl_rapat'] ?></td>
                        <td><?= $row['meeting'] ?></td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>