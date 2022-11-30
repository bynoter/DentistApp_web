<?php

//$var="servicios.php";
if(isset($_GET["opcion"])){
    $var= $_GET["opcion"].".php";
}else{
    $var= "servicios.php";
}

include_once ('../modelos/pagina.modelo.php');
$pagina= new PaginaModelo;
$pagina->pagina($var);

return $pagina;
?>
