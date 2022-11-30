<?php
 
require_once ('../modelos/pacientes.modelo.php');
$pacientes= new Pacientes_modelo();
$idpaciente=1;
$pacientesArray=$pacientes->get_pacientes($id);
//////
require_once ('../modelos/consultorios.model.php');
$consultorios= new Consultorio_modelo();
$consultoriosArry=$consultorios->get_consultorios($id);
/////////////
if(isset($_POST['opcion'])){
    switch ($_POST['opcion']) {
        case 'nuevo':
            $pacientes->insert_paciente();
    
            break;
         case 'actualizar':
            $pacientes->editar_pacientes();
            break;
        case 'eliminar':
            $pacientes->eliminar_pacientes();
            break;
            default:
                break;
    }
}

?>
    <div class="row">
        <div class="col-auto"><a class="btn btn-primary btn-user btn-block" href=".."><i class="fas fa-arrow-left"></i> Atras</a></div>
        <?php
            if($pacientesArray !=null){
                echo '<div class="col-auto"><a href="#" data-toggle="modal" data-target="#NuevoPacienteModal" class=" btn btn-success btn-user btn-block">Nuevo</a></div>';
            }
        ?>
    </div>
<br>

<div class="card-body">
    <div class="row align-self-center">
<!-- DataTales -->
<div class="card shadow mb-4 mx-auto">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Pacientes</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Direccion</th>
                                                    <th>Municipio</th>
                                                    <th>Estado</th>
                                                    <th>Telefono</th>
                                                    
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Direccion</th>
                                                    <th>Municipio</th>
                                                    <th>Estado</th>
                                                    <th>Telefono</th>
                                                    
                                                    <th>Acciones</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
        <?php
                if($pacientesArray !=null){
                    
                    foreach ($pacientesArray as $paciente) {
                        if($paciente['foto_paciente']==null){
                            $imagenPaciente="../img/iconos/paciente.jpg";
                        }else{
                            $imagenPaciente=$paciente['foto_paciente'];
                        }

                            echo'
                            
                                                <tr>
                                                    <td>';echo $paciente['nombre_paciente'];echo'</td>
                                                    <td>';echo $paciente['direccion_paciente'];echo'</td>
                                                    <td>';echo $paciente['municipio_paciente'];echo'</td>
                                                    <td>';echo $paciente['estado_paciente'];echo'</td>
                                                    <td>';echo $paciente['telefono_paciente'];echo'</td>
                                                    
                                                    <td>
                                                        <div class="mt-1 text-xs text-center font-weight-bold text-primary">
                                                            <a  href="#" data-toggle="modal" data-target="#detallesConsultorioModal';echo $paciente['id_paciente'];echo'" class="btn btn-primary text-s text-center font-weight-bold" title="Detalles"><i class="fas fa-info-circle"></i></a>
                                                            <a  href="#" data-toggle="modal" data-target="#ModConsultorioModal';echo $paciente['id_paciente'];echo'" class="btn btn-warning  text-s text-center font-weight-bold" title="Atender cita"><i class="fas fa-calendar-check"></i></i></a>
                                                            <a  href="#" data-toggle="modal" data-target="#eliminarConsultorioModal';echo $paciente['id_paciente'];echo'" class="btn btn-success text-s text-center font-weight-bold" title="Agendar"><i class="fas fa-calendar-alt"></i></i></a>
                                                        </div>
                                                    </td>

                                                </tr>
                                            ';?>


 
                          <?php echo'
                            <!-- Detalles paciente Modal-->         
                            <div class="modal fade " id="detallesConsultorioModal';echo $paciente['id_paciente'];echo'" tabindex="-1" role="dialog" aria-labelledby="detallesConsultorioModalLabel';echo $paciente['id_paciente'];echo'" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title ml-2 text-s  font-weight-bold text-primary" id="detallesConsultorioModalLabel';echo  $paciente['id_paciente'];echo'">'; echo 'Detalles de '.$paciente['nombre_paciente']; echo' </h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body row">
                                            
                                            <div class="row">
<!-- Foto Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Foto Perfil</h6>
            <div class="dropdown no-arrow">
                <a  href="#" data-toggle="modal" data-target="#ModConsultorioModal';echo $perfil['id_dentist'];echo'" class="btn btn-warning text-xs col-auto text-center font-weight-bold" title="Editar"><i class="fas fa-edit"></i></a>
            </div>          

        </div>
                        
        <!-- Card Body -->
        <div class="card-body">
        
            <div class="chart-pie  pb-2">
                <!-- Contenido principal -->
               
                <div class="text-center"> <img class="img-fluid"src="'.$imagenPaciente.'" alt="icono del menu consultorios" max-width="100%" height="auto" ></div>
                
            </div>
            
            <div class="mt-4 text-center small">
                <span class="mr-2">
                    
                </span>
                <span class="mr-2">
                   
                </span>
                <span class="mr-2">
                    
                </span>
            </div>
        </div>
    </div>
</div>
<!--Final Foto Chart -->

<!-- Detalles personales Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Datos Personales</h6>
            <div class="dropdown no-arrow">
                <a  href="#" data-toggle="modal" data-target="#ModConsultorioModal';echo $perfil['id_dentist'];echo'" class="btn btn-warning text-xs col-auto text-center font-weight-bold" title="Editar"><i class="fas fa-edit"></i></a>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
        
            <div class="chart-pie  pb-2">
                <!-- Contenido principal -->
                <div class="row align-self-lg-center"> 
                        <div class="col-auto mb-3 text-center"><img  class="img-fluid" src="../img/iconos/user-azul.png" alt="icono del menu consultorios" width="25%" height="20%" ></div>
                </div>
                    <div class="mb-1 row">
                        <div class="col-4 mb-1 bg-primary text-white rounded p-2">Nombre: </div>
                        <div class="col-7 p-2 border-bottom-primary rounded">'.$perfil['nombre_dentist'].'</div>
                    </div>
                    <div class="mb-1 row">
                        <div class="col-4 mb-1 bg-primary text-white rounded p-2">Cedula: </div>
                        <div class="col-7 p-2 border-bottom-primary rounded">'.$perfil['cedula_dentist'].'</div>
                    </div>
                    <div class="mb-1 row">
                        <div class="col-4 mb-1 bg-primary text-white rounded p-2 btn-icon-split">Telefono:</div>
                        <div class="col-7 p-2 border-bottom-primary rounded">'.$perfil['telefono_dentis'].'</div>
                    </div>
                    <div class="mb-1 row">
                        <div class="col-4 mb-1 bg-primary text-white rounded p-2 btn-icon-split">Sexo:</div>
                        <div class="col-7 p-2 border-bottom-primary rounded">'.$perfil['sexo_usuario'].'</div>
                    </div>
                
            </div>
            <div class="mt-4 text-center small">
                <span class="mr-2">
                    
                </span>
                <span class="mr-2">
                   
                </span>
                <span class="mr-2">
                    
                </span>
            </div>
        </div>
    </div>
</div>
<!-- final Detalles personales Chart -->

<!-- Detalles Cuenta Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Datos Inicio Sesion</h6>
            <div class="dropdown no-arrow">
                <a  href="#" data-toggle="modal" data-target="#ModCredencialesModal';echo $perfil['id_usuario'];echo'" class="btn btn-warning text-xs  col-auto text-center font-weight-bold"><i class="fas fa-edit" title="Editar"></i></a>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
        
            <div class="chart-pie  pb-2">
                <!-- Contenido principal -->
                     <div class="row align-self-lg-center"> 
                        <div class="col-auto mb-4 text-center"><img  class="img-fluid" src="../img/iconos/pass-azul.png" alt="icono del menu consultorios" width="25%" height="20%" ></div>
                    </div>
                    <div class="mb-1 row">
                        <div class="col-4 mb-1 bg-primary text-white rounded p-2">Usuario: </div>
                        <div class="col-7 p-2 border-bottom-primary rounded">'.$perfil['nombre_usuario'].'</div>
                    </div>
                    <div class="mb-1 row">
                        <div class="col-4 mb-1 bg-primary text-white rounded p-2">Contraseña: </div>
                        <div class="col-7 p-2 border-bottom-primary rounded">'.$perfil['contrasena_usuario'].'</div>
                    </div>
                    <div class="mb-1 row text-white">
                        .<br>.<br>
                    </div>
                
            </div>
            <div class="mt-4 text-center small">
                <span class="mr-2">
                    
                </span>
                <span class="mr-2">
                   
                </span>
                <span class="mr-2">
                    
                </span>
            </div>
        </div>
    </div>
</div>
<!--Detalles cuenta Chart -->

</div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-primary" data-dismiss="modal">Cerrar</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            
                        <!-- Detalles paciente Modal-->
                        

                        
<!-- Editar Modal-->
<div class="modal fade" id="ModConsultorioModal';echo $paciente['id_paciente'];echo'" tabindex="-1" role="dialog" aria-labelledby="ModConsultorioModalLabel';echo $paciente['id_paciente'];echo' "aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModConsultorioModalLabel';echo  $paciente['id_paciente'];echo'">'; echo 'Modificar Consultorio '.$paciente['nombre_consul']; echo'</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form class="user" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="text" class="form-control form-control-user" id="txtNombre" placeholder="Nombre" name="txtNombre" value="';echo $paciente['nombre_consul']; echo'"></div>
                                <div class="col-sm-6"><input type="text" class="form-control form-control-user" id="txtDireccion" placeholder="Direccion" name="txtDireccion" value="';echo $paciente['direccion_consul']; echo'"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"> <input type="text" class="form-control form-control-user" id="txtMuni" placeholder="Municipio" name="txtMuni" value="';echo $paciente['municipio_consul']; echo'"></div> 
                                <div class="col-sm-6 mb-3 mb-sm-0"> <input type="text" class="form-control form-control-user" id="txtEdo" placeholder="Estado" name="txtEdo" value="';echo $paciente['estado_consul']; echo'"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="tel" maxlength="10" class="form-control form-control-user" id="txtTel" placeholder="Telefono" name="txtTel" value="';echo $paciente['telefono_consul']; echo'"></div> 
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="time" class="form-control form-control-user" id="txtHora" placeholder="Hora de Aprtura" name="txtHora" value="';echo $paciente['horario_consul']; echo'"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="file" class="form-control form-control-user"  id="txtFoto" placeholder="Foto" name="txtFoto" value="';echo $paciente['foto_consul']; echo'"></div>
                            </div>
                            <input type="num" hidden id="txtIdConsultorio" name="txtIdConsultorio" value="';echo $paciente['id_paciente']; echo'">
                            <input type="num" hidden id="txtstatus" name="txtstatus" value="1">
                            <input type="num" hidden id="txtIdUser" name="txtIdUser" value="';echo $paciente['id_usuario']; echo'">
                            <input type="text" hidden id="opcion" name="opcion" value="actualizar">
                        
                            <div class="modal-footer">
                                <button class="btn btn-secondary " type="button" data-dismiss="modal">Cancelar</button>
                                <input type="submit"  value="Guardar" id="btn1" onclick="reload();" class="col-3 btn btn-primary btn-user btn-block ml-auto">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
<!-- Fin Ediar Modal-->


                       
<!--  Modal Eliminar Consultorio-->
<div class="modal fade" id="eliminarConsultorioModal';echo $paciente['id_paciente'];echo'" tabindex="-1" role="dialog" aria-labelledby="eliminarConsultorioModalLabel';echo $paciente['id_paciente'];echo' "aria-hidden="true">;
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eliminarConsultorioModalLabel';echo  $paciente['id_paciente'];echo'">'; echo 'Eliminar Consultorio '.$paciente['nombre_consul']; echo'</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form  method="POST">
                        <h5 class="ml-2 text-s  font-weight-bold text-danger"><b>Estas seguro en eliminar el paciente ';echo $paciente['direccion_consul'];echo'</b></h5>
                            <input type="text" hidden id="opcion" name="opcion" value="eliminar">
                            <input type="num" hidden id="idconsul" name="idconsul"  value="';echo $paciente['id_paciente']; echo'">
                            <input type="num" hidden id="idusuario" name="idusuario" value="';echo $paciente['id_usuario']; echo'">
                           

                            <div class="modal-footer">
                                <button class="btn btn-secondary " type="button" data-dismiss="modal">Cancelar</button>
                                <input type="submit"  value="Eliminar" id="btn1"  class="col-3 btn btn-primary btn-user btn-block ml-auto">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
<!-- final Modal Eliminar Consultorio-->



                            ';


                    }
                }else{
                    echo '
                    <div class="col-xl-3 col-md-6 mb-4">
                        <a href="#" data-toggle="modal" data-target="#NuevoConsultorioModal" id="btn1"> 
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col">
                                            <div class="text-xs text-center font-weight-bold text-primary text-uppercase mb-1">
                                                ';
                                                echo "Crear nuevo";
                                                echo'
                                            </div>
                                                    <div class="col-auto">
                                                    </div>  
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </a>
                </div>  
                    ';
                }

        ?>

</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin DataTales -->  
    </div>
</div>


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
                            <input type="text" hidden id="opcion" name="opcion" value="nuevo">
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

