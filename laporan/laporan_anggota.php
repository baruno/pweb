<?php

	$koneksi = new mysqli("127.0.0.1","root","","perpustakaan");

	$filename = "anggota-(".date('d-m-Y').").xls";

	header("content-disposition: attachment; filename='$filename'");
	header("content-type: application/vdn.ms-excel");

?>

<h2>Laporan Anggota</h2>

	<table border="1">
		<tr>
			<th>NO</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Program Studi</th>
			
		</tr>
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
		</tr>
		<?php } ?>

	</table>