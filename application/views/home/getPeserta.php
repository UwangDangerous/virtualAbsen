<?php 
    $this->db->where("id_rapat", $id_rapat);
    $this->db->delete('zoom_participant');
?>


<table class="table table-sm table-bordered text-center" id="table2">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Ip</th>
        </tr>
    </thead>
    <tbody>
        <?php $data = [] ; ?>
        <?php foreach ($peserta as $d) : ?>
          <tr>
                <td><?= $d['user_name']; ?></td>
                <td><?= $d['ip_address']; ?></td>
                <!-- <td><?//= $d['join_time']; ?></td> -->
          </tr>

          <?php 
            $data = [
                    'id_rapat' => $id_rapat,
                    'ip_zoom' => $d['ip_address'],
                    'nama_zoom' => $d['user_name'],
                ] ;

            $this->db->insert('zoom_participant', $data);
          ?>
        <?php endforeach ; ?>
    </tbody>
</table>

<script>
    $("#table2").dataTable() ;
</script>