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
                <?//php if($form == null) : ?>
                    <!-- <i class="text-danger">Kosong</i> -->
                <?//php else : ?>
                    <div class="card border-primary p-3  mb-3">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4></h4>
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
                                <!-- <input type="hidden" name="id_absen" value="<?//= $form['id_absen']; ?>"> -->

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
                            </div>
                                
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </form>

                    </div>
                <?//php endif ; ?>
            </div>
        </div>


        <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.bundle.js" ></script>
        <script src="<?= base_url(); ?>assets/js/script.js" ></script>

    </body>
</html>