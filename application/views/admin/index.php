<div class="container">
    <h3> Daftar Admin Virtual Absen </h3>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" id="mybread">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= MYURL ;?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Admin</li>
        </ol>
    </nav>

    <?php if($this->session->flashdata('pesan')) : ?>
        <div class="alert alert-<?= $this->session->flashdata('warna') ;?> alert-dismissible fade show mt-2" role="alert">
            <?= $this->session->flashdata('pesan'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="table-responsive mt-5">
        <a href="<?= MYURL; ?>admin/tambah" class="btn btn-primary mb-3">Tambah Admin</a>
        <table class="table table-sm table-border text-center" id="tabel" border=1>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Unit</th>
                    <th>Nama Lain</th>
                    <th>Username</th>
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
                        <td><?= $row['username'] ?></td>
                        <td>
                            <a href="<?= MYURL ;?>admin/ubah/<?= $row['id'] ;?>" class="badge bg-success" data-toggle="tooltip" title="Ubah Data"><i class="fa fa-edit"></i></a>
                            <a href="<?= MYURL ;?>admin/hapus/<?= $row['id'] ;?>" class="badge bg-danger" data-toggle="tooltip" title="Hapus Data" onclick="return confirm('yakin?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>    
            </tbody>
        </table>
    </div>
</div>