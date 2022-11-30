<?php
class Perfil_modelo{

    private $db;
    private $perfiles;

    public function __construct(){
        require_once("connect.php");
        $this->db=Connect::connection();
        $this->perfiles=array();
    }

    


    public function get_perfil($id){
        $sql=$this->db->query("SELECT * FROM usuarios u INNER JOIN dentistas d ON u.id_usuario=d.id_usuario WHERE u.id_usuario ='$id'");
        
        while($row=$sql->fetch(PDO::FETCH_ASSOC)){
            $this->perfil[]=$row;
        }
        return $this->perfil;
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
