<?php

	$koneksi = new mysqli("127.0.0.1","root","","perpustakaan");

	$filename = "buku-(".date('d-m-Y').").xls";

	header("content-disposition: attachment; filename='$filename'");
	header("content-type: application/vdn.ms-excel");

?>

<h2>Laporan Buku</h2>

	<table border="1">
		<tr>
			<th>NO</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>ISBN</th>
            <th>Jumlah Buku</th>
		</tr>
		<?php
				$no=1;
				$sql = "SELECT * FROM tb_buku";
				$result = mysqli_query($koneksi, $sql);
				while ($data = mysqli_fetch_assoc($result)) {
			?>
		<tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $data['judul'];?></td>
        <td><?php echo $data['pengarang'];?></td>
        <td><?php echo $data['penerbit'];?></td>
        <td><?php echo $data['isbn'];?></td>
        <td><?php echo $data['jumlah_buku'];?></td>
         
		<?php } ?>

	</table>