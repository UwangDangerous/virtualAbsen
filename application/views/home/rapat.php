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
                    <th>Tanggal Rapat</th>
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
                        <td>
                            <?php 
                                $tgl = explode(" ", $row['tgl_rapat']) ;
                                echo $this->Utility_model->formatTanggal($tgl[0]).' '. $tgl[1] ;
                            ?>
                        </td>
                        <td><?= $row['meeting'] ?></td>
                        <td>
                            <?php if($row['status'] == 1) : ?>
                                <i class="text-success">Selesai</i>
                            <?php else : ?>
                                -
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($row['status'] == 0) : ?>
                                <a href="<?= MYURL ;?>home/ubahRapat/<?= $row['id_rapat']; ?>" class="badge bg-success" data-toggle="tooltip" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                <a href="<?= MYURL ;?>home/hapusRapat/<?= $row['id_rapat']; ?>" class="badge bg-danger" data-toggle="tooltip" title="Hapus Data" onclick="return confirm('Hapus Data?')"><i class="fa fa-trash"></i></a>
                                <a href="<?= MYURL ;?>home/selesai/<?= $row['id_rapat']; ?>" class="badge bg-success" data-toggle="tooltip" title="Rapat Telah Selesai" onclick="return confirm('Rapat Telah Selesai')"><i class="fa fa-check"></i></a>
                            <?php endif; ?>

                            <a href="<?= MYURL ;?>home/peserta/<?= $row['id_rapat']; ?>" class="badge bg-primary" data-toggle="tooltip" title="Rapat Telah Selesai"><i class="fa fa-users"></i></a>
                            <?php if($row['token_zoom'] != null) : ?>
                                <a href="<?= MYURL ;?>home/participant/<?= $row['id_rapat']; ?>" class="badge bg-info" data-toggle="tooltip" title="Rapat Telah Selesai"><i class="fa fa-user"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>