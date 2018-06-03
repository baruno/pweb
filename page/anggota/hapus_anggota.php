<?php

	$nim = $_GET['id'];

	$koneksi-> query("DELETE FROM tb_anggota where nim='$nim'");

?>

<script type="text/javascript">
	window.location.href="?page=anggota";
</script>