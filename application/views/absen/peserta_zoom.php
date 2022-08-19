<h2><?= $absen['judul'] ;?></h2>
<p>
    <?= $this->Utility_model->formatTanggal($absen['tgl_absen']) ; ?> <br>
    ID Meeting : <?= $absen['meeting'] ;?>
</p>
<br>

<form action="" method="post" id="getPeserta">
    <input type="hidden" name="id" value="<?= $absen['meeting']; ?>">
    <input type="hidden" name="token" value="<?= $absen['token_zoom']; ?>">
    <button type="submit" class="btn btn-primary">Ambil data peserta zoom</button>
</form>

<div id="tabel_zoom">

</div>

<script>
    $("#getPeserta").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '<?= MYURL; ?>absen/dataPesertaZoomApi/<?= $absen['id_absen'] ;?>',
            type: 'post',
            data: $(this).serialize(),             
            success: function(data) {   
                $("#tabel_zoom").html(data) ; 
            }
        });
    });
</script>