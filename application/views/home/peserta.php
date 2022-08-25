<div class="container">
    <h3>Daftar Peserta Rapat <?= $judul_halaman ?></h3>

    <div class="table-responsive">
        <table class="table table-sm table-border text-center" id="tabel" border=1>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP/NIK</th>
                    <th>Nama</th>
                    <th>Kehadiran</th>
                    <th>Unit</th>
                    <th>Bidang/Balai</th>
                    <th>Tanda Tangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1 ; ?>
                <?php foreach($data as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nip'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td>
                            <?= $row['kehadiran'] ?>
                        </td>
                        <td><?= $row['unit'] ?></td>
                        <td>
                            <?= $row['bidang'] ?>
                        </td>
                        <td>
                            <img src="<?= $row['tanda_tangan'];?>" alt="" height="80px">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>