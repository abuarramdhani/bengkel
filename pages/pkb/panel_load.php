      <?php
            include_once '../../lib/config.php';
            $idpkb=$_GET['idpkb'];
      ?>
      <table id="pkbpanel" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>Nama</th>
                          <th>Harga</th>
                          <th>Diskon</th>
                          <th>Harga</th>                          
                          <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                                    $j=1;
                                    $sqlcatat = "SELECT * FROM t_pkb_panel_detail WHERE fk_pkb='$idpkb' ORDER BY id ASC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                        <tr>
                          <td ><?php echo $catat['fk_panel'];?></td>
                          <td ><?php echo $catat['harga_jual_panel'];?></td>
                          <td ><?php echo $catat['harga_diskon_panel'];?></td>
                          <td ><?php echo $catat['harga_total_pkb_panel'];?></td>
                          <td >
                                        <button type="button" class="btn btn btn-default btn-circle" id="<?php echo $catat['id'];?>" onclick="open_modalpanel(id='<?php echo $catat['id'];?>');"><span>Edit</span></button>

                                    </td>
                        </tr>
                    <?php }?>
                   
                </tfoot>
              </table>
              <script>
            $('#pkbpanel').DataTable();
          
         
            function open_modalpanel(z){
                              $.ajax({
                                  url: "pkb/panel_edit.php?idpkb=<?php echo $idpkb;?>&id="+z,
                                  type: "GET",
                                  success: function (ajaxData){
                                      $("#ModalEditPanel").html(ajaxData);
                                      $("#ModalEditPanel").modal({backdrop: 'static', keyboard:false});
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