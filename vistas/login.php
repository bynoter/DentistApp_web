<?php
session_start(); /*Se crea o inicia una SESION php*/
if(!empty($_SESSION['active'])){  /* en caso que que la sesion exista entonces dricessionar*/
    header('location:home.php');   
}else{  
if(!empty ($_POST))
    {
        if(empty($_POST['txtUser']) || empty($_POST['txtPassword'])) 
        {
        } else{ 
            require_once "../modelos/connect.php"; 

            $user = $_POST['txtUser']; 
            $pass= $_POST['txtPassword'];
            
            $sql="SELECT * FROM usuarios WHERE nombre_usuario= '$user' AND contrasena_usuario='$pass'"; 
            $stmt=Connect::connection()->prepare($sql);
            $stmt->execute();
            $result= $stmt->fetch(PDO::FETCH_ASSOC);
           
            
            if($result["nombre_usuario"]==$user){
                $_SESSION['active'] = true;
                $_SESSION['nombre'] = $result["nombre_usuario"]; 
                $_SESSION['id'] = $result["id_usuario"]; 
                $_SESSION['rol'] = $result["id_rol"]; 

              header('location:home.php');
            } else  {
                $alerta = 'Usuario o contraseña incorrecta';/*cambia la alerta en caso que lso datos introduciono no se encuentren en la bd*/
                session_destroy(); /* Se destruye la secion creada */
            }  
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DentistApp - Login</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido</h1>
                                    </div>
                                    <div class="text-center"><img src="../img/iconos/logo2.png" width="150px" alt=""></div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" name="txtUser" aria-describedby="emailHelp"
                                                placeholder="Ingresa tu Usuario">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="txtPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            
                                        </div>
                                        <input class="btn btn-primary btn-user btn-block" type="submit" value="Iniciar">
                                        
                                        
                                    </form>
                                    <hr>
                                    
                                    <div class="text-center">
                                        <a class="small" href="register.php">Crear cuenta</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>