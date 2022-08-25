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
        

        <script type="text/javascript" src="<?= base_url(); ?>sigSample/signature.js"></script>
        
        <style>
            #note{position:absolute;left:50px;top:35px;padding:0px;margin:0px;cursor:default;}
        </style>
    </head> 
    <body class="bg-primary">
    <div id="signature-pad">
            <!-- <section>
                asdf
            </section> -->
        <div class="p-3">
            <div class="card container p-3"> 
                <?php if($form == null) : ?>
                    <div class="text-center">
                        <i class="text-danger">Tidak Ada Rapat</i>
                    </div>
                <?php else : ?>
                    <div class="card border-primary p-3  mb-3">
                        <div class="row">
                            <div class="col">
                                <div class="text-center">
                                    <div>
                                        <h4><?= $form['judul'] ?></h4>
                                        <span>
                                            <?= $form['nama_admin'] ?> <br>
                                            <?php 
                                                $tgl = explode(" ", $form['tgl_rapat']) ;
                                                echo $this->Utility_model->formatTanggal($tgl[0]).' '. $tgl[1] ;
                                            ?> <br>
                                            <?php if($form['meeting'] != '') : ?>
                                                <b>ID MEETING <?=  $form['meeting']; ?></b>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                    <!-- <img src="<?//= base_url(); ?>assets/img/logo.png" alt="" width="110px" height="35px"> -->
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
                        <form action="" method="post" id="myform" enctype="multipart/form-data">
                            <div class="row">
                                <input type="hidden" name="id_rapat" value="<?= $form['id_rapat']; ?>">

                                <div class="col-lg-6 mb-3">
                                    <label for="nip">NIP/NIK <span class="text-danger">*</span></label>
                                    <input type="text" name="nip" id="nip" class='form-control' value="<?= set_value('nip') ;?>">
                                    <span class="text-danger" style="font-size:9pt"><?= form_error('nip'); ?></span>
                                </div>
                                
                                <div class="col-lg-6 mb-3">
                                    <label for="nama">Nama Pegawai <span class="text-danger">*</span></label>
                                    <input type="text" name="nama" id="nama" class='form-control' value="<?= set_value('nama') ;?>">
                                    <span class="text-danger" style="font-size:9pt"><?= form_error('nama'); ?></span>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="unit">Unit Kerja <span class="text-danger">*</span></label>
                                    <input type="text" name="unit" id="unit" class='form-control' value="<?= set_value('unit') ;?>">
                                    <span class="text-danger" style="font-size:9pt"><?= form_error('unit'); ?></span>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="bidang">Bidang / Balai <span class="text-danger">*</span></label>
                                    <input type="text" name="bidang" id="bidang" class='form-control' value="<?= set_value('bidang') ;?>">
                                    <span class="text-danger" style="font-size:9pt"><?= form_error('bidang'); ?></span>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="kehadiran">Kehadiran <span class="text-danger">*</span></label>
                                    <br>
                                    <input type="radio" id="wfo" name="kehadiran" value="WFO">
                                    <label for="wfo">WFO</label>
                                    <br>
                                    <input type="radio" id="wfh" name="kehadiran" value="WFH">
                                    <label for="wfh">WFH</label>
                                    <br>
                                    <input type="radio" id="dinas" name="kehadiran" value="dinas">
                                    <label for="dinas">Dinas</label>
                                    <br>
                                    <span class="text-danger" style="font-size:9pt"><?= form_error('kehadiran'); ?></span>
                                </div>

                                <!-- tanda tangan -->
                                <div class="col-lg-6 mb-3">
                                    <label for="">Tanda Tangan <span class="text-danger">*</span></label>
                                    
                                        <div style="border:solid 1px teal; width:360px;height:110px;padding:3px;position:relative;">
                                            <div id="note" onmouseover="my_function();">Tanda Tangan</div>
                                            <canvas id="the_canvas" width="350px" height="100px"></canvas>
                                        </div>
                                        <!-- <div style="margin:10px;"> -->
                                            <input type="hidden" id="signature" name="signature">
                                            <!-- <button type="submit" id="save_btn" class="btn btn-primary" data-action="save-png"><span class="glyphicon glyphicon-ok"></span> Save as PNG</button> -->
                                        <!-- </div> -->
                                        <a href="" id="clear_btn"  data-action="clear">Clear</a>
                                    </div>
                                    
                                </div>
                                <button type="submit" id="save_btn" data-action="save-png" class="btn btn-outline-primary">Simpan</button>
                        </form>

                    </div>
                <?php endif ; ?>
            </div>
        </div>
    </div>


        <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.bundle.js" ></script>
        <script src="<?= base_url(); ?>assets/js/script.js" ></script>

        <script>
            $("#nip").keyup(function(e){
                if($("#nip").val() != ''){
                    e.preventDefault();
                    $.ajax({
                        url: '<?= MYURL; ?>absen/checkUser/'+$("#nip").val(),
                        data: $(this).serialize(),             
                        success: function(data) {   
                            data = data.split('|') ;
                            $("#nama").val(data[0])
                            $("#unit").val(data[1])
                            $("#bidang").val(data[2])
                        }
                    });
                }
            });
        </script>

        <script>
            var wrapper = document.getElementById("signature-pad");
            var clearButton = wrapper.querySelector("[data-action=clear]");
            var savePNGButton = wrapper.querySelector("[data-action=save-png]");
            var canvas = wrapper.querySelector("canvas");
            var el_note = document.getElementById("note");
            var signaturePad;
            signaturePad = new SignaturePad(canvas);
            clearButton.addEventListener("click", function (event) {
            document.getElementById("note").innerHTML="The signature should be inside box";
            signaturePad.clear();
            });
            savePNGButton.addEventListener("click", function (event){
            if (signaturePad.isEmpty()){
                alert("Please provide signature first.");
                event.preventDefault();
            }else{
                var canvas  = document.getElementById("the_canvas");
                var dataUrl = canvas.toDataURL();
                document.getElementById("signature").value = dataUrl;
            }
            });
            function my_function(){
            document.getElementById("note").innerHTML="";
            }
        </script>

    </body>
</html>