<?php

	$koneksi = new mysqli("127.0.0.1","root","","perpustakaan");

	$filename = "transaksi-(".date('d-m-Y').").xls";

	header("content-disposition: attachment; filename='$filename'");
	header("content-type: application/vdn.ms-excel");

?>

<h2>Laporan Transaksi</h2>

	<table border="1">
		<tr>
			<th>NO</th>
            <th>Judul</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
			
		</tr>
		<?php
				$no=1;
				$sql = "SELECT * FROM tb_transaksi";
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
            <td><?php echo $data['status'];?></td>	
		</tr>
		<?php } ?>

	</table>