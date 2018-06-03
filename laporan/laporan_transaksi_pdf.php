<?php
$koneksi = new mysqli("127.0.0.1","root","","perpustakaan");
$content = '
	<style type="text/css">
		.tabel{border-collapse: collapse;}
		.tabel th{padding: 8px 5px; background-color: #CCCCCC}
	</style>
';
$content .= '
<page>
	<h2>Laporan Data Transaksi</h2>
	<table border="1" class="table">
		<tr>
			<th>NO</th>
            <th>Judul</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
		</tr>';
		
				$no=1;
				$sql = "SELECT * FROM tb_transaksi";
				$result = mysqli_query($koneksi, $sql);
				while ($data = mysqli_fetch_assoc($result)) {
					$content .= '
						<tr>
							<td>'. $no++ .'</td>
							<td>'. $data['judul'] .'</td>
							<td>'. $data['nim'] .'</td>
							<td>'. $data['nama'] .'</td>
							<td>'. $data['tgl_pinjam'] .'</td>
							<td>'. $data['tgl_kembali'] .'</td>
							<td>'. $data['status'] .'</td>	
						</tr>
						';
				} 
		 $content .= '
	</table>
</page>';
	require_once('../assets/html2pdf/html2pdf.class.php');
	$html2pdf = new HTML2PDF('P','A4','fr');
	$html2pdf->writeHTML($content);

	ob_end_clean();

	$html2pdf->Output('transaksi.pdf');
?>