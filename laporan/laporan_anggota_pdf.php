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
	<h2>Laporan Data Anggota</h2>
	<table border="1" class="table">
		<tr>
			<th>NO</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Program Studi</th>
		</tr>';
		
				$no=1;
				$sql = "SELECT * FROM tb_anggota";
				$result = mysqli_query($koneksi, $sql);
				while ($data = mysqli_fetch_assoc($result)) {
					$content .= '
						<tr>
							<td>'. $no++ .'</td>
							<td>'. $data['nim'] .'</td>
							<td>'. $data['nama'] .'</td>
							<td>'. $data['tempat_lahir'] .'</td>
							<td>'. $data['tgl_lahir'] .'</td>
							<td>'. $data['jk'] .'</td>
							<td>'. $data['prodi'] .'</td>	
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

	$html2pdf->Output('anggota.pdf');
?>