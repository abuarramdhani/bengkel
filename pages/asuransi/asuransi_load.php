			<?php
        		include_once '../../lib/config.php';
        	?>
			<table id_asuransi="example1" class="table table-condensed table-bordered table-striped ">
                <thead>
                <tr>
                          <th>Kode Asuransi</th>
                  		    <th>Nama</th>
                          <th>Alamat</th>
                          <th>No Telp</th>
                          <th>NPWP</th>
                          <th><button type="button" class="btn btn btn-default btn-circle open_add"><span>Tambah</span></button></th>
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
                          <td ><?php echo $catat['id_asuransi'];?></td>
                          <td ><?php echo $catat['nama'];?></td>
                          <td ><?php echo $catat['alamat'];?></td>
                          <td ><?php echo $catat['no_telp'];?></td>
                          <td ><?php echo $catat['npwp'];?></td>
                          <td >
                                        <!--<button type="button" class="btn btn btn-default btn-circle" id_asuransi="<?php echo $catat['id_asuransi']; ?>"><span class="fa fa-print"></span></button>-->
                                        <button type="button" class="btn btn btn-default btn-circle" id_asuransi="<?php echo $catat['id_asuransi']; ?>" onclick="open_modal(id_asuransiedit=<?php echo $catat['id_asuransi']; ?>);"><span>Edit</span></button>
                                         <button type="button" class="btn btn btn-default btn-circle" id_asuransi="<?php echo $catat['id_asuransi']; ?>" onclick="open_del(id_asuransidel=<?php echo $catat['id_asuransi']; ?>);"><span>Hapus</span></button>

                                    </td>
                        </tr>
                    <?php }?>
                </tfoot>
              </table>
              <script>
			       $('#example1').DataTable();
  			    $(".open_add").click(function (e){
  					                    //var m = $(this).attr("id_asuransi");
  					        $.ajax({
  					        url: "asuransi/asuransi_add.php",
  					        type: "GET",
  				            success: function (ajaxData){
  				            	$("#ModalAdd").html(ajaxData);

  				            	$("#ModalAdd").modal('show',{backdrop: 'true'});
  				            }
  				          });
  				  });
           function open_del(){
                                $.ajax({
                                    url: "asuransi/asuransi_del.php?id_asuransi="+id_asuransidel,
                                    type: "GET",
                                    success: function (ajaxData){
                                        $("#ModalDelete").html(ajaxData);
                                        $("#ModalDelete").modal('show',{backdrop: 'true'});
                                    }
                                });
            };

            function open_modal(){
                              $.ajax({
                                  url: "asuransi/asuransi_edit.php?id_asuransi="+id_asuransiedit,
                                  type: "GET",
                                  success: function (ajaxData){
                                      $("#ModalEdit").html(ajaxData);
                                      $("#ModalEdit").modal('show',{backdrop: 'true'});
                                  }
                              });
            };
			</script>

<style type="text/css">

  .btn {

    padding-bottom: 0px;
    padding-top: 4px;
    padding-left: 4px;
    padding-right: 4px;
  }
 
</style>
