<?php
class Procedimientos_modelo{
    private $db;
    private $procedimientos;

    public function __construct(){
        require_once("connect.php");
        $this->db=Connect::connection();
        $this->procedimientos=array();
    }
    public function get_procedimientos($id){
        $sql=$this->db->query("SELECT * FROM procedimientos WHERE id_usuario= '$id'");
        while($row=$sql->fetch(PDO::FETCH_ASSOC)){
            $this->procedimientos[]=$row;
        }
        return $this->procedimientos;
    }


    
    public function insert_procedimiento(){
        $rol=1;
        $idStatus=1;
        
        $sql="INSERT INTO procedimientos (nombre_procedi,costo_procedi,id_status,id_usuario) VALUES(:nombre,:costo,:idsta,:idUser)";
        $stmt=Connect::connection()->prepare($sql);
        $stmt-> bindParam(":nombre", $_POST["txtNombre"], PDO::PARAM_STR);
        $stmt-> bindParam(":costo", $_POST["txtCosto"], PDO::PARAM_STR);
        
        $stmt-> bindParam(":idsta", $idStatus, PDO::PARAM_INT);
        $stmt-> bindParam(":idUser", $rol, PDO::PARAM_INT);
        $stmt->execute();  
        echo'
        <script type="text/javascript">
         window.location.href = "vista.php?opcion=procedimientos";
      </script>';

    }
    public function eliminar_procedimiento(){
            $idProce=$_POST['txtIdprocedimiento'];
            
            $sqleliminar="DELETE FROM procedimientos WHERE id_procedi= :idConsul";
            $stmt=Connect::connection()->prepare($sqleliminar);
            $stmt-> bindParam(":idConsul", $idProce, PDO::PARAM_INT);
            
            $respuesta=$stmt-> execute();
            echo '
            <script type="text/javascript">
             window.location.href = "vista.php?opcion=procedimientos";
          </script>
            ';
    }
    


    public function editar_procedimiento(){

  
        $sql="UPDATE procedimientos SET nombre_procedi=:nombre,costo_procedi=:costo WHERE id_procedi=:idPro";
        $stmt=Connect::connection()->prepare($sql);
        $stmt-> bindParam(":nombre", $_POST["txtNombre"], PDO::PARAM_STR);
        $stmt-> bindParam(":costo", $_POST["txtCosto"], PDO::PARAM_STR);

        
        $stmt-> bindParam(":idPro", $_POST["txtIdprocedimiento"], PDO::PARAM_INT);
        $stmt->execute();  
        echo'
        <script type="text/javascript">
         window.location.href = "vista.php?opcion=procedimientos";
      </script>
        ';
    }
   


}