<h2>Absen Untuk Zoom Meeting</h2> <br>
<?php if(!empty($this->session->flashdata('pesan') )) : ?>
    <div class="alert alert-<?=  $this->session->flashdata('warna'); ?> alert-dismissible fade show" role="alert">
        <?=  $this->session->flashdata('pesan'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif ; ?>
<a href="<?= MYURL ;?>absen/tambah" class="btn btn-primary">Tambah Data</a>
<br><br>
<div class="table-responsive">
    <table class="table table-sm table-bordered text-center" id="tabel">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal Absen</th>
                <th>ID Meeting</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ; ?>
            <?php foreach ($absen as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['judul']; ?></td>
                    <td><?= $this->Utility_model->formatTanggal($row['tgl_absen']) ; ?></td>
                    <td><?= $row['meeting']; ?></td>
                    <td>
                        <a href="<?= MYURL; ?>absen/ubah/<?= $row['id_absen'];?>" class="badge badge-primary" data-toggle="tooltip" title="Absensi Peserta Rapat"><i class="fa fa-users"></i></a>
                        <a href="<?= MYURL; ?>absen/ubah/<?= $row['id_absen'];?>" class="badge badge-info" data-toggle="tooltip" title="Peserta Zoom"><i class="fa fa-user"></i></a>
                        <?php if($row['status'] == 0) : ?>
                            <a href="<?= MYURL; ?>absen/selesai/<?= $row['id_absen'];?>" class="badge badge-success" data-toggle="tooltip" title="Rapat Selesai" onclick="return confirm('Rapat Selesai?')"><i class="fa fa-check"></i></a>
                            <a href="#" class="badge badge-warning"  data-toggle="modal" data-target="#Modal_<?= $row['id_absen']; ?>" data-toggle="tooltip" title="Bagikan Link"><i class="fa fa-link"></i></a>
                            <a href="<?= MYURL; ?>absen/ubah/<?= $row['id_absen'];?>" class="badge badge-success" data-toggle="tooltip" title="Ubah Data"><i class="fa fa-edit"></i></a>
                            <a href="<?= MYURL; ?>absen/hapus/<?= $row['id_absen'];?>" class="badge badge-danger" data-toggle="tooltip" title="Hapus Data" onclick="return confirm('Hapus Data?')"><i class="fa fa-trash"></i></a>
                        <?php endif ; ?>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="Modal_<?= $row['id_absen'] ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Link Form</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                
                            <div class="modal-body">
                                <?= MYURL; ?>form/absensi/<?= $row['id_absen'] ; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ; ?>
        </tbody>
    </table>
</div>