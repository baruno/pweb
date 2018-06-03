<?php

  $koneksi = new mysqli ("127.0.0.1","root","","perpustakaan");

  ob_start();
  session_start();

  if(isset($_SESSION['admin']) || isset($_SESSION['user'])) {
    header("Location: index.php");
  }

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Login</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Halaman Login</h2>
               
                
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Masukkan Username dan Password </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="username" class="form-control" placeholder="Your Username " />
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="pass" class="form-control"  placeholder="Your Password" />
                                        </div>
                                   
                                     <input type="submit" name="login" value="Login" class="btn btn-primary ">
                                   
 
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>

<?php

if(isset($_POST['login'])){

  $username = $_POST['username'];
  $pass = $_POST['pass'];

  $sql =   $koneksi-> query("SELECT * FROM tb_user where username = '$username' and password='$pass'");

  $data = $sql->fetch_assoc();

  $ketemu = $sql->num_rows;

  if ($ketemu >= 1){

    session_start();

    if($data['level'] == 'admin'){
      $_SESSION['admin'] = $data['id'];
      $_SESSION['nama'] = $username;
      header("Location: index.php");
    }
    elseif($data['level'] == 'user'){
      $_SESSION['user'] = $data['id'];
      $_SESSION['nama'] = $username;
      header("Location: index.php");
    }
  }
  else
  {
    echo'
      <script type="text/javascript">
        alert("Login Gagal, Username dan Pasword Salah");
      </script>
    ';
  }
}
  
?>