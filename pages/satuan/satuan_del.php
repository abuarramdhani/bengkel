<?php
    include_once '../../lib/config.php';
    //include_once '../../lib/fungsi.php';
    $id_satuan = $_GET['id_satuan'];
    $sqlsatuan = "SELECT * FROM t_satuan WHERE id_satuan='$id_satuan'";
    $satuanar = mysql_query( $sqlsatuan );
    $emp = mysql_fetch_array( $satuanar );
?>

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hid_satuan="true">&times;</span></button>
                        <h4 class="modal-title" id_satuan="myModalLabel">Hapus Data Satuan</h4>
                    </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <form>
                                    <div class="alert alert-danger">Apakah anda yakin ingin menghapus data ini ( <?php echo $emp['nama'];?>) ?</div>
                                        <div class="form-group">
                                            <input type="hidden" id="id_satuan" name="id_satuan" value="<?php echo $id_satuan;?>">
                                            <button type="button" class="btn btn-primary save_submit" name="Submit" value="SIMPAN">&nbsp;&nbsp;&nbsp;Ya&nbsp;&nbsp;&nbsp;</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hid_satuan="true">&nbsp;Batal&nbsp;</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <script type="text/javascript">
                  $(document).ready(function (){
                        $(".save_submit").click(function (e){
                            var id_satuan = $('#id_satuan').val();
                           $.ajax({
                                url: 'satuan/satuan_del_save.php?id_satuan='+id_satuan,
                                type: 'GET',
                                success: function (response){
                                      //alert('asuransi/asuransi_del_save.php?$id_satuan='+$id_satuan);
                                      $("#tablesatuan").load('satuan/satuan_load.php');
                                      alert('Data Berhasil Dihapus');
                                      $('#ModalDelete').modal('hide');
                                }
                            });

                    });
                });
              </script> 