<?php
require_once "../modelos/connect.php"; 
if (!empty($_POST['txtCedula'])){
    $rol=1;
    $idStatus=1;
    $pdo=Connect::connection();
    $consulta=$pdo->prepare("INSERT INTO usuarios (nombre_usuario,contrasena_usuario,sexo_usuario,id_rol,id_status,fecha_registro) VALUES(:nombreU,:contra,:sex,:idrol,:idsta,CURDATE())");

    $consulta-> bindParam(":nombreU", $_POST["txtemail"], PDO::PARAM_STR);
    $consulta-> bindParam(":contra", $_POST["txtPassword"], PDO::PARAM_STR);
    $consulta-> bindParam(":sex", $_POST["txtSexo"], PDO::PARAM_STR);
    $consulta-> bindParam(":idrol", $rol, PDO::PARAM_INT);
    $consulta-> bindParam(":idsta", $idStatus, PDO::PARAM_INT);

    if ($consulta -> execute()) {
        $lastInsertId = $pdo->lastInsertId();
    }else{
        //Pueden haber errores, como clave duplicada
         $lastInsertId = 0;
         echo $consulta->errorInfo()[2];
    }   

    echo  $lastInsertId;
    
    if($lastInsertId >0){
        
           $sql4="INSERT INTO dentistas (nombre_dentist,cedula_dentist,telefono_dentis,foto_dentist,id_status,id_usuario)
           VALUE(:nombre,:cedula,:tel,:foto,:sta,:idUs)";
           $stmt=Connect::connection()->prepare($sql4);
           $stmt -> bindParam(":nombre", $_POST["txtNombre"], PDO::PARAM_STR);
           $stmt -> bindParam(":cedula", $_POST["txtCedula"], PDO::PARAM_STR);
           $stmt -> bindParam(":tel", $_POST["txtTel"], PDO::PARAM_STR);
           $stmt -> bindParam(":foto", $_POST["txtfoto"], PDO::PARAM_STR);
           $stmt -> bindParam(":sta", $idStatus, PDO::PARAM_INT);
           $stmt -> bindParam(":idUs", $lastInsertId, PDO::PARAM_INT);
               
           $stmt->execute();   
           header('location:../index.php');   
           die();
        } else {
            echo "failUpd";
        }
    }   
    



    //$sql1="INSERT INTO usuarios (nombre_usuario,contrasena_usuario,sexo_usuario,id_rol,id_status,fecha_registro)
    //VALUES(:nombreU,:contra,:sex,:idrol,:idsta,CURDATE())";
    //$rol=1;
    //$idStatus=1;
    //$stmt=Connect::connection()->prepare($sql1);
    //$stmt -> bindParam(":nombreU", $_POST["txtemail"], PDO::PARAM_STR);
    //$stmt -> bindParam(":contra", $_POST["txtPassword"], PDO::PARAM_STR);
    //$stmt -> bindParam(":sex", $_POST["txtSexo"], PDO::PARAM_STR);
    //$stmt -> bindParam(":idrol", $rol, PDO::PARAM_INT);
    //$stmt -> bindParam(":idsta", $idStatus, PDO::PARAM_INT);
    ////$stmt -> bindParam(":fechareg", CURDATE(), PDO::PARAM_STR);
    //    
    //$stmt->execute();
    //echo $stmt->lastInsertId();
    //$resultadostmt = $stmt -> rowCount();
    
   // if ($resultadostmt === 1) {
    
    //if(!empty($result)){
    //
    //   $sql4="INSERT INTO dentistas (nombre_dentist,cedula_dentist,telefono_dentis,foto_dentist,id_status,id_usuario)
    //   VALUE(:nombre,:cedula,:tel,:foto,:sta,:idUs)";
    //   $stmt=Connect::connection()->prepare($sql4);
    //   $stmt -> bindParam(":nombre", $_POST["txtNombre"], PDO::PARAM_STR);
    //   $stmt -> bindParam(":cedula", $_POST["txtCedula"], PDO::PARAM_STR);
    //   $stmt -> bindParam(":tel", $_POST["txtTel"], PDO::PARAM_STR);
    //   $stmt -> bindParam(":foto", $_POST["txtfoto"], PDO::PARAM_STR);
    //   $stmt -> bindParam(":sta", $_POST["txtstatus"], PDO::PARAM_INT);
    //   $stmt -> bindParam(":idUs", $_POST["txtIdUser"], PDO::PARAM_INT);
    //       
    //   $stmt->execute();   
    //   echo "-OK-";  
    //} else {
    //    echo "failUpd";
    //    
    //}
//}
//}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DentistApp - Registro</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crea tu Cuenta</h1>
                            </div>
                            <form class="user" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="txtNombre"
                                            placeholder="Nombre Completo" name="txtNombre">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="txtCedula"
                                            placeholder="Cedula Profesional" name="txtCedula">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="num" maxlength="10" class="form-control form-control-user"
                                            id="txtTel" placeholder="Telefono" name="txtTel">
                                    </div> 
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email"  class="form-control form-control-user"
                                            id="txtemail" placeholder="Email" name="txtemail">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="txtPassword" placeholder="Contraseña" name="txtPassword">
                                    </div> 
                                    <div class="col-sm-6 mb-3 mb-sm-0"> 
                                        <select type="text"  class="form-select  form-control-user "
                                            id="txtSexo"  name="txtSexo">
                                            <option selected>Sexo</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div> 
                                    <br>
                                </div> 
                                <input type="num"  hidden id="txtstatus" name="txtstatus" value="1">    
                                <div class="row">
                                    <a class=" col-3 btn btn-primary btn-user btn-block" href=".."><i class="fas fa-arrow-left"></i> Atras</a>
                                    <input type="submit"  value="Guardar" class="col-3 btn btn-primary btn-user btn-block ml-auto">
                                </div>

                                
                                
                            </form>
                            <hr>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/sweetalert2.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>