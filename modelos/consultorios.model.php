<?php
class Consultorio_modelo{
    private $db;
    private $consultorios;

    public function __construct(){
        require_once("connect.php");
        $this->db=Connect::connection();
        $this->consultorios=array();
    }
    public function get_consultorios($id){
        $sql=$this->db->query("SELECT * FROM consultorios WHERE id_usuario= '$id'");
        while($row=$sql->fetch(PDO::FETCH_ASSOC)){
            $this->consultorios[]=$row;
        }
        return $this->consultorios;
    }

 
    
    public function insert_consultorio(){
        $rol=1;
        $idStatus=1;
        
        $sql="INSERT INTO consultorios (nombre_consul,direccion_consul,estado_consul,municipio_consul,telefono_consul,horario_consul,foto_consul,id_status,id_usuario) VALUES(:nombre,:direccion,:edo,:muni,:tel,:horario,:foto,:idsta,:idUser)";
        $stmt=Connect::connection()->prepare($sql);
        $stmt-> bindParam(":nombre", $_POST["txtNombre"], PDO::PARAM_STR);
        $stmt-> bindParam(":direccion", $_POST["txtDireccion"], PDO::PARAM_STR);
        $stmt-> bindParam(":edo", $_POST["txtEdo"], PDO::PARAM_STR);
        $stmt-> bindParam(":muni", $_POST["txtMuni"], PDO::PARAM_STR);
        $stmt-> bindParam(":tel", $_POST["txtTel"], PDO::PARAM_STR);
        $stmt-> bindParam(":horario", $_POST["txtHora"], PDO::PARAM_STR);
        $stmt-> bindParam(":foto", $_POST["txtFoto"], PDO::PARAM_STR);
        $stmt-> bindParam(":idsta", $idStatus, PDO::PARAM_INT);
        $stmt-> bindParam(":idUser", $rol, PDO::PARAM_INT);
        $stmt->execute();  
        echo'
        <script type="text/javascript">
         window.location.href = "vista.php?opcion=consultorios";
      </script>';

    }
    public function eliminar_consultorio(){
            $idConsultorio=$_POST['idconsul'];
            
            $sqleliminar="DELETE FROM consultorios WHERE id_consul= :idConsul";
            $stmt=Connect::connection()->prepare($sqleliminar);
            $stmt-> bindParam(":idConsul", $idConsultorio, PDO::PARAM_INT);
            
            $respuesta=$stmt-> execute();
            echo '
            <script type="text/javascript">
             window.location.href = "vista.php?opcion=consultorios";
          </script>
            ';
    }
    


    public function editar_consultorio(){

  
        $sql="UPDATE consultorios SET nombre_consul=:nombre,direccion_consul=:direccion,estado_consul=:edo,municipio_consul=:muni,telefono_consul=:tel,horario_consul=:horario,foto_consul=:foto WHERE id_consul=:idConsultorio";
        $stmt=Connect::connection()->prepare($sql);
        $stmt-> bindParam(":nombre", $_POST["txtNombre"], PDO::PARAM_STR);
        $stmt-> bindParam(":direccion", $_POST["txtDireccion"], PDO::PARAM_STR);
        $stmt-> bindParam(":edo", $_POST["txtEdo"], PDO::PARAM_STR);
        $stmt-> bindParam(":muni", $_POST["txtMuni"], PDO::PARAM_STR);
        $stmt-> bindParam(":tel", $_POST["txtTel"], PDO::PARAM_STR);
        $stmt-> bindParam(":horario", $_POST["txtHora"], PDO::PARAM_STR);
        $stmt-> bindParam(":foto", $_POST["txtFoto"], PDO::PARAM_STR);
        
        $stmt-> bindParam(":idConsultorio", $_POST["txtIdConsultorio"], PDO::PARAM_INT);
        $stmt->execute();  
        echo'
        <script type="text/javascript">
         window.location.href = "vista.php?opcion=consultorios";
      </script>
        ';
    }
   


}