<?php 
// echo "IP address".$_SERVER["REMOTE_ADDR"] ;

// echo "LAN Address".$_SERVER["HTTP_X_FORWARDED_FOR"]  ;
// die ;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <link rel="stylesheet" href="<?=base_url(); ?>assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/fontAwesome/css/all.css">
        <link rel="stylesheet" href="<?= base_url();?>assets/css/dataTables.bootstrap4.min.css">
        
        <link rel="stylesheet" href="<?=base_url(); ?>assets/css/mystyle.css">
        <link rel="stylesheet" href="<?=base_url(); ?>assets/css/navbar.css">

        <title><?= $judul ; ?></title>
        <link rel="icon" href="<?= base_url();?>assets/img/logo-bpom.png">
        
        <script src="<?= base_url(); ?>assets/js/jquery.js" ></script>
        
        <script src="<?= base_url(); ?>assets/js/dataTables.js" ></script>
        <script src="<?= base_url(); ?>assets/js/dataTables.bootstrap4.min.js" ></script>
        
    </head> 
    <body class="bg-primary">
    
            <!-- <section>
                asdf
            </section> -->
        <div class="p-3">
            <div class="card container p-3"> 
                <?php if($form == null) : ?>
                    <i class="text-danger">Kosong</i>
                <?php else : ?>
                    <div class="card border-primary p-3  mb-3">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4><?= $form['judul']; ?></h4>
                                    </div>
                                    <img src="<?= base_url(); ?>assets/img/logo.png" alt="" width="110px" height="35px">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card border-primary p-3">
                        <?php if(!empty($this->session->flashdata('pesan') )) : ?>
                        
                            <div class="alert alert-<?= $this->session->flashdata('warna') ;?> alert-dismissible fade show" role="alert">
                                <?=  $this->session->flashdata('pesan'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <br>
                    
                        <?php endif ; ?>
                        <form action="" method="post" id="myform">
                            <div class="row">
                                <input type="hidden" name="id_absen" value="<?= $form['id_absen']; ?>">

                                <div class="col-lg-12 mb-3">
                                    <label for="nama">Nama Pegawai <span class="text-danger">*</span></label>
                                    <input type="text" name="nama" id="nama" class='form-control' value="<?= set_value('nama') ;?>">
                                    <span class="text-danger" style="font-size:9pt"><?= form_error('nama'); ?></span>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label for="nip">Nip <span class="text-danger">*</span></label>
                                    <input type="text" name="nip" id="nip" class='form-control' value="<?= set_value('nip') ;?>">
                                    <span class="text-danger" style="font-size:9pt"><?= form_error('nip'); ?></span>
                                </div>

                                <div class="col-lg-12">
                                    <label for="kehadiran">Kehadiran <span class="text-danger">*</span></label>
                                    <span class="text-danger" style="font-size:9pt"><?= form_error('kehadiran'); ?></span>
                                </div>
                                <div class="col-lg-2 mb-3">
                                    <input type="radio" id="wfo" name="kehadiran" value="WFO">
                                    <label for="wfo">WFO</label>
                                </div>
                                <div class="col-lg-2 mb-3">
                                    <input type="radio" id="wfh" name="kehadiran" value="WFH">
                                    <label for="wfh">WFH</label>
                                </div>
                                <div class="col-lg-2 mb-3">
                                    <input type="radio" id="dinas" name="kehadiran" value="dinas">
                                    <label for="dinas">Dinas</label>
                                </div>
                                
                                <div class="col-lg-12">
                                    <label for="bidang">Bidang / Balai <span class="text-danger">*</span></label>
                                    <span class="text-danger" style="font-size:9pt"><?= form_error('bidang'); ?></span>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <input type="radio" id="1" name="bidang" value="Kepala PPPOMN">
                                    <label for="1">Kepala PPPOMN</label>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <input type="radio" id="2" name="bidang" value="Poksi Pengembangan Pengujian Kimia Obat, Bahan Obat dan NAPPZA">
                                    <label for="2">Poksi Pengembangan Pengujian Kimia Obat, Bahan Obat dan NAPPZA</label>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <input type="radio" id="3" name="bidang" value="Poksi Pengembangan Pengujian Kimia Pangan Olahan dan Air">
                                    <label for="3">Poksi Pengembangan Pengujian Kimia Pangan Olahan dan Air</label>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <input type="radio" id="4" name="bidang" value="Poksi Pengembangan Pengujian Kimia OTOKSKKos">
                                    <label for="4">Poksi Pengembangan Pengujian Kimia OTOKSKKos</label>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <input type="radio" id="5" name="bidang" value="Poksi Pengembangan Pengujian MBM">
                                    <label for="5">Poksi Pengembangan Pengujian MBM</label>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <input type="radio" id="6" name="bidang" value="Poksi Pengembangan Baku Pembanding">
                                    <label for="6">Poksi Pengembangan Baku Pembanding</label>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <input type="radio" id="7" name="bidang" value="Sub Bagian Tata Usaha">
                                    <label for="7">Sub Bagian Tata Usaha</label>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <input type="radio" id="8" name="bidang" value="Balai Pengujian Khusus Obat dan Makanan">
                                    <label for="8">Balai Pengujian Khusus Obat dan Makanan</label>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <input type="radio" id="9" name="bidang" value="Balai Kalibrasi">
                                    <label for="9">Balai Kalibrasi</label>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <input type="radio" id="10" name="bidang" value="Balai Pengujian Produk Biologi">
                                    <label for="10">Balai Pengujian Produk Biologi</label>
                                </div>

                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class='form-control mb-3'>
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class='form-control mb-3'>
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class='form-control mb-3'>
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class='form-control mb-3'>
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class='form-control mb-3'>
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class='form-control mb-3'>
                                
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </form>

                    </div>
                <?php endif ; ?>
            </div>
        </div>


        <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.bundle.js" ></script>
        <script src="<?= base_url(); ?>assets/js/script.js" ></script>

    </body>
</html>