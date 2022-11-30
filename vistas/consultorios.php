<?php

require_once ('../modelos/consultorios.model.php');
$consultorios= new Consultorio_modelo();
$consultoriosArry=$consultorios->get_consultorios($id);

/////////////
if(isset($_POST['opcion'])){
    switch ($_POST['opcion']) {
        case 'nuevo':
            $consultorios->insert_consultorio();
    
            break;
         case 'actualizar':
            $consultorios->editar_consultorio();
            break;
        case 'eliminar':
            $consultorios->eliminar_consultorio();
            break;
            default:
                break;
    }
}

?>
    <div class="row">
        <div class="col-auto"><a class="btn btn-primary btn-user btn-block" href=".."><i class="fas fa-arrow-left"></i> Atras</a></div>
        <?php
            if($consultoriosArry !=null){
                echo '<div class="col-auto"><a href="#" data-toggle="modal" data-target="#NuevoConsultorioModal" class="col-auto btn btn-success btn-user btn-block">Nuevo</a></div>';
            }
        ?>
    </div>
<br>

<div class="card-body">
    <div class="row">

        <?php
                if($consultoriosArry !=null){
                    
                    foreach ($consultoriosArry as $consultorio) {
                        if($consultorio['foto_consul']==null){
                            $imagenConsultorio="../img/iconos/consultorios.jpg";
                        }else{
                            $imagenConsultorio=$consultorio['foto_consul'];
                        }

                            echo'
                            
                            <div class="col-xl-3 col-md-5 mb-4">                   
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs text-center font-weight-bold text-primary  mb-1" height="100vh">
                                                    ';
                                                    echo $consultorio['nombre_consul'];
                                                    echo'
                                                    <div class="col-auto imgFachada" height="100vh">
                                                        <img src="'.$imagenConsultorio.'" alt="icono del menu consultorios" height="100vh">
                                                    </div>
                                                    <div class="mt-1 text-xs text-center font-weight-bold text-primary">
                                                        <a  href="#" data-toggle="modal" data-target="#detallesConsultorioModal';echo $consultorio['id_consul'];echo'" class="btn btn-primary text-s text-center font-weight-bold" title="Detalles"><i class="fas fa-info-circle"></i></a>
                                                        <a  href="#" data-toggle="modal" data-target="#ModConsultorioModal';echo $consultorio['id_consul'];echo'" class="btn btn-warning  text-s text-center font-weight-bold" title="Editar"><i class="fas fa-edit"></i></a>
                                                        <a  href="#" data-toggle="modal" data-target="#eliminarConsultorioModal';echo $consultorio['id_consul'];echo'" class="btn btn-danger text-s text-center font-weight-bold" title="Eliminar"><i class="fas fa-trash"></i></a>
                                                        
                                                    </div>
                                                    
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>    
                          
                            <!-- Detalles consultorio Modal-->         
                            <div class="modal fade" id="detallesConsultorioModal';echo $consultorio['id_consul'];echo'" tabindex="-1" role="dialog" aria-labelledby="detallesConsultorioModalLabel';echo $consultorio['id_consul'];echo'" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title ml-2 text-s  font-weight-bold text-primary" id="detallesConsultorioModalLabel';echo  $consultorio['id_consul'];echo'">'; echo 'Detalles de '.$consultorio['nombre_consul']; echo' </h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body row">
                                            <img src="'; echo $imagenConsultorio; echo'" width="150" alt="icono del menu consultorios" class="img-fluid">
                                                <div>
                                                    <h5 class="ml-2 text-s  font-weight-bold text-primary">Direccion: <b>';echo $consultorio['direccion_consul'];echo'</b></h5>
                                                    <h5 class="ml-2 text-s  font-weight-bold text-primary">Municipio: <b>';echo $consultorio['municipio_consul'];echo'</b></h5>
                                                    <h5 class="ml-2 text-s  font-weight-bold text-primary">Estado: <b>';echo $consultorio['estado_consul'];echo'</b></h5>
                                                    <h5 class="ml-2 text-s  font-weight-bold text-primary">Estado: <b>';echo $consultorio['telefono_consul'];echo'</b></h5>
                                                    <h5 class="ml-2 text-s  font-weight-bold text-primary">Hora de Apertura: <b>';echo $consultorio['horario_consul'];echo'</b></h5>
                                                </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-primary" data-dismiss="modal">Cerrar</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            
                        <!-- Detalles consultorio Modal-->
                        

                        
<!-- Editar Modal-->
<div class="modal fade" id="ModConsultorioModal';echo $consultorio['id_consul'];echo'" tabindex="-1" role="dialog" aria-labelledby="ModConsultorioModalLabel';echo $consultorio['id_consul'];echo' "aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModConsultorioModalLabel';echo  $consultorio['id_consul'];echo'">'; echo 'Modificar Consultorio '.$consultorio['nombre_consul']; echo'</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form class="user" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="text" class="form-control form-control-user" id="txtNombre" placeholder="Nombre" name="txtNombre" value="';echo $consultorio['nombre_consul']; echo'"></div>
                                <div class="col-sm-6"><input type="text" class="form-control form-control-user" id="txtDireccion" placeholder="Direccion" name="txtDireccion" value="';echo $consultorio['direccion_consul']; echo'"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"> <input type="text" class="form-control form-control-user" id="txtMuni" placeholder="Municipio" name="txtMuni" value="';echo $consultorio['municipio_consul']; echo'"></div> 
                                <div class="col-sm-6 mb-3 mb-sm-0"> <input type="text" class="form-control form-control-user" id="txtEdo" placeholder="Estado" name="txtEdo" value="';echo $consultorio['estado_consul']; echo'"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="tel" maxlength="10" class="form-control form-control-user" id="txtTel" placeholder="Telefono" name="txtTel" value="';echo $consultorio['telefono_consul']; echo'"></div> 
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="time" class="form-control form-control-user" id="txtHora" placeholder="Hora de Aprtura" name="txtHora" value="';echo $consultorio['horario_consul']; echo'"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="file" class="form-control form-control-user"  id="txtFoto" placeholder="Foto" name="txtFoto" value="';echo $consultorio['foto_consul']; echo'"></div>
                            </div>
                            <input type="num" hidden id="txtIdConsultorio" name="txtIdConsultorio" value="';echo $consultorio['id_consul']; echo'">
                            <input type="num" hidden id="txtstatus" name="txtstatus" value="1">
                            <input type="num" hidden id="txtIdUser" name="txtIdUser" value="';echo $consultorio['id_usuario']; echo'">
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
<div class="modal fade" id="eliminarConsultorioModal';echo $consultorio['id_consul'];echo'" tabindex="-1" role="dialog" aria-labelledby="eliminarConsultorioModalLabel';echo $consultorio['id_consul'];echo' "aria-hidden="true">;
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eliminarConsultorioModalLabel';echo  $consultorio['id_consul'];echo'">'; echo 'Eliminar Consultorio '.$consultorio['nombre_consul']; echo'</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form  method="POST">
                        <h5 class="ml-2 text-s  font-weight-bold text-danger"><b>Estas seguro en eliminar el consultorio ';echo $consultorio['nombre_consul'];echo'</b></h5>
                            <input type="text" hidden id="opcion" name="opcion" value="eliminar">
                            <input type="num" hidden id="idconsul" name="idconsul"  value="';echo $consultorio['id_consul']; echo'">
                            <input type="num" hidden id="idusuario" name="idusuario" value="';echo $consultorio['id_usuario']; echo'">
                           

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

