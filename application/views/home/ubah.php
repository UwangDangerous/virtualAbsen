<div class="container">
    <h3> Ubah Data Rapat </h3>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" id="mybread">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= MYURL ;?>home/rapat">Rapat</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
        </ol>
    </nav>

    <div class="mt-5">
        <form action="" method="post">
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="judul">Nama Rapat <i class="text-danger">*</i></label>
                    <input type="text" name="judul" id="judul" class="form-control" value="<?= $data["judul"] ;?>">
                    <i class="text-danger"><?= form_error("judul"); ?></i>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="tempat">Lokasi <i class="text-danger">*</i></label>
                    <input type="text" name="tempat" id="tempat" class="form-control" value="<?= $data["tempat"] ;?>">
                    <i class="text-danger"><?= form_error("tempat"); ?></i>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="tgl_rapat">Tanggal Rapat <i class="text-danger">*</i></label>
                    <?php $tgl = explode(' ',$data['tgl_rapat']) ?>
                    <div class="row">
                        <div class="col">
                            <input type="date" name="tgl_rapat" id="tgl_rapat" class="form-control" value="<?= $tgl[0] ;?>">
                            <i class="text-danger"><?= form_error("tgl_rapat"); ?></i>
                        </div>
                        <div class="col">
                            <input type="time" name="jam_rapat" id="jam_rapat" class="form-control" value="<?= $tgl[1] ;?>">
                            <i class="text-danger"><?= form_error("jam_rapat"); ?></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="meeting">ID Meeting</label>
                    <input type="text" name="meeting" id="meeting" class="form-control" value="<?= $data["meeting"] ;?>">
                </div>
                <?php if($this->session->userdata('pppomn') == 1) : ?>
                    <div class="col-lg-12 mb-3">
                        <label for="token_zoom">Token Zoom</label>
                        <textarea name="token_zoom" id="token_zoom" cols="30" rows="5" class="form-control"><?= $data["token_zoom"] ;?></textarea>
                    </div>
                <?php else : ?>
                    <input type="hidden" name="token_zoom" value="">
                <?php endif; ?>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
        </form>
    </div>
</div>