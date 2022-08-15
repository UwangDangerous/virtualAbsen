<h2>Tambah Meeting Untuk Absen</h2>
<br>

<form action="" method="post">
    <label for="judul">Judul <i class="text-danger">*</i></label>
    <input type="text" name="judul" id="judul" class='form-control mb-3' value="<?= set_value('judul') ;?>">
    <small id="usernameHelp" class="form-text text-danger"><?= form_error('judul'); ?></small>

    <label for="tgl_absen">Tanggal Rapat <i class="text-danger">*</i></label>
    <input type="date" name="tgl_absen" id="tgl_absen" class='form-control mb-3' value="<?= set_value('tgl_absen') ;?>">
    <small id="usernameHelp" class="form-text text-danger"><?= form_error('tgl_absen'); ?></small>

    <label for="meeting">ID Meeting <i class="text-danger">*</i></label>
    <input type="number" name="meeting" id="meeting" class='form-control mb-3' value="<?= set_value('meeting') ;?>">
    <small id="usernameHelp" class="form-text text-danger"><?= form_error('meeting'); ?></small>
    
    <button class="btn btn-primary" type="submit">
        Simpan
    </button>
</form>
