<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=reportpiutang.xls");
 
// Tambahkan table
//include 'data.php';

?>
								      <?php
            include_once '../../lib/config.php';
            include_once '../../lib/fungsi.php';
      ?>
      <table width="100%" align="center" border="0">
                                  <tr>
                                    <td width="50%"><u style="font-size: 20px;"><strong>PT. MH Medika</strong><br>
                                    </u>
                                      Jl. Sumbing Rt.03 Rw.09 Mojosongo<br>
                                      Surakarta Tlp. 0271-9224110, 081229875951<br>
                                    </td>                                   
                                  </tr>                                   
                                </table>
                                    <span style="font-size: 20px;font-weight: bold;"><center>Laporan Piutang</center></span>
                                <br>
      <table id="tablepkb1" class="table table-condensed table-bordered table-striped table-hover">
                <thead class="thead-light">
                <tr>
                          <th>No.PKB</th>
                          <th>Tgl.PKB</th>
                          <th>Kategori</th>
                          <th>Asuransi</th>
                          <th>No.Kwitansi</th>
                          <th>Tgl.Kwitansi</th>
                          <th>Nama Customer</th>
                          <th>Piutang</th>
                </tr>
                </thead>
                <tbody>
                <?php
                                   //WHERE p.tgl_batal='0000-00-00 00:00:00' AND p.status_pkb='' AND substring(tgl,1,10)>='$tgl1' AND  substring(tgl,1,10)<='$tgl2' 
                                   //no pkb| tgl pkb | kategori | Asuransi | no kwitansi | tgl kwitansi | Nama customer | Piutang
                                    $tgl1=$_GET['tgl1'];
                                    $tgl2=$_GET['tgl2'];
                                    $j=1;
                                    $jml=0;
                                    $sqlcatat = "SELECT p.id_pkb AS idpkb,p.tgl AS tglpkb, p.kategori AS kat, a.nama AS nmasuransi, k.no_kwitansi AS nokw, k.tgl_kwitansi AS tglkw, c.nama AS nmcus,
                                    k.total_payment AS total_bayar, titip_cash ,titip_bank, k.total_payment-(ifnull(titip_cash,0)+ifnull(titip_bank,0)) as piutang
                                    FROM t_status_pkb s
                                    INNER JOIN t_pkb p ON s.fk_pkb=p.id_pkb
                                    INNER JOIN t_customer c ON p.fk_customer=c.id_customer
                                    INNER JOIN t_kwitansi k ON p.id_pkb=k.fk_pkb
                                    LEFT JOIN (SELECT no_bukti, no_ref, sum(total) as titip_cash
                                    FROM t_cash where tipe_transaksi='titipan'
                                    GROUP BY no_ref)AS cash ON cash.no_ref=k.fk_pkb
                                    LEFT JOIN (SELECT no_bukti, no_ref, sum(total) as titip_bank
                                    FROM t_bank where tipe_transaksi='titipan'
                                    GROUP BY no_ref)AS bank ON bank.no_ref=k.fk_pkb             
                                    LEFT JOIN t_asuransi a ON p.fk_asuransi=a.id_asuransi
                                      WHERE id IN (
                                        SELECT MAX(id)
                                        FROM t_status_pkb
                                        GROUP BY fk_pkb
                                      ) AND status !='LUNAS'";
                                   	$rescatat = mysql_query( $sqlcatat );
                                    while($catat = mysql_fetch_array( $rescatat )){  
                                    $jml=$jml+$catat['piutang'];                                  
                                ?>
                        <tr>
                          <td><?php echo ($catat['idpkb']);?></td>     
                          <td ><?php echo date('d-m-Y' , strtotime($catat['tglpkb']));?></td>     
                          <td ><?php echo $catat['kat'];?></td>
                          <td ><?php echo $catat['nmasuransi'];?></td>
                          <td ><?php echo $catat['nokw'];?></td>
                          <td ><?php echo date('d-m-Y' , strtotime($catat['tglkw']));?></td>
                          <td ><?php echo $catat['nmcus'];?></td>
                          <td ><?php echo $catat['piutang'];?></td>
                        </tr>
                    <?php }
                  ?>
                  <tr><td colspan="7" align="right">Total</td><td><?php echo $jml;?></td></tr>
                </tfoot>
              </table>
              <table>
                
              </table>