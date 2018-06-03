<div class="panel panel-default">
<div class="panel-heading">
	Tambah Data
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">                                 
                                    <form method="POST">
                                    	 <div class="form-group">
                                            <label>NIM</label>
                                            <input class="form-control" name="nim" />
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" />
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" name="tmpt_lahir" />
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" name="tgl_lahir" type="date" />
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label><br/>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="L" name="jk" /> Laki-laki
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="P" name="jk"/> Wanita
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label>Prodi</label>
                                            <input class="form-control" name="prodi" />
                                        </div>
                                        <div>
                                        	
                                        	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

                                        </div>
                                    </form>
                                </div>
                            </div>
</div>
</div>
</div>

<?php

	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$tmpt_lahir = $_POST['tmpt_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$jk = $_POST['jk'];
	$prodi = $_POST['prodi'];

	$simpan = $_POST['simpan'];

    if ($simpan) {
        
        $sql = $koneksi-> query("INSERT INTO tb_anggota (nim, nama, tempat_lahir, tgl_lahir, jk, prodi )values('$nim', '$nama', '$tmpt_lahir', '$tgl_lahir', '$jk', '$prodi')");

        if ($sql) {
            ?>

                <script type="text/javascript">
                    alert("Data Berhasil Disimpan");
                    window.location.href="?page=anggota";
                </script>

            <?php
        }

    }

?>