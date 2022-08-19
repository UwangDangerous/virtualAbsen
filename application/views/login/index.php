<body id="my-bg">
    <div class="container-fluid">
        <div class="row justify-content-center" id="login">
            <div class="col-lg-4">
                <div class="card p-2 text-center">
                    <span><img src="<?= base_url() ;?>assets/img/logo.png" width="100px" alt="<?= SEO; ?>"></span>
                    <h5 class="mt-3 mb-5">Login Virtual Absen PPPOMN</h5>

                    <?php if($this->session->flashdata('pesan') != null) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('pesan') ; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <div class="container">
                        <form action="" method="post">
                            <i class="text-danger" style="font-size:8pt"><?= form_error('username') ?></i>
                            <input type="text" name="username" id="username" class="form-control form-control-sm mb-4" placeholder="Username" value="<?= set_value('username') ?>">
                            <i class="text-danger" style="font-size:8pt"><?= form_error('password') ?></i>
                            <input type="password" name="password" id="password" class="form-control form-control-sm mb-4" placeholder="Password">
                            <div class="d-grid gap-2">
                                <button class="btn btn-sm btn-primary mb-5 mt-4" type="submit">Login</button>
                            </div>
                        </form>
                    </div>

                    <span class="mt-5 mb-3" style="font-size:8pt">
                        Copyright &#169; Pusat Pengembangan Pengujian Obat Dan Makanan Nasional 2022
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>