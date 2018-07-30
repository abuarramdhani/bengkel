      <?php
            include_once '../../lib/config.php';
            $idestimasi=$_GET['idestimasi'];
      ?>
      <table id="estimasipart" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>Nama</th>
                          <th>Harga</th>                          
                          <th>Diskon</th>
                          <th>Qty</th>
                          <th>Harga</th>                          
                          <th><button type="button" class="btn btn btn-default btn-circle" onclick="open_addpart(idestimasi='<?php echo $idestimasi;?>');"><span>Tambah</span></button></th>
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat = "SELECT * FROM t_estimasi_part_detail WHERE fk_estimasi='$idestimasi' ORDER BY id ASC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                        <tr>
                          <td ><?php echo $catat['fk_part'];?></td>
                          <td ><?php echo $catat['harga_jual_part'];?></td>
                          <td ><?php echo $catat['qty_part'];?></td>
                          <td ><?php echo $catat['harga_diskon_part'];?></td>
                          <td ><?php echo $catat['harga_total_estimasi_part'];?></td>
                          <td >
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id'];?>" onclick="open_modalpart(id='<?php echo $catat['id'];?>');"><span>Edit</span></button>
                                         <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id'];?>" onclick="open_delpart(id='<?php echo $catat['id'];?>');"><span>Hapus</span></button>

                                    </td>
                        </tr>
                    <?php }?>
                </tfoot>
              </table>
              <script>
            $('#estimasipart').DataTable();
          
           function open_addpart(x){
              $.ajax({
                    url: "estimasi/part_add.php?idestimasi="+x,
                    type: "GET",
                      success: function (ajaxData){
                        $("#ModalAddPart").html(ajaxData);
                        $("#ModalAddPart").modal('show',{backdrop: 'true'});
                      }
                    });
              }
           function open_delpart(y){
                                $.ajax({
                                    url: "estimasi/part_del.php?id="+y,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#ModalDeletePart").html(ajaxData);
                                        $("#ModalDeletePart").modal('show',{backdrop: 'true'});
                                    }
                                });
            };
            function open_modalpart(z){
                              $.ajax({
                                  url: "estimasi/estimasi_edit.php?idestimasi=<?php echo $idestimasi;?>&id="+z,
                                  type: "GET",
                                  success: function (ajaxData){
                                      $("#ModalEditPart").html(ajaxData);
                                      $("#ModalEditPart").modal('show',{backdrop: 'true'});
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