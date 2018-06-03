<a href="?page=transaksi&aksi=tambah" class="btn btn-success" style="margin-bottom: 5px"><i class="fa fa-plus"></i> Tambah Data</a>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Transaksi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>NO</th>
                                            <th>Judul</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Terlambat</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    	<?php

                                    		$no=1;

                                    		$sql = "SELECT * FROM tb_transaksi where status = 'pinjam'";
                                    		$result = mysqli_query($koneksi, $sql);

                                    		while ($data = mysqli_fetch_assoc($result)) {
                                    	?>

                                    	<tr>
                                    		<td><?php echo $no++ ?></td>
                                    		<td><?php echo $data['judul'];?></td>
                                    		<td><?php echo $data['nim'];?></td>
                                    		<td><?php echo $data['nama'];?></td>
                                    		<td><?php echo $data['tgl_pinjam'];?></td>
                                    		<td><?php echo $data['tgl_kembali'];?></td>
                                    		<td>
                                    			
                                    			<?php

                                    				$denda = 1000;

                                    				$tgl_dateline2 = $data['tgl_kembali'];
                                    				$tgl_kembali = date('Y-m-d');

                                    				$lambat = terlambat($tgl_dateline2, $tgl_kembali);
                                    				$denda1 = $lambat*$denda;

                                    				if($lambat>0){
                                    					echo "<font color='red'>$lambat hari <br>(Rp $denda1)</font>";
                                    				}else{
                                    					echo $lambat ."hari";
                                    				}

                                    			?>

                                    		</td>
                                    		<td><?php echo $data['status'];?></td>
                                    		

                                    		<td>
                                    			<a href="?page=transaksi&aksi=kembali&id=<?php echo $data['id'] ?>&judul=<?php echo $data['judul'] ?>" class="btn btn-info">Kembali</a>
                                    			<a  href="?page=transaksi&aksi=perpanjang&id=<?php echo $data['id']?>&judul=<?php echo $data['judul'] ?>&lambat=<?php echo $lambat;?>&tgl_kembali=<?php echo $data['tgl_kembali'] ?>" class="btn btn-danger">Perpanjang</a>
                                    		</td>
                                    	</tr>

                                    	<?php } ?>
                                    </tbody>

                                </table>
                            </div>
                             <a href="./laporan/laporan_transaksi.php" class="btn btn-default" target="blank" style="margin-top: 8px" ><i class="fa fa-print"></i>Export To Excel</a>
                            <a href="./laporan/laporan_transaksi_pdf.php" class="btn btn-default" target="blank" style="margin-top: 8px" ><i class="fa fa-print"></i>Export To PDF</a>
                        </div>
                    </div>
                </div>
            </div>

