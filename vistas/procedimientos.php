<?php
 
require_once ('../modelos/procedimientos.modelo.php');
$Procedimientos= new Procedimientos_modelo();
$ProcedimientosArray=$Procedimientos->get_procedimientos($id);

/////////////
if(isset($_POST['opcion'])){
    switch ($_POST['opcion']) {
        case 'nuevo':
            $Procedimientos->insert_procedimiento();
    
            break;
         case 'actualizar':
            $Procedimientos->editar_procedimiento();
            break;
        case 'eliminar':
            $Procedimientos->eliminar_procedimiento();
            break;
            default:
                break;
    }
}

?>
    <div class="row">
        <div class="col-auto"><a class="btn btn-primary btn-user btn-block" href=".."><i class="fas fa-arrow-left"></i> Atras</a></div>
        <?php
            if($ProcedimientosArray !=null){
                echo '<div class="col-1"><a href="#" data-toggle="modal" data-target="#NuevoConsultorioModal" class=" btn btn-success btn-user btn-block">Nuevo</a></div>';
            }
        ?>
    </div>
<br>

<div class="card-body">
    <div class="row">

        <?php
                if($ProcedimientosArray !=null){
                    
                    foreach ($ProcedimientosArray as $procedimiento) {
                        echo'
                            
                            <div class="col-xl-3 col-md-5 mb-4">                   
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-s text-center font-weight-bold text-primary  mb-1" height="100vh">
                                                    ';
                                                    echo $procedimiento['nombre_procedi'];
                                                    echo'
                                                    
                                                    <div class="mt-1 text-xs text-center font-weight-bold text-primary">
                                                        <a  href="#" data-toggle="modal" data-target="#detallesConsultorioModal';echo $procedimiento['id_procedi'];echo'" class="btn btn-primary text-s text-center font-weight-bold" title="Detalles"><i class="fas fa-info-circle"></i></a>
                                                        <a  href="#" data-toggle="modal" data-target="#ModConsultorioModal';echo $procedimiento['id_procedi'];echo'" class="btn btn-warning  text-s text-center font-weight-bold" title="Editar"><i class="fas fa-edit"></i></a>
                                                        <a  href="#" data-toggle="modal" data-target="#eliminarConsultorioModal';echo $procedimiento['id_procedi'];echo'" class="btn btn-danger text-s text-center font-weight-bold" title="Eliminar"><i class="fas fa-trash"></i></a>
                                                        
                                                    </div>
                                                    
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>    
                          
                            <!-- Detalles procedimiento Modal-->         
                            <div class="modal fade" id="detallesConsultorioModal';echo $procedimiento['id_procedi'];echo'" tabindex="-1" role="dialog" aria-labelledby="detallesConsultorioModalLabel';echo $procedimiento['id_procedi'];echo'" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title ml-2 text-s  font-weight-bold text-primary" id="detallesConsultorioModalLabel';echo  $procedimiento['id_procedi'];echo'">'; echo 'Detalles de '.$procedimiento['nombre_procedi']; echo' </h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body row">
                                            
                                                <div>
                                                    <h5 class="ml-2 text-s  font-weight-bold text-primary">Procedimiento: <b>';echo $procedimiento['nombre_procedi'];echo'</b></h5>
                                                    <h5 class="ml-2 text-s  font-weight-bold text-primary">Costo Publico: <b>$ ';echo $procedimiento['costo_procedi'];echo'</b></h5>
                                                    
                                                </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-primary" data-dismiss="modal">Cerrar</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            
                        <!-- Detalles procedimiento Modal-->
                        

                        
<!-- Editar Modal-->
<div class="modal fade" id="ModConsultorioModal';echo $procedimiento['id_procedi'];echo'" tabindex="-1" role="dialog" aria-labelledby="ModConsultorioModalLabel';echo $procedimiento['id_procedi'];echo' "aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModConsultorioModalLabel';echo  $procedimiento['id_procedi'];echo'">'; echo 'Modificar Consultorio '.$procedimiento['nombre_procedi']; echo'</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form class="user" method="post">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0"><input type="text" class="form-control form-control-user" id="txtNombre" placeholder="Procedimiento" name="txtNombre" value="';echo $procedimiento['nombre_procedi']; echo'"></div>
                                <div class="col-sm-6"><input type="text" class="form-control form-control-user" id="txtCosto" placeholder="Costo Publico" name="txtCosto" value="';echo $procedimiento['costo_procedi']; echo'"></div>
                            </div>

                            <input type="num" hidden id="txtIdprocedimiento" name="txtIdprocedimiento" value="';echo $procedimiento['id_procedi']; echo'">
                            <input type="num" hidden id="txtstatus" name="txtstatus" value="1">
                            <input type="num" hidden id="txtIdUser" name="txtIdUser" value="';echo $procedimiento['id_usuario']; echo'">
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
<div class="modal fade" id="eliminarConsultorioModal';echo $procedimiento['id_procedi'];echo'" tabindex="-1" role="dialog" aria-labelledby="eliminarConsultorioModalLabel';echo $procedimiento['id_procedi'];echo' "aria-hidden="true">;
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eliminarConsultorioModalLabel';echo  $procedimiento['id_procedi'];echo'">'; echo 'Eliminar Consultorio '.$procedimiento['nombre_procedi']; echo'</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form  method="POST">
                        <h5 class="ml-2 text-s  font-weight-bold text-danger"><b>Estas seguro en eliminar el procedimiento ';echo $procedimiento['nombre_procedi'];echo'</b></h5>
                            <input type="text" hidden id="opcion" name="opcion" value="eliminar">
                            <input type="num" hidden id="txtIdprocedimiento" name="txtIdprocedimiento"  value="';echo $procedimiento['id_procedi']; echo'">
                            <input type="num" hidden id="idusuario" name="idusuario" value="';echo $procedimiento['id_usuario']; echo'">
                           

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
                                <div class="col-sm-6"><input type="text" class="form-control form-control-user" id="txtCosto" placeholder="Costo publico" name="txtCosto"></div>
                            </div>
                            
                            <input type="text" hidden id="opcion" name="opcion" value="nuevo">
                            <input type="num" hidden id="txtstatus" name="txtstatus" value="1">
                            <input type="num" hidden id="txtIdUser" name="txtIdUser" value="<?php echo $_SESSION['id'];?>">
                        
                            <div class="modal-footer">
                                <button class="btn btn-secondary " type="button" data-dismiss="modal">Cancelar</button>
                                <input type="submit"  value="Guardar" class="col-3 btn btn-primary btn-user btn-block ml-auto">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
<!-- Fin nuevo Modal-->

