<a href="?page=anggota&aksi=tambah" class="btn btn-success" style="margin-bottom: 5px"><i class="fa fa-plus"></i>Tambah Data</a>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Anggota
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Program Studi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    	<?php

                                    		$no=1;

                                    		$sql = "SELECT * FROM tb_anggota";
                                    		$result = mysqli_query($koneksi, $sql);

                                    		while ($data = mysqli_fetch_assoc($result)) {
                                    	?>

                                    	<tr>
                                    		<td><?php echo $no++ ?></td>
                                    		<td><?php echo $data['nim'];?></td>
                                    		<td><?php echo $data['nama'];?></td>
                                    		<td><?php echo $data['tempat_lahir'];?></td>
                                    		<td><?php echo $data['tgl_lahir'];?></td>
                                    		<td><?php echo $data['jk'];?></td>
                                    		<td><?php echo $data['prodi'];?></td>
                                    		<td>
                                    			<a href="?page=anggota&aksi=ubah&id=<?php echo $data['nim']?>" class="btn btn-info">Ubah</a>
                                    			<a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini..??')" href="?page=anggota&aksi=hapus&id=<?php echo $data['nim']?>" class="btn btn-danger">Hapus</a>
                                    		</td>
                                    	</tr>

                                    	<?php } ?>
                                    </tbody>

                                </table>
                            </div>
                            <a href="./laporan/laporan_anggota.php" class="btn btn-default" target="blank" style="margin-top: 8px" ><i class="fa fa-print"></i>Export To Excel</a>
                            <a href="./laporan/laporan_anggota_pdf.php" class="btn btn-default" target="blank" style="margin-top: 8px" ><i class="fa fa-print"></i>Export To PDF</a>
                        </div>
                    </div>
                </div>
            </div>

