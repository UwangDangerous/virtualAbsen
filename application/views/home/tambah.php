<div class="container">
    <h3> Tambah Rapat </h3>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" id="mybread">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= MYURL ;?>">Rapat</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>

    <div class="mt-5">
        <form action="" method="post">
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="judul">Nama Rapat <i class="text-danger">*</i></label>
                    <input type="text" name="judul" id="judul" class="form-control" value="<?= set_value("judul") ;?>">
                    <i class="text-danger"><?= form_error("judul"); ?></i>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="tempat">Lokasi <i class="text-danger">*</i></label>
                    <input type="text" name="tempat" id="tempat" class="form-control" value="<?= set_value("tempat") ;?>">
                    <i class="text-danger"><?= form_error("tempat"); ?></i>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="tgl_rapat">Tanggal Rapat <i class="text-danger">*</i></label>
                    <div class="row">
                        <div class="col">
                            <input type="date" name="tgl_rapat" id="tgl_rapat" class="form-control" value="<?= set_value("tgl_rapat") ;?>">
                            <i class="text-danger"><?= form_error("tgl_rapat"); ?></i>
                        </div>
                        <div class="col">
                            <input type="time" name="jam_rapat" id="jam_rapat" class="form-control" value="<?= set_value("jam_rapat") ;?>">
                            <i class="text-danger"><?= form_error("jam_rapat"); ?></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="meeting">ID Meeting</label>
                    <input type="text" name="meeting" id="meeting" class="form-control" value="<?= set_value("meeting") ;?>">
                </div>
                <?php if($this->session->userdata('pppomn') == 1) : ?>
                    <div class="col-lg-12 mb-3">
                        <label for="token_zoom">Token Zoom</label>
                        <textarea name="token_zoom" id="token_zoom" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                <?php else : ?>
                    <input type="hidden" name="token_zoom" value="">
                <?php endif; ?>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>