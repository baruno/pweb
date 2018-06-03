<?php

    $nim = $_GET['id'];

    $sql = $koneksi-> query("SELECT * FROM tb_anggota where nim='$nim'");

    $tampil = $sql->fetch_assoc();
    $jkl = $tampil['jk'];

?>

<div class="panel panel-default">
<div class="panel-heading">
	Ubah Data
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">                                 
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>NIM</label>
                                            <input class="form-control" name="nim" value="<?php echo $tampil['nim']?>" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" value="<?php echo $tampil['nama']?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" name="tmpt_lahir" value="<?php echo $tampil['tempat_lahir']?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input class="form-control" name="tgl_lahir" type="date"  value="<?php echo $tampil['tgl_lahir']?>"/>
                                        </div>
                                         <div class="form-group">
                                            <label>Jenis Kelamin</label><br/>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="L" name="jk" <?php echo($jkl==L)?"checked":""; ?> /> Laki-laki
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="P" name="jk" <?php echo($jkl==P)?"checked":""; ?> /> Wanita
                                            </label>
                                        </div>                                 	
                                        
                                        <div class="form-group">
                                            <label>Prodi</label>
                                            <input class="form-control" name="prodi" value="<?php echo $tampil['prodi']?>"/>
                                        </div>
                                        <div>
                                        	
                                        	<input type="submit" name="simpan" value="Ubah" class="btn btn-primary">

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
        
        $sql = $koneksi-> query("UPDATE tb_anggota SET nim='$nim', nama='$nama', tempat_lahir='$tmpt_lahir', tgl_lahir= '$tgl_lahir', jk='$jk', prodi='$prodi' where nim='$nim'");

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