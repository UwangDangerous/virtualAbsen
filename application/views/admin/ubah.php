<div class="container">
    <h3> Ubah Data Akun Admin </h3>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" id="mybread">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
            <li class="breadcrumb-item"><a href="<?= MYURL ;?>/admin">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
        </ol>
    </nav>

    <div class="mt-5">
        <form action="" method="post">
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="nama_admin">Nama Admin / Balai / Unit <i class="text-danger">*</i></label>
                    <input type="text" name="nama_admin" id="nama_admin" class="form-control" value="<?= $data["nama_admin"] ;?>">
                    <i class="text-danger"><?= form_error("nama_admin"); ?></i>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="nama_lain">Nama Lain <i class="text-danger">*</i></label>
                    <input type="text" name="nama_lain" id="nama_lain" class="form-control" value="<?= $data["nama_lain"] ;?>">
                    <i class="text-danger"><?= form_error("nama_lain"); ?></i>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="kosongkan jika tidak digunakan">
                    <input type="hidden" name="username_lama" value="<?= $data["username"] ;?>">
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="kosongkan jika tidak digunakan">
                    <input type="hidden" name="password_lama" value="<?= $data["password"] ;?>">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
        </form>
    </div>
</div>