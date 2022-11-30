<?php
class Pacientes_modelo{

    private $db;
    private $paciente;

    public function __construct(){
        require_once("connect.php");
        $this->db=Connect::connection();
        $this->perfiles=array();
    }

    public function insert_paciente(){
        if (!empty($_POST['txtCurp'])){
            $rol=2;
            $idStatus=1;
            $pdo=Connect::connection();
    $consulta=$pdo->prepare("INSERT INTO usuarios (nombre_usuario,contrasena_usuario,sexo_usuario,id_rol,id_status,fecha_registro) VALUES(:nombreU,:contra,:sex,:idrol,:idsta,CURDATE())");
            
            $consulta-> bindParam(":nombreU", $_POST["txtTel"], PDO::PARAM_STR);
            $consulta-> bindParam(":contra", $_POST["txtTel"], PDO::PARAM_STR);
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
                
                   $sql4="INSERT INTO pacientes (nombre_paciente,direccion_paciente,estado_paciente,municipio_paciente,telefono_paciente,CURP_paciente,f_nacimiento_paciente,foto_paciente,id_status,id_usuario,id_dentist,id_consul)
                   VALUE(:nombre,:direcc,:edo,:muni,:tel,:curp,:fecha,:foto,:idsta,:idUs,:idDent,:idCons)";
                   $stmt=Connect::connection()->prepare($sql4);
                   $stmt -> bindParam(":nombre", $_POST["txtNombre"], PDO::PARAM_STR);
                   $stmt -> bindParam(":direcc", $_POST["txtDireccion"], PDO::PARAM_STR);
                   $stmt -> bindParam(":edo", $_POST["txtEdo"], PDO::PARAM_STR);
                   $stmt -> bindParam(":muni", $_POST["txtMuni"], PDO::PARAM_STR);
                   $stmt -> bindParam(":tel", $_POST["txtTel"], PDO::PARAM_STR);
                   $stmt -> bindParam(":curp", $_POST["txtCurp"], PDO::PARAM_STR);
                   $stmt -> bindParam(":fecha", $_POST["txtNacimiento"], PDO::PARAM_STR);
                   $stmt -> bindParam(":foto", $_POST["txtfoto"], PDO::PARAM_STR);
                   $stmt -> bindParam(":idsta", $idStatus, PDO::PARAM_INT);
                   $stmt -> bindParam(":idUs", $lastInsertId, PDO::PARAM_INT);
                   $stmt -> bindParam(":idDent", $_POST["txtIdDentista"], PDO::PARAM_INT);
                   $stmt -> bindParam(":idCons", $_POST["txtIdConsultorio"], PDO::PARAM_INT);
                       
                   $stmt->execute();   
                   echo'
        <script type="text/javascript">
         window.location.href = "vista.php?opcion=pacientes";
      </script>';
                   
                   die();
                } else {
                    echo "failUpd";
                }
            }   

    }


    public function get_pacientes($id){
        $sql=$this->db->query("SELECT * FROM usuarios u 
        INNER JOIN pacientes p ON u.id_usuario=p.id_usuario
        INNER JOIN dentistas d ON d.id_dentist=p.id_dentist
        WHERE  p.id_dentist='$id'");
        
        while($row=$sql->fetch(PDO::FETCH_ASSOC)){
            $this->paciente[]=$row;
        }
        return $this->paciente;
    }

    public function editar_Dentista(){

        $sql="UPDATE dentistas SET nombre_dentist=:nomDentis,cedula_dentist=:cedu,telefono_dentis=:telDen WHERE id_dentist=:idDent";
        $stmt=Connect::connection()->prepare($sql);
        $stmt-> bindParam(":nomDentis", $_POST["txtNombre"], PDO::PARAM_STR);
        $stmt-> bindParam(":cedu", $_POST["txtCedula"], PDO::PARAM_STR);
        $stmt-> bindParam(":telDen", $_POST["txtTel"], PDO::PARAM_STR);
        $stmt-> bindParam(":idDent", $_POST["txtIdDentista"], PDO::PARAM_INT);
        $stmt->execute(); 
        
        $sql="UPDATE usuarios SET sexo_usuario=:sex WHERE id_usuario=:idU";
        $stmt=Connect::connection()->prepare($sql);
        $stmt-> bindParam(":sex", $_POST["txtSexo"], PDO::PARAM_STR);
        $stmt-> bindParam(":idU", $_POST["txtIdUser"], PDO::PARAM_INT);
        $stmt->execute(); 


        echo'
        <script type="text/javascript">
         window.location.href = "vista.php?opcion=perfil";
      </script>';


    }
    public function actualizarCredenciales(){

        $sql="UPDATE usuarios SET nombre_usuario=:nomU,contrasena_usuario=:pas WHERE id_usuario=:idU";
        $stmt=Connect::connection()->prepare($sql);
        $stmt-> bindParam(":nomU", $_POST["txtNombreU"], PDO::PARAM_STR);
        $stmt-> bindParam(":pas", $_POST["txtPassword"], PDO::PARAM_STR);
        $stmt-> bindParam(":idU", $_POST["txtIdUser"], PDO::PARAM_INT);
        
        $stmt->execute(); 
        


        echo'
        <script type="text/javascript">
         window.location.href = "vista.php?opcion=perfil";
      </script>';


    }
 
   

}
?>
