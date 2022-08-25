<h3>Daftar Peserta Rapat <?= $halaman['judul'] ?></h3>
<p>
    <?= $this->Utility_model->formatTanggal($halaman['tgl_rapat']) ; ?> <br>
    ID Meeting : <?= $halaman['meeting'] ;?>
</p>
<br>

<?php if($halaman['status'] == 0) : ?>
    <form action="" method="post" id="getPeserta">
        <input type="hidden" name="id" value="<?= $halaman['meeting']; ?>">
        <input type="hidden" name="token" value="<?= $halaman['token_zoom']; ?>">
        <button type="submit" class="btn btn-primary">Ambil data peserta zoom</button>
    </form>
<?php endif; ?>

<div id="tabel_zoom">
    <div class="table-responsive">
        <table class="table table-sm table-striped table-border text-center" id="tabel" border=1>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>IP</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($variable as $variables) : ?>
                    
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $("#getPeserta").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '<?= MYURL; ?>home/dataPesertaZoomApi/<?= $halaman['id_rapat'] ;?>',
            type: 'post',
            data: $(this).serialize(),             
            success: function(data) {   
                $("#tabel_zoom").html(data) ; 
            }
        });
    });
</script>