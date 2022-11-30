<?php

require_once ('../modelos/perfil.modelo.php');
$perfil= new Perfil_modelo();
$perfilArray=$perfil->get_perfil($id);
/////////////
if(isset($_POST['opcion'])){
    switch ($_POST['opcion']) {
        case 'nuevo':
           
            echo'
        <script type="text/javascript">
         alert("nuevo");
      </script>';

            break;
         case 'actualizar':
            $perfil->editar_Dentista();
            break;
        case 'actualizarCredenciales':
            $perfil->actualizarCredenciales();
            break;
        case 'eliminar':
            echo'
            <script type="text/javascript">
             alert("eliminar");
          </script>';
            break;
            default:
                break;
    }
}

?>
    <div class="row">
        <div class="col-auto"><a class="btn btn-primary btn-user btn-block" href=".."><i class="fas fa-arrow-left"></i> Atras</a></div>
        
    </div>
<br>

        <?php
                if($perfilArray !=null){
                    
                    foreach ($perfilArray as $perfil) {
                        if($perfil['foto_dentist']==null){
                            $imagenPerfil="../img/iconos/fotoDentista.jpg";
                        }else{
                            $imagenPerfil=$perfil['foto_dentist'];
                        }

                            echo'
                            
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
               
                <div class="text-center"> <img class="img-fluid"src="'.$imagenPerfil.'" alt="icono del menu consultorios" max-width="100%" height="auto" ></div>
                
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

                    ';


echo '

<!-- Editar Modal-->
<div class="modal fade" id="ModConsultorioModal';echo $perfil['id_dentist'];echo'" tabindex="-1" role="dialog" aria-labelledby="ModConsultorioModalLabel';echo $perfil['id_dentist'];echo' "aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModConsultorioModalLabel';echo  $perfil['id_dentist'];echo'">'; echo 'Modificar Datos Personales</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form class="user" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="text" class="form-control form-control-user" id="txtNombre" placeholder="Nombre" name="txtNombre" value="';echo $perfil['nombre_dentist']; echo'"></div>
                                <div class="col-sm-6"><input type="text" class="form-control form-control-user" id="txtCedula" placeholder="Cedula" name="txtCedula" value="';echo $perfil['cedula_dentist']; echo'"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"> <input type="text" class="form-control form-control-user" id="txtTel" placeholder="Telefono" name="txtTel" value="';echo $perfil['telefono_dentis']; echo'"></div> 
                                <div class="col-sm-6 mb-3 mb-sm-0"> <input type="text" class="form-control form-control-user" id="txtSexo" placeholder="Telefono" name="txtSexo" value="';echo $perfil['sexo_usuario']; echo'"></div> 
                            </div>
                            
                            <input type="num"  id="txtIdUser" hidden name="txtIdUser" value="';echo $perfil['id_usuario']; echo'">
                            <input type="num"  id="txtDentista" hidden name="txtIdDentista" value="';echo $perfil['id_dentist']; echo'">
                            <input type="text" hidden id="opcion" name="opcion" value="actualizar">
                        
                            <div class="modal-footer">
                                <button class="btn btn-secondary " type="button" data-dismiss="modal">Cancelar</button>
                                <input type="submit"  value="Guardar" id="btn1" " class="col-3 btn btn-primary btn-user btn-block ml-auto">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
<!-- Fin Ediar Modal-->

<!-- EditarCuenta Modal-->
<div class="modal fade" id="ModCredencialesModal';echo $perfil['id_usuario'];echo'" tabindex="-1" role="dialog" aria-labelledby="ModCredencialesModalLabel';echo $perfil['id_usuario'];echo' "aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModCredencialesModalLabel';echo  $perfil['id_usuario'];echo'">'; echo 'Modificar Datos Inicio de Sesion</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form class="user" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="text" class="form-control form-control-user" id="txtNombreU" placeholder="Nombre" name="txtNombreU" value="';echo $perfil['nombre_usuario']; echo'"></div>
                                <div class="col-sm-6"><input type="text" class="form-control form-control-user" id="txtPassword" placeholder="Cedula" name="txtPassword" value="';echo $perfil['contrasena_usuario']; echo'"></div>
                            </div>
                                                        
                            
                            <input type="num"  id="txtIdUser" hidden name="txtIdUser" value="';echo $perfil['id_usuario']; echo'">
                            <input type="text" hidden id="opcion" name="opcion" value="actualizarCredenciales">
                        
                            <div class="modal-footer">
                                <button class="btn btn-secondary " type="button" data-dismiss="modal">Cancelar</button>
                                <input type="submit"  value="Guardar" id="btn1" " class="col-3 btn btn-primary btn-user btn-block ml-auto">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
<!-- Fin EdiarCuenta Modal-->


';

                    
                }
            }

        ?>



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
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="time" class="form-control form-control-user" id="txtHora" placeholder="Hora de Aprtura" name="txtHora"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="file" class="form-control form-control-user"  id="txtFoto" placeholder="Foto" name="txtFoto"></div>
                            </div>
                            <input type="text" hidden id="opcion" name="opcion" value="nuevo">
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

