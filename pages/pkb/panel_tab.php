  
  <!-- Left side column. contains the logo and sidebar -->
  <?php $idpkb=$_GET['idpkb'];?>
  <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">                        
                        <h4 class="modal-title" id="myModalLabel" style="text-align: center;padding-right: 0px">Data PKB Panel <button type="button" class="close" aria-label="Close" onclick="$('#ModalAddPanelPkb').modal('hide');"><span>&times;</span></button></h4>  
                    </div>
                    <!--<div class="box-header with-border">
                      <h3 class="box-title">Horizontal Form</h3>
                    </div>
                     /.box-header -->
                    <!-- form start -->
                    <div class="modal-body">
                      <!-- Content Wrapper. Contains page content -->
                      <div id="tablepanel"></div>
                    </div>
                </div>
</div>
      
        <div id="ModalAddPanel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
         <div id="ModalEditPanel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
         <div id="ModalDeletePanel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

        <script type="text/javascript">
            $(document).ready(function (){
                 $("#tablepanel").load('pkb/panel_load.php?idpkb=<?php echo $idpkb;?>');
            });
        </script>


<style type="text/css">
  .title-header {
    font-size: 20px;
    text-align: center;
    font-weight: bold;
    font-family: monospace;
  }
</style>