      <?php
            include_once '../../lib/config.php';
      ?>
      <table id="inventory1" class="table table-condensed table-bordered table-striped table-hover">
      
                <thead class="thead-light">
                <tr>
                          <th>Customer</th>
                          <th>No Chasis</th>
                          <th>No Mesin</th>
                          <th>No Polisi</th>
                          <th>Nama STNK</th>
                          <th>Alamat STNK</th>
                          <th>Tipe Kendaraan</th>
                          <th>Warna Kendaraan</th>
                         
                         
                          <th><button type="button" class="btn btn btn-default btn-circle open_add"><span>Tambah</span></button></th>
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat = "SELECT i.no_chasis,i.no_mesin,i.no_polisi,i.nama_stnk,i.alamat_stnk,t.nama AS nama_tipe,w.nama AS nama_warna, c.nama AS nama_customer FROM t_inventory_bengkel i LEFT JOIN t_customer c 
                  ON i.fk_customer=c.id_customer LEFT JOIN t_tipe_kendaraan t
                  ON i.fk_tipe_kendaraan=t.id_tipe_kendaraan LEFT JOIN t_warna_kendaraan w
                  ON i.fk_warna_kendaraan=w.id_warna_kendaraan";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>


                        <tr>
                          <td ><?php echo $catat['nama_customer'];?></td>
                          <td ><?php echo $catat['no_chasis'];?></td>
                          <td ><?php echo $catat['no_mesin'];?></td>
                          <td ><?php echo $catat['no_polisi'];?></td>
                          <td ><?php echo $catat['nama_stnk'];?></td>
                          <td ><?php echo $catat['alamat_stnk'];?></td>
                          <td ><?php echo $catat['nama_tipe'];?></td>
                          <td ><?php echo $catat['nama_warna'];?></td>
                                                
                          <td >
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['no_chasis']; ?>" onclick="open_modal(ideditas='<?php echo $catat['no_chasis']; ?>');"><span>Edit</span></button>
                                         <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['no_chasis']; ?>" onclick="open_del(iddelas='<?php echo $catat['no_chasis']; ?>');"><span>Hapus</span></button>

                                    </td>
                        </tr>
                    <?php }?>
                </tfoot>
              </table>
              <script>
             $('#inventory1').DataTable();
            $(".open_add").click(function (e){
                                //var m = $(this).attr("no_chasis");
                    $.ajax({
                    url: "inventory/inventory_add.php",
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalAdd").html(ajaxData);
                        $("#ModalAdd").modal('show',{backdrop: 'true'});
                      }
                    });
            });
           function open_del(){
                                $.ajax({
                                    url: "inventory/inventory_del.php?no_chasis="+iddelas,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#ModalDelete").html(ajaxData);
                                        $("#ModalDelete").modal('show',{backdrop: 'true'});
                                    }
                                });
            };
            function open_modal(){
                              $.ajax({
                                  url: "inventory/inventory_edit.php?no_chasis="+ideditas,
                                  type: "GET",
                                  success: function (ajaxData){
                                      $("#ModalEdit").html(ajaxData);
                                      $("#ModalEdit").modal('show',{backdrop: 'true'});
                                  }
                              });
            };
      </script>

<style type="text/css">
  .table {
    border-spacing: 0;
    border-collapse: collapse;
    margin-bottom: 0px;
  }
  .thead-light{
    background-color: lightgrey;
  }
  .btn {
    font-weight: bold;
    padding-bottom: 0px;
    padding-top: 3px;
    padding-left: 4px;
    padding-right: 4px;
  }
</style>