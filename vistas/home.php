<?php
session_start();

if(empty($_SESSION['active'])){
    header('location:../index.php');   
    die();
}

require_once "../modelos/connect.php"; 


    
    $id=$_SESSION['id'];
    $sql="SELECT * FROM dentistas WHERE id_usuario= '$id'"; 
    $stmt=Connect::connection()->prepare($sql);
    $stmt->execute();
    $result= $stmt->fetch(PDO::FETCH_ASSOC);
    if(!empty($result)){
    $nombre=$result["nombre_dentist"];
    
}else{
    $nombre=$_SESSION['nombre'];

}
//////
require_once ('../modelos/consultorios.model.php');
$consultorios= new Consultorio_modelo();
$consultoriosArry=$consultorios->get_consultorios($id);

/////////////
require_once ('../modelos/pacientes.modelo.php'); 
$pacientes= new Pacientes_modelo();
if(isset($_POST['opcion'])){
    switch ($_POST['opcion']) {
        case 'consultorio':
            $consultorios->insert_consultorio();
            break;
         case 'dentista':
            $pacientes->editar_pacientes();
            break;
        case 'paciente':
            $pacientes->insert_paciente();
            break;
            default:
                break;
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

    <title>DentistApp - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        require_once ('sidebar.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                require_once ('topbar.php');
                 ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    

                    <!-- Content Row -->
                
                <?php              
                if(!empty($result)){
                    require_once ('servicios.php');
                }
                 ?>
                
                    <!-- Content Row -->

                    <div class="row">

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Juan Carlos Torres | Luis Antonio Orozco</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Estas seguro?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Elegiste "Salir" estas seguro en cerrar la sesion en DentistApp.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="salir.php">Cerrar</a>
                </div>
            </div>
        </div>
    </div>




<!-- nuevo Modal-->
<div class="modal fade" id="NuevoConsultorioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Consultorio</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form class="user" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="text" class="form-control form-control-user" id="txtNombre" placeholder="Nombre" name="txtNombre"></div>
                                <div class="col-sm-6"><input type="text" class="form-control form-control-user" id="txtDireccion" placeholder="Direccion" name="txtDireccion"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"> <input type="text" class="form-control form-control-user" id="txtMuni" placeholder="Municipio" name="txtMuni"></div> 
                                <div class="col-sm-6 mb-3 mb-sm-0"> <input type="text" class="form-control form-control-user" id="txtEdo" placeholder="Estado" name="txtEdo"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="tel" maxlength="10" class="form-control form-control-user" id="txtTel" placeholder="Telefono" name="txtTel"></div> 
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="time" class="form-control form-control-user" id="txtHora" placeholder="Hora de Aprtura" name="txtHora"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="file" class="form-control form-control-user"  id="txtFoto" placeholder="Foto" name="txtFoto"></div>
                            </div>
                            <input type="text" hidden id="opcion" name="opcion" value="consultorio">
                            <input type="num" hidden id="txtstatus" name="txtstatus" value="1">
                            <input type="num" hidden id="txtIdUser" name="txtIdUser" value="<?php echo $_SESSION['id'];?>">
                        
                            <div class="modal-footer">
                                <button class="btn btn-secondary " type="button" data-dismiss="modal">Cancelar</button>
                                <input type="submit"  value="Guardar" id="btn1" onclick="reload();" class="col-3 btn btn-primary btn-user btn-block ml-auto">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
<!-- Fin nuevo Modal-->


<!-- nuevoPaciente Modal-->
<div class="modal fade" id="NuevoPacienteModal" tabindex="-1" role="dialog" aria-labelledby="NuevoPacienteModalLabel"aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="NuevoPacienteModalLabel">Nuevo Paciente</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form class="user" method="POST" >
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="text" class="form-control form-control-user" id="txtNombre" placeholder="Nombre" name="txtNombre"></div>
                                <div class="col-sm-6"><input type="text" class="form-control form-control-user" id="txtDireccion" placeholder="Direccion" name="txtDireccion"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"> <input type="text" class="form-control form-control-user" id="txtMuni" placeholder="Municipio" name="txtMuni"></div> 
                                <div class="col-sm-6 mb-3 mb-sm-0"> <input type="text" class="form-control form-control-user" id="txtEdo" placeholder="Estado" name="txtEdo"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="tel" maxlength="10" class="form-control form-control-user" id="txtTel" placeholder="Telefono" name="txtTel"></div> 
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="date" class="form-control form-control-user" id="txtNacimiento" placeholder="Fecha de Naciemiento" name="txtNacimiento"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <select type="text"  class="form-select  form-control-user "
                                                id="txtSexo"  name="txtSexo">
                                                <option selected>Sexo</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                </div> 
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="text" class="form-control form-control-user" id="txtCurp" placeholder="CURP" name="txtCurp"></div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <select type="text"  class="form-select  form-control-user "
                                                id="txtIdConsultorio"  name="txtIdConsultorio">
                                                <option selected>Consultorio</option>
                                                <?php
                                                foreach ($consultoriosArry as $consultorio) {
                                                
                                               echo'  <option value="'.$consultorio['id_consul'].'">'.$consultorio['nombre_consul'].'</option>';
                                                }
                                            ?>
                                            </select>
                                </div> 
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="file" class="form-control form-control-user"  id="txtFoto" placeholder="Foto" name="txtFoto"></div>
                            </div>
                            <input type="text" hidden id="opcion" name="opcion" value="paciente">
                            <input type="num" hidden id="txtstatus" name="txtstatus" value="1">
                            <input type="num" hidden id="txtIdDentista" name="txtIdDentista" value="<?php echo $_SESSION['id'];?>">
                            
                    
                            <div class="modal-footer">
                                <button class="btn btn-secondary " type="button" data-dismiss="modal">Cancelar</button>
                                <input type="submit"  value="Guardar" id="btn1" onclick="reload();" class="col-3 btn btn-primary btn-user btn-block ml-auto">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
<!-- Fin nuevoPaciente Modal-->



    
<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>


</body>

</html>