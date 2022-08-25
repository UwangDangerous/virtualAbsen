<body id="my-bg">
    <div class="container">
        <div class="row justify-content-center" id="home">
            <div class="col-lg-11">
                <div class="card p-2 text-center">
                    <?php if($this->session->flashdata('pesan')) : ?>
                        <div class="alert alert-<?= $this->session->flashdata('warna') ;?> alert-dismissible fade show mt-2 mb-3" role="alert">
                            <?= $this->session->flashdata('pesan'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <h3>Daftar Rapat PPPOMN</h3>

                    <div class="table-responsive">
                        <table class="table table-sm table-border text-center" id="tabel" border=1>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Admin</th>
                                    <th>Rapat</th>
                                    <th>Lokasi</th>
                                    <th>Tanggal Rapat</th>
                                    <th>ID Meeting</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1 ; ?>
                                <?php foreach($data as $row) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama_admin'] ?></td>
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
                                            <a href="<?= MYURL; ?>absen/form/<?= $row['id_rapat']; ?>" class="badge bg-primary" target="blank"><i class="fas fa-clipboard-list"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <span class="mt-5 mb-3" style="font-size:8pt; ">
                        Copyright &#169; Pusat Pengembangan Pengujian Obat Dan Makanan Nasional 2022 <br>
                        <?php if($this->session->userdata('pppomn') != null) : ?>
                            <a href="<?= MYURL ;?>home/rapat">Dashboard</a>
                        <?php endif; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>