<div class="container">
    <h3> Daftar Admin Virtual Absen </h3>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" id="mybread">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= MYURL ;?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Admin</li>
        </ol>
    </nav>

    <div class="table-responsive mt-5">
        <a href="<?= MYURL; ?>admin/tambah" class="btn btn-primary mb-3">Tambah Admin</a>
        <table class="table table-sm table-border text-center" id="tabel" border=1>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Unit</th>
                    <th>Nama Lain</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach($admin as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nama_admin'] ?></td>
                        <td><?= $row['nama_lain'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>