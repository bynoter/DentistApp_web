<?php
if (!empty($_POST['txtCedula'])){
            $sql="INSERT INTO dentistas (nombre_dentist,cedula_dentist,telefono_dentis,foto_dentist,id_status,id_usuario)
            VALUE(:nombre,:cedula,:tel,:foto,:sta,:idUs)";

            $stmt=Connect::connection()->prepare($sql);
            $stmt -> bindParam(":nombre", $_POST["txtNombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":cedula", $_POST["txtCedula"], PDO::PARAM_STR);
            $stmt -> bindParam(":tel", $_POST["txtTel"], PDO::PARAM_STR);
            $stmt -> bindParam(":foto", $_POST["txtfoto"], PDO::PARAM_STR);
            $stmt -> bindParam(":sta", $_POST["txtstatus"], PDO::PARAM_INT);
            $stmt -> bindParam(":idUs", $_POST["txtIdUser"], PDO::PARAM_INT);
                
            $stmt->execute();
            
            $resultadostmt = $stmt -> rowCount();
            if ($resultadostmt === 1) {
                $paso="2";
                  
            } else {
                echo "failUpd";
                
            }
               

    }

?>
<div class="card mb-4">
    <div class="card-header">
    <H2>Datos Personales</H2> 
    </div>
    <div class="card-body">
        Continuemos configurando tu cuenta..
        Es necesario completar tus datos para poder usar DentistApp.
        <hr>
        <hr>
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
                <div class="col-sm-6">
                    <input type="file" class="form-control form-control-user"
                        id="txtfoto" placeholder="Foto" name="txtfoto">
                </div>
            </div>
            <input type="num"  id="txtstatus" name="txtstatus" value="1">
            <input type="num"  id="txtIdUser" name="txtIdUser" value="<?php echo $_SESSION['id'];?>">
            
            <input type="submit"  value="Guardar" class="col-3 btn btn-primary btn-user btn-block ml-auto">
               
         </form>
    </div>
</div>

