<h2><?= $absen['judul'] ;?></h2>
<p>
    <?= $this->Utility_model->formatTanggal($absen['tgl_absen']) ; ?> <br>
    ID Meeting : <?= $absen['meeting'] ;?>
</p>
<br>

<div class="table-responsive">
    <table class="table table-sm table-bordered text-center" id="tabel">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nip</th>
                <th>Kehadiran</th>
                <th>Bidang/Balai</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ; ?>
            <?php foreach ($vir as $row) : ?>
                <?php 
                    $this->db->where('id_absen', $absen['id_absen']) ;
                    $this->db->where('ip_zoom', $row['alamat_ip']) ;
                    $zoom = $this->db->get('zoom_participant')->row_array() ;
                    if($zoom){

                        if($row['alamat_ip'] == $zoom['ip_zoom']) {
                            $hadir = 'alert-success' ;
                        }else{
                            $hadir = '' ;
                        }
                    }else{
                        $hadir = '' ;
                    }
                ?>
                <tr class="<?= $hadir ;?>">
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['nip']; ?></td>
                    <td><?= $row['kehadiran']; ?></td>
                    <td><?= $row['bidang']; ?></td>
                </tr>
            <?php endforeach ; ?>
        </tbody>
    </table>
</div>

<script>
    $("#tabel").dataTable() ;
</script>