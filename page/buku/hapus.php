<?php

	$id = $_GET['id'];

	$koneksi-> query("DELETE FROM tb_buku where id='$id'");

?>

<script type="text/javascript">
	window.location.href="?page=buku";
</script>