     <div id="ModalAsuransiEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> <div class="modal-dialog">
      <div class="col-md-14">
                <div class="modal-content">
                    <div class="modal-header">
                         
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Data Asuransi <button type="button" class="close" aria-label="Close" onclick="$('#ModalAsuransiEdit').modal('hide');"><span>&times;</span></button></h4>                        
                    </div>

                  <div class="box">
                <table id="tableAsuransie" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>Kode Asuransi</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>No Telp</th>
                          <th>NPWP</th>
                          <th></th>
                </tr>
                </thead>
                <tbody>  
                <?php
                                    $j=1;
                                    $sqlcatat = "SELECT * FROM t_asuransi ORDER BY id_asuransi ASC";
                                    $rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){
                                ?>
                        <tr>
                          <td><?php echo $catat['id_asuransi'];?></td>
                          <td><?php echo $catat['nama'];?></td>
                          <td><?php echo $catat['alamat'];?></td>
                          <td><?php echo $catat['no_telp'];?></td>
                          <td><?php echo $catat['npwp'];?></td>
                          <td>
                                     <button type="button" class="btn btn btn-default btn-circle" onclick="pilihAsuransie('<?php echo $catat['id_asuransi'];?>','<?php echo $catat['nama'];?>');">Pilih</button>
                          </td>
                        </tr>
                    <?php }?>                        
                </tfoot>
              </table>
              </div>
              </div>
              </div>
              </div>
              </div>
              <script type="text/javascript">
                $('#tableAsuransie').DataTable();
                 function pilihAsuransie(a,b){
                              $("#asuransie").val(a);
                              $("#asuransinme").val(b);
                              $("#ModalAsuransiEdit").modal('hide');  
                 }

               //function selectAsuransi(a,b){
                //alert('ook');
                             //$("#asuransi").val(a);
                              //$("#asuransinm").val(b);
                              //$("#ModalAsuransi").modal('hide');
              //}              
              </script>

  <style type="text/css">
  .modal-header {
    padding-top: 15px;padding-bottom: 15px;
  }
  .title-header {
    font-size: 20px;
    text-align: center;
    font-weight: bold;
    font-family: monospace;
  }
  .modal-content {
    height: 556px;
  }
  .row {
    margin-left: 0px;
    margin-right: 0px;
    margin-top:10px;
  }
  .modal-title {
    padding-top: 5px;padding-bottom: 5px;
  }
</style>

